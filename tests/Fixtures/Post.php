<?php

namespace ElvinQulizade\Versions\Tests\Fixtures;

use ElvinQulizade\Versions\Concerns\HasVersions;
use ElvinQulizade\Versions\Contracts\Versionable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Versionable
{
    use HasVersions;

    protected $guarded = [];

    protected $table = 'posts';
}
