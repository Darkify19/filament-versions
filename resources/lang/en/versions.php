<?php

// translations for ElvinQulizade/Versions
return [

    'tab' => [
        'title' => 'History',
    ],

    'columns' => [
        'when' => 'When',
        'event' => 'Event',
        'user' => 'User',
    ],

    'events' => [
        'created' => 'Created',
        'updated' => 'Updated',
        'restored' => 'Restored',
    ],

    'user' => [
        'system' => 'System',
    ],

    'actions' => [
        'view_diff' => 'View diff',
        'restore' => 'Restore',
        'close' => 'Close',
        'compare' => 'Compare',
        'manage_excluded_fields' => 'Excluded fields',
    ],

    'diff' => [
        'heading' => 'What changed',
        'no_changes' => 'No changes in this version.',
        'empty_value' => '(empty)',
    ],

    'restore' => [
        'confirmation_heading' => 'Restore this version?',
        'confirmation_description' => 'This will overwrite the current record with this version\'s data.',
        'success' => 'Version restored.',
    ],

    'excluded_fields' => [
        'heading' => 'Excluded fields',
        'description' => 'Fields checked here are never stored in a version snapshot for this resource.',
        'success' => 'Excluded fields updated.',
    ],

];
