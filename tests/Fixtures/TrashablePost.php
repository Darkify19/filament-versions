<?php

namespace ElvinQulizade\Versions\Tests\Fixtures;

use ElvinQulizade\Versions\Concerns\HasVersions;
use ElvinQulizade\Versions\Contracts\Versionable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrashablePost extends Model implements Versionable
{
    use HasVersions;
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'trashable_posts';
}
