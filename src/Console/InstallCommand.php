<?php

namespace LaraZeus\Pontus\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'pontus:install';

    protected $description = 'install pontus plugin';

    public function handle(): void
    {
        $this->info('publishing subscriptions ...');
        $this->call('rinvex:publish:subscriptions');

        $this->info('publishing zeus config...');
        $this->call('vendor:publish', ['--tag' => 'zeus-pontus-config']);
        $this->call('vendor:publish', ['--tag' => 'zeus-config']);

        $this->info('publishing zeus assets...');
        $this->call('vendor:publish', ['--tag' => 'zeus-assets']);

        $this->output->success('Zeus Pontus has been Installed successfully, consider ⭐️ the package in filament site :)');
    }
}
