<?php

use ElvinQulizade\Versions\Tests\Fixtures\Post;

it('merges the package config file under the filament-versions key', function () {
    expect(config('filament-versions.max_versions_per_model'))->toBe(50)
        ->and(config('filament-versions.excluded_attributes'))->toContain('password');
});

it('keeps only the configured number of versions per model', function () {
    config()->set('filament-versions.max_versions_per_model', 3);

    $post = Post::create(['title' => 'v1']);
    $post->update(['title' => 'v2']);
    $post->update(['title' => 'v3']);
    $post->update(['title' => 'v4']);
    $post->update(['title' => 'v5']);

    expect($post->versions()->count())->toBe(3);
    expect($post->latestVersion()->data['title'])->toBe('v5');
});

it('prunes globally via the artisan command', function () {
    config()->set('filament-versions.max_versions_per_model', 50);

    $post = Post::create(['title' => 'v1']);
    $post->update(['title' => 'v2']);
    $post->update(['title' => 'v3']);

    $this->artisan('versions:prune', ['--keep' => 1])
        ->expectsOutputToContain('Pruned 2 old version(s).')
        ->assertExitCode(0);

    expect($post->versions()->count())->toBe(1);
});
