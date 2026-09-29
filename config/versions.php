<?php

// config for ElvinQulizade/Versions
return [

    // Attributes never stored in a version snapshot, on top of any
    // model-level $versionExcept property.
    'excluded_attributes' => [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ],

    // Maximum number of versions kept per model instance. Older versions
    // are pruned automatically after each save, and via `versions:prune`.
    'max_versions_per_model' => 50,

    // Optional callable(Version $version): bool to gate the "Restore" action.
    // Left null, restoring is allowed for anyone who can see the History tab.
    'authorize_restore' => null,

];
