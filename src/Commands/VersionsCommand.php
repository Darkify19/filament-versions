<?php

namespace ElvinQulizade\Versions\Commands;

use Illuminate\Console\Command;

class VersionsCommand extends Command
{
    public $signature = 'filament-versions';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
