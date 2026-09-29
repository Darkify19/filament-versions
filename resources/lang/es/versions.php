<?php

// translations for ElvinQulizade/Versions
return [

    'tab' => [
        'title' => 'Historial',
    ],

    'columns' => [
        'when' => 'Fecha',
        'event' => 'Evento',
        'user' => 'Usuario',
    ],

    'events' => [
        'created' => 'Creado',
        'updated' => 'Actualizado',
        'restored' => 'Restaurado',
    ],

    'user' => [
        'system' => 'Sistema',
    ],

    'actions' => [
        'view_diff' => 'Ver cambios',
        'restore' => 'Restaurar',
        'close' => 'Cerrar',
        'compare' => 'Comparar',
        'manage_excluded_fields' => 'Campos excluidos',
    ],

    'diff' => [
        'heading' => 'Qué cambió',
        'no_changes' => 'No hay cambios en esta versión.',
        'empty_value' => '(vacío)',
        'select_two' => 'Selecciona exactamente dos versiones para comparar.',
    ],

    'restore' => [
        'confirmation_heading' => '¿Restaurar esta versión?',
        'confirmation_description' => 'Esto sobrescribirá el registro actual con los datos de esta versión.',
        'success' => 'Versión restaurada.',
    ],

    'excluded_fields' => [
        'heading' => 'Campos excluidos',
        'description' => 'Los campos marcados aquí nunca se guardan en una instantánea de versión para este recurso.',
        'success' => 'Campos excluidos actualizados.',
    ],

];
