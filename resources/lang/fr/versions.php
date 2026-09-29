<?php

// translations for ElvinQulizade/Versions
return [

    'tab' => [
        'title' => 'Historique',
    ],

    'columns' => [
        'when' => 'Date',
        'event' => 'Événement',
        'user' => 'Utilisateur',
    ],

    'events' => [
        'created' => 'Créé',
        'updated' => 'Modifié',
        'restored' => 'Restauré',
    ],

    'user' => [
        'system' => 'Système',
    ],

    'actions' => [
        'view_diff' => 'Voir les modifications',
        'restore' => 'Restaurer',
        'close' => 'Fermer',
        'compare' => 'Comparer',
        'manage_excluded_fields' => 'Champs exclus',
    ],

    'diff' => [
        'heading' => 'Ce qui a changé',
        'no_changes' => 'Aucune modification dans cette version.',
        'empty_value' => '(vide)',
        'select_two' => 'Sélectionnez exactement deux versions à comparer.',
    ],

    'restore' => [
        'confirmation_heading' => 'Restaurer cette version ?',
        'confirmation_description' => 'Ceci remplacera l\'enregistrement actuel par les données de cette version.',
        'success' => 'Version restaurée.',
    ],

    'excluded_fields' => [
        'heading' => 'Champs exclus',
        'description' => 'Les champs cochés ici ne sont jamais enregistrés dans un instantané de version pour cette ressource.',
        'success' => 'Champs exclus mis à jour.',
    ],

];
