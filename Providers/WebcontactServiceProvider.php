<?php namespace Modules\Webcontact\Providers;

use Illuminate\Support\ServiceProvider;

class WebcontactServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Webcontact\Repositories\WebContactRepository',
            function () {
                $repository = new \Modules\Webcontact\Repositories\Eloquent\EloquentWebContactRepository(new \Modules\Webcontact\Entities\WebContact());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Webcontact\Repositories\Cache\CacheWebContactDecorator($repository);
            }
        );
// add bindings

    }
}
