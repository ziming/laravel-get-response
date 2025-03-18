<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Commands;

use Illuminate\Console\Command;

class LaravelGetResponseCommand extends Command
{
    public $signature = 'laravel-get-response';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
