<?php

namespace ElvinQulizade\Versions\Support;

use ElvinQulizade\Versions\Models\Version;

class VersionPruner
{
    /**
     * Delete versions of a single versionable record beyond the retention limit.
     */
    public static function prune(string $versionableType, int | string $versionableId, ?int $keep = null): int
    {
        $keep ??= (int) config('versions.max_versions_per_model', 50);

        $ids = Version::query()
            ->where('versionable_type', $versionableType)
            ->where('versionable_id', $versionableId)
            ->orderByDesc('id')
            ->skip($keep)
            ->take(PHP_INT_MAX)
            ->pluck('id');

        if ($ids->isEmpty()) {
            return 0;
        }

        return Version::whereIn('id', $ids)->delete();
    }

    /**
     * Prune every versionable record's history, optionally scoped to one model class.
     */
    public static function pruneAll(?string $versionableType = null, ?int $keep = null): int
    {
        $groups = Version::query()
            ->when($versionableType, fn ($query) => $query->where('versionable_type', $versionableType))
            ->select('versionable_type', 'versionable_id')
            ->distinct()
            ->get();

        $deleted = 0;

        foreach ($groups as $group) {
            $deleted += static::prune($group->versionable_type, $group->versionable_id, $keep);
        }

        return $deleted;
    }
}
