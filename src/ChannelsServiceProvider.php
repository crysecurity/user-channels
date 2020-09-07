<?php

namespace Cr4Sec\UserChannels;

use Cr4Sec\UserChannels\View\Components\UserChannelsListComponent;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class ChannelsServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/../config/channels.php' => config_path('cr4sec/channels.php'),
            ], 'channels-config');

            $this->publishes([
                __DIR__.'/../database/migrations/create_channels_tables.php.stub' => $this->getMigrationFileName($filesystem),
            ], 'channels-migrations');

            $this->publishes([
                __DIR__.'/../resources/views/components' => resource_path('views/components/cr4sec'),
            ], 'channels-views');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/cr4sec/channels'),
            ], 'channels-assets');
        }

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewComponentsAs('', [UserChannelsListComponent::class]);
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_channels_tables.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_channels_tables.php")
            ->first();
    }
}
