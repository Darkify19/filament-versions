<?php

namespace ElvinQulizade\Versions\Models;

use Illuminate\Database\Eloquent\Model;
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
        return $this->morphTo();
    }
}
