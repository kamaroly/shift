<?php namespace Tectonic\Shift\Modules\Localisation;

use App;
use Event;
use Tectonic\Shift\Library\ServiceProvider;
use Tectonic\Shift\Modules\Localisation\Listeners\StartupListener;

class LocalisationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Required listeners for the system.
     *
     * @var array
     */
    protected $listeners = [
        StartupListener::class
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
	    parent::register();

        $this->registerAssetContainer();
        $this->registerTranslator();
        $this->registerLangSingleton();
        $this->registerLocaleRepository();
        $this->registerLocalisationRepository();
    }

    public function boot()
    {
	    parent::boot();

        $this->registerCustomValidationRules();

        \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation', __DIR__.'/../../../../vendor/jms/serializer/src'
        );
    }

    /**
     * Register the Asset container. This is an extended version of Orchestra\Asset\Factory
     *
     * @return void
     */
    public function registerAssetContainer()
    {
        $this->app->bindShared('shift.asset', function($app) {
            return new \Tectonic\Shift\Library\Support\AssetFactory($app['orchestra.asset.dispatcher']);
        });
    }

    /**
     * Register Translator
     *
     * @return void
     */
    protected function registerTranslator()
    {
        $this->app->bindShared('shift.translator', function($app)
        {
            return new \Tectonic\Shift\Library\Translation\Translator(
                $app['translation.loader'],
                $app['Tectonic\Shift\Modules\Localisation\Contracts\LocalisationRepositoryInterface'],
                $app['config']['app.locale'],
                $app['config']['shift.language.autoloads'], // @TODO: change to $app['config']['shift::language.autoloads']
                $app['config']['shift.language.supported_locales']   // @TODO: change to $app['config']['shift::language.supported_locales']
            );
        });

        $this->app->bind('Symfony\Component\Translation\TranslatorInterface', function($app) {
            return $app['shift.translator'];
        });
    }

    /**
     * Register lang singleton
     *
     * @return void
     */
    protected function registerLangSingleton()
    {
        $this->app->singleton('lang', function($app) {
            return $app['shift.translator'];
        });
    }

    /**
     * Register locale repository
     *
     * @return void
     */
    protected function registerLocaleRepository()
    {
        $this->app->bindShared('Tectonic\Shift\Modules\Localisation\Contracts\LocaleRepositoryInterface', function()
        {
            return $this->app->make('Tectonic\Shift\Modules\Localisation\Repositories\DoctrineLocaleRepository');
        });
    }

    /**
     * Register localisation repository
     *
     * @return void
     */
    protected function registerLocalisationRepository()
    {
        $this->app->bindShared('Tectonic\Shift\Modules\Localisation\Contracts\LocalisationRepositoryInterface', function()
        {
            return $this->app->make('Tectonic\Shift\Modules\Localisation\Repositories\DoctrineLocalisationRepository');
        });
    }

    /**
     * Register custom validation rules
     *
     * @return void
     */
    private function registerCustomValidationRules()
    {
        // Add validation rule to validating ISO language codes (en-GB)
        $this->app['Illuminate\Validation\Factory']
            ->extend('localeCode', 'Tectonic\Shift\Modules\Localisation\Validators\LocaleCustomValidationRules@localeCode');
    }
}
