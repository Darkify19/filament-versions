<?php

namespace ElvinQulizade\Versions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property string $versionable_type
 * @property int|string $versionable_id
 * @property string $event
 * @property array<string, mixed> $data
 * @property int|null $user_id
 */
class Version extends Model
{
    protected $table = 'filament_versions';

    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];

    public function versionable(): MorphTo
    {
        // withTrashed() is a no-op for related models that don't use
        // SoftDeletes, so this is safe to call unconditionally — otherwise a
        // soft-deleted owner's history/restore would silently 404.
        return $this->morphTo()->withTrashed();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\\Models\\User'), 'user_id');
    }
}
