<?php

use ElvinQulizade\Versions\Tests\Fixtures\Post;

it('records a version when a model is created', function () {
    $post = Post::create(['title' => 'Hello', 'body' => 'World']);

    expect($post->versions()->count())->toBe(1);
    expect($post->latestVersion()->event)->toBe('created');
    expect($post->latestVersion()->data['title'])->toBe('Hello');
});

it('records a version on every update', function () {
    $post = Post::create(['title' => 'Hello', 'body' => 'World']);

    $post->update(['title' => 'Updated']);

    expect($post->versions()->count())->toBe(2);
    expect($post->latestVersion()->event)->toBe('updated');
    expect($post->latestVersion()->data['title'])->toBe('Updated');
});

it('restores a model to a previous version and records a restored version', function () {
    $post = Post::create(['title' => 'Hello', 'body' => 'World']);
    $original = $post->latestVersion();

    $post->update(['title' => 'Updated']);

    $post->restoreVersion($original);

    expect($post->fresh()->title)->toBe('Hello');
    expect($post->versions()->count())->toBe(3);
    expect($post->latestVersion()->event)->toBe('restored');
});

it('excludes configured attributes from the snapshot', function () {
    config()->set('versions.excluded_attributes', ['body']);

    $post = Post::create(['title' => 'Hello', 'body' => 'World']);

    expect($post->latestVersion()->data)->not->toHaveKey('body');
});
