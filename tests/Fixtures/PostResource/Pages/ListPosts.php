<?php

namespace ElvinQulizade\Versions\Tests\Fixtures\PostResource\Pages;

use ElvinQulizade\Versions\Tests\Fixtures\PostResource;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
}
