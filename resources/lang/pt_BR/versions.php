<?php

// translations for ElvinQulizade/Versions
return [

    'tab' => [
        'title' => 'Histórico',
    ],

    'columns' => [
        'when' => 'Data',
        'event' => 'Evento',
        'user' => 'Usuário',
    ],

    'events' => [
        'created' => 'Criado',
        'updated' => 'Atualizado',
        'restored' => 'Restaurado',
    ],

    'user' => [
        'system' => 'Sistema',
    ],

    'actions' => [
        'view_diff' => 'Ver alterações',
        'restore' => 'Restaurar',
        'close' => 'Fechar',
        'compare' => 'Comparar',
        'manage_excluded_fields' => 'Campos excluídos',
    ],

    'diff' => [
        'heading' => 'O que mudou',
        'no_changes' => 'Nenhuma alteração nesta versão.',
        'empty_value' => '(vazio)',
        'select_two' => 'Selecione exatamente duas versões para comparar.',
    ],

    'restore' => [
        'confirmation_heading' => 'Restaurar esta versão?',
        'confirmation_description' => 'Isso substituirá o registro atual pelos dados desta versão.',
        'success' => 'Versão restaurada.',
    ],

    'excluded_fields' => [
        'heading' => 'Campos excluídos',
        'description' => 'Os campos marcados aqui nunca são armazenados em um snapshot de versão para este recurso.',
        'success' => 'Campos excluídos atualizados.',
    ],

];
