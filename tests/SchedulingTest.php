<?php

use Illuminate\Console\Scheduling\Schedule;

it('registers versions:prune on the scheduler when enabled', function () {
    $events = app(Schedule::class)->events();

    $event = collect($events)->first(fn ($event) => str_contains($event->command, 'versions:prune'));

    expect($event)->not->toBeNull()
        ->and($event->expression)->toBe('30 4 * * *');
});
