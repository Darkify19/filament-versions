<?php

use ElvinQulizade\Versions\Filament\RelationManagers\VersionsRelationManager;
use ElvinQulizade\Versions\Tests\Fixtures\Post;
use ElvinQulizade\Versions\Tests\Fixtures\PostResource\Pages\EditPost;
use Filament\Facades\Filament;
use Livewire\Livewire;

beforeEach(function () {
    Filament::setCurrentPanel($this->panel());
});

it('renders the history tab with the version timeline', function () {
    $post = Post::create(['title' => 'Hello', 'body' => 'World']);
    $post->update(['title' => 'Updated']);

    Livewire::test(VersionsRelationManager::class, [
        'ownerRecord' => $post,
        'pageClass' => EditPost::class,
    ])->assertSuccessful();
});

it('restores a version through the restore action', function () {
    $post = Post::create(['title' => 'Hello', 'body' => 'World']);
    $original = $post->latestVersion();

    $post->update(['title' => 'Updated']);

    Livewire::test(VersionsRelationManager::class, [
        'ownerRecord' => $post,
        'pageClass' => EditPost::class,
    ])
        ->callTableAction('restore', $original)
        ->assertSuccessful();

    expect($post->fresh()->title)->toBe('Hello');
});

it('hides the restore action when authorization denies it', function () {
    config()->set('versions.authorize_restore', fn () => false);

    $post = Post::create(['title' => 'Hello']);

    Livewire::test(VersionsRelationManager::class, [
        'ownerRecord' => $post,
        'pageClass' => EditPost::class,
    ])->assertTableActionHidden('restore', $post->latestVersion());
});
