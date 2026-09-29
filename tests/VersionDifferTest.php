<?php

use ElvinQulizade\Versions\Support\VersionDiffer;

it('diffs changed, added and removed fields', function () {
    $diff = VersionDiffer::diff(
        ['title' => 'Hello', 'body' => 'World', 'draft' => true],
        ['title' => 'Hello', 'body' => 'Universe', 'published_at' => '2026-01-01'],
    );

    expect($diff)->toHaveKeys(['body', 'draft', 'published_at']);
    expect($diff)->not->toHaveKey('title');
    expect($diff['body'])->toBe(['old' => 'World', 'new' => 'Universe']);
    expect($diff['draft'])->toBe(['old' => true, 'new' => null]);
    expect($diff['published_at'])->toBe(['old' => null, 'new' => '2026-01-01']);
});

it('returns an empty diff for identical snapshots', function () {
    $snapshot = ['title' => 'Hello'];

    expect(VersionDiffer::diff($snapshot, $snapshot))->toBe([]);
});
