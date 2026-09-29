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
    config()->set('filament-versions.authorize_restore', fn () => false);

    $post = Post::create(['title' => 'Hello']);

    Livewire::test(VersionsRelationManager::class, [
        'ownerRecord' => $post,
        'pageClass' => EditPost::class,
    ])->assertTableActionHidden('restore', $post->latestVersion());
});

it('only offers to compare when exactly two versions are selected', function () {
    $post = Post::create(['title' => 'v1']);
    $post->update(['title' => 'v2']);
    $post->update(['title' => 'v3']);

    $versions = $post->versions()->pluck('id');

    Livewire::test(VersionsRelationManager::class, [
        'ownerRecord' => $post,
        'pageClass' => EditPost::class,
    ])
        ->selectTableRecords([$versions[0]])
        ->assertTableBulkActionHidden('compare')
        ->selectTableRecords([$versions[0], $versions[1]])
        ->assertTableBulkActionVisible('compare');
});

it('excludes a field from future snapshots once managed in the panel', function () {
    $post = Post::create(['title' => 'Hello', 'body' => 'World']);

    Livewire::test(VersionsRelationManager::class, [
        'ownerRecord' => $post,
        'pageClass' => EditPost::class,
    ])
        ->callTableAction('manageExcludedFields', data: ['excluded_fields' => ['body']])
        ->assertSuccessful();

    $post->update(['body' => 'Universe']);

    expect($post->latestVersion()->data)->not->toHaveKey('body');
});
