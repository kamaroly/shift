<?php

namespace Tectonic\Shift\Modules\Accounts;

use App;
use Tectonic\Shift\Library\ServiceProvider;
use Tectonic\Shift\Modules\Accounts\Services\CurrentAccountService;
use Tectonic\Shift\Modules\Accounts\Repositories\AccountRepositoryInterface;
use Tectonic\Shift\Modules\Accounts\Repositories\DoctrineAccountRepository;
use Tectonic\Shift\Modules\Accounts\Repositories\DomainRepositoryInterface;
use Tectonic\Shift\Modules\Accounts\Repositories\DoctrineDomainRepository;

class AccountsServiceProvider extends ServiceProvider
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
	    parent::register();

        $this->registerRepositories();
        $this->registerCurrentAccountService();
    }

    /**
     * Register Account repository bindings
     *
     * @return void
     */
    protected function registerRepositories()
    {
        $this->app->singleton(AccountRepositoryInterface::class, DoctrineAccountRepository::class);
        $this->app->singleton(DomainRepositoryInterface::class, DoctrineDomainRepository::class);
    }

    /**
     * Register current account service
     *
     * @return void
     */
    protected function registerCurrentAccountService()
    {
        $this->app->singleton(CurrentAccountService::class);
    }
}