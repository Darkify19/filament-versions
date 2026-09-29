<?php

namespace ElvinQulizade\Versions\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $versionable_type
 * @property array<int, string> $excluded_fields
 */
class VersionSetting extends Model
{
    protected $table = 'filament_version_settings';

    protected $guarded = [];

    protected $casts = [
        'excluded_fields' => 'array',
    ];
}
