<?php

namespace ElvinQulizade\Versions\Concerns;

use ElvinQulizade\Versions\Models\Version;
use ElvinQulizade\Versions\Support\VersionPruner;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Arr;

/**
 * Pair with `implements \ElvinQulizade\Versions\Contracts\Versionable` so the
 * restore action (which only knows the polymorphic base Model) can call back
 * into this trait's methods.
 */
trait HasVersions
{
    protected ?string $versionEventOverride = null;

    public static function bootHasVersions(): void
    {
        static::created(fn (self $model) => $model->recordVersion($model->versionEventOverride ?? 'created'));

        static::updated(function (self $model) {
            $event = $model->versionEventOverride ?? 'updated';
            $model->versionEventOverride = null;

            $model->recordVersion($event);
        });
    }

    public function versions(): MorphMany
    {
        return $this->morphMany(Version::class, 'versionable')->latest('id');
    }

    public function latestVersion(): ?Version
    {
        return $this->versions()->first();
    }

    /**
     * @return array<string, mixed>
     */
    public function versionableAttributes(): array
    {
        $except = array_merge(
            config('versions.excluded_attributes', []),
            $this->versionExcept ?? []
        );

        return Arr::except($this->getAttributes(), $except);
    }

    public function recordVersion(string $event): Version
    {
        $version = $this->versions()->create([
            'event' => $event,
            'data' => $this->versionableAttributes(),
            'user_id' => auth()->id(),
        ]);

        VersionPruner::prune($this->getMorphClass(), $this->getKey());

        return $version;
    }

    public function restoreVersion(Version $version): static
    {
        $this->versionEventOverride = 'restored';

        $this->forceFill($version->data)->save();

        return $this;
    }
}
