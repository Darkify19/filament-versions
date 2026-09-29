<?php

namespace ElvinQulizade\Versions\Tests\Fixtures;

use ElvinQulizade\Versions\Concerns\HasVersions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasVersions;

    protected $guarded = [];

    protected $table = 'posts';
}
