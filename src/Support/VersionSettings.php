<?php

namespace ElvinQulizade\Versions\Support;

use ElvinQulizade\Versions\Models\VersionSetting;

class VersionSettings
{
    /**
     * @var array<string, array<int, string>>
     */
    protected static array $cache = [];

    /**
     * @return array<int, string>
     */
    public static function excludedFieldsFor(string $versionableType): array
    {
        if (! array_key_exists($versionableType, static::$cache)) {
            $setting = VersionSetting::query()
                ->where('versionable_type', $versionableType)
                ->first();

            static::$cache[$versionableType] = $setting === null ? [] : $setting->excluded_fields;
        }

        return static::$cache[$versionableType];
    }

    /**
     * @param  array<int, string>  $fields
     */
    public static function setExcludedFieldsFor(string $versionableType, array $fields): void
    {
        VersionSetting::query()->updateOrCreate(
            ['versionable_type' => $versionableType],
            ['excluded_fields' => array_values($fields)],
        );

        static::$cache[$versionableType] = array_values($fields);
    }
}
