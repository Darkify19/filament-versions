<?php

namespace ElvinQulizade\Versions\Support;

class VersionDiffer
{
    /**
     * Field-level diff between two attribute snapshots.
     *
     * @param  array<string, mixed>  $before
     * @param  array<string, mixed>  $after
     * @return array<string, array{old: mixed, new: mixed}>
     */
    public static function diff(array $before, array $after): array
    {
        $keys = array_unique([...array_keys($before), ...array_keys($after)]);

        $changes = [];

        foreach ($keys as $key) {
            $old = $before[$key] ?? null;
            $new = $after[$key] ?? null;

            if ($old === $new) {
                continue;
            }

            $changes[$key] = ['old' => $old, 'new' => $new];
        }

        return $changes;
    }
}
