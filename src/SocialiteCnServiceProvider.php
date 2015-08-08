<?php 
namespace Daids\SocialiteCn;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\SocialiteServiceProvider;

class SocialiteCnServiceProvider extends SocialiteServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new SocialiteCnManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Laravel\Socialite\Contracts\Factory'];
    }
}
