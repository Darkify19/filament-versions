<?php

namespace ElvinQulizade\Versions\Commands;

use ElvinQulizade\Versions\Support\VersionPruner;
use Illuminate\Console\Command;

class VersionsCommand extends Command
{
    public $signature = 'versions:prune {--model=} {--keep=}';

    public $description = 'Prune version history beyond the retention limit';

    public function handle(): int
    {
        $keep = $this->option('keep') !== null ? (int) $this->option('keep') : null;

        $deleted = VersionPruner::pruneAll($this->option('model'), $keep);

        $this->info("Pruned {$deleted} old version(s).");

        return self::SUCCESS;
    }
}
