<?php

namespace ElvinQulizade\Versions\Tests\Fixtures\PostResource\Pages;

use ElvinQulizade\Versions\Tests\Fixtures\PostResource;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;
}
