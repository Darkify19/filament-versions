<?php

// translations for ElvinQulizade/Versions
return [

    'tab' => [
        'title' => 'Verlauf',
    ],

    'columns' => [
        'when' => 'Datum',
        'event' => 'Ereignis',
        'user' => 'Benutzer',
    ],

    'events' => [
        'created' => 'Erstellt',
        'updated' => 'Aktualisiert',
        'restored' => 'Wiederhergestellt',
    ],

    'user' => [
        'system' => 'System',
    ],

    'actions' => [
        'view_diff' => 'Änderungen anzeigen',
        'restore' => 'Wiederherstellen',
        'close' => 'Schließen',
        'compare' => 'Vergleichen',
        'manage_excluded_fields' => 'Ausgeschlossene Felder',
    ],

    'diff' => [
        'heading' => 'Was sich geändert hat',
        'no_changes' => 'Keine Änderungen in dieser Version.',
        'empty_value' => '(leer)',
    ],

    'restore' => [
        'confirmation_heading' => 'Diese Version wiederherstellen?',
        'confirmation_description' => 'Dadurch wird der aktuelle Datensatz durch die Daten dieser Version ersetzt.',
        'success' => 'Version wiederhergestellt.',
    ],

    'excluded_fields' => [
        'heading' => 'Ausgeschlossene Felder',
        'description' => 'Hier markierte Felder werden für diese Ressource nie in einem Versions-Snapshot gespeichert.',
        'success' => 'Ausgeschlossene Felder aktualisiert.',
    ],

];
