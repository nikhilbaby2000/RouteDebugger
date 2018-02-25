<?php

namespace Arackal\RouteDebugger;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class RouteDebuggerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->importViews();
        $this->importConfig();

        /** @var Application $app */
        $app = $this->app;

        if(! $app->routesAreCached() && $this->isRouterEnabled()) {
            require __DIR__ . '/../routes/route-debugger.php';
        }
    }

    /**
     * Imports & publishes the project specific views.
     */
    protected function importViews()
    {
        $config = config('route-debugger');

        $this->loadViewsFrom(
            $this->path(data_get($config, 'view_directory')),
            data_get($config, 'view', 'route')
        );

        $this->publishes([
            $this->path('resources/views/route-debugger.blade.php') => base_path('resources/views/RouteDebugger/route-debugger.blade.php'),
        ], 'route-debugger');
    }

    /**
     * Imports & publishes the project config to the consumer project configs.
     */
    protected function importConfig()
    {
        $this->mergeConfigFrom($this->path('config/route-debugger.php'), 'route-debugger');

        $this->publishes([
            $this->path('config/route-debugger.php') => config_path('route-debugger.php'),
        ], 'route-debugger');
    }

    /**
     * Check if the router is enabled.
     *
     * @return bool
     */
    protected function isRouterEnabled()
    {
        return config('route-debugger.enabled', false);
    }

    /**
     * Gets the project path.
     *
     * @param string $path
     * @return string
     */
    protected function path($path = '')
    {
        $path = ltrim($path, '/');
        return __DIR__ . "/../{$path}";
    }
}