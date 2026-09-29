<?php

use ElvinQulizade\Versions\Tests\Fixtures\TrashablePost;

it('keeps versionable() resolving after the owner is soft-deleted', function () {
    $post = TrashablePost::create(['title' => 'Hello']);
    $version = $post->latestVersion();

    $post->delete();

    expect($post->trashed())->toBeTrue();
    expect($version->refresh()->versionable)->not->toBeNull();
    expect($version->versionable->is($post))->toBeTrue();
});
