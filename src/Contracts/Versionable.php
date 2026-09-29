<?php

namespace ElvinQulizade\Versions\Contracts;

use ElvinQulizade\Versions\Models\Version;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Versionable
{
    public function versions(): MorphMany;

    public function latestVersion(): ?Version;

    public function recordVersion(string $event): Version;

    public function restoreVersion(Version $version): static;
}
