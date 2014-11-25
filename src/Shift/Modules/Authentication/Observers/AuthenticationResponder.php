<?php
namespace Tectonic\Shift\Modules\Authentication\Observers;

use Illuminate\Routing\Redirector;
use Tectonic\Shift\Controllers\HomeController;
use Tectonic\Shift\Library\Traits\Respondable;
use Tectonic\Application\Validation\ValidationException;
use Tectonic\Shift\Modules\Authentication\Contracts\User;
use Tectonic\Shift\Modules\Authentication\Contracts\AuthenticationResponderInterface;
use Tectonic\Shift\Modules\Authentication\Exceptions\InvalidAuthenticationCredentialsException;

/**
 * Class AuthenticationResponder
 *
 * This authentication listener manages the responses to be sent back to the browser when
 * an authentication request is either successful or fails.
 *
 * @package Tectonic\Shift\Modules\Authentication\Observers
 */
class AuthenticationObserver implements AuthenticationResponderInterface
{
    use Respondable;

    /**
     * @var \Illuminate\Routing\Redirector
     */
    protected $redirector;

    /**
     * @param \Illuminate\Routing\Redirector $redirector
     */
    public function __construct(Redirector $redirector)
    {
        $this->redirector = $redirector;
    }

    /**
     * When authentication has succeeded, then the $user object belonging to the newly
     * authenticated user, is passed back and can be handled by this observer method.
     *
     * @param \Tectonic\Shift\Modules\Authentication\Contracts\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function onSuccess(User $user)
    {
        return $this->redirector->action(HomeController::class.'@user');
    }

    /**
     * Called when a validation exception is thrown by the command handler.
     *
     * @param \Tectonic\Application\Validation\ValidationException $e
     *
     * @return $this
     */
    public function onValidationFailure(ValidationException $e)
    {
        return $this->redirector
            ->action(HomeController::class.'@index')
            ->withInput()
            ->withErrors($e->getValidator());
    }

    /**
     * Called when a authentication exception is thrown by the command handler.
     *
     * @param \Tectonic\Shift\Modules\Authentication\Exceptions\InvalidAuthenticationCredentialsException $e
     *
     * @return $this
     */
    public function onAuthenticationFailure(InvalidAuthenticationCredentialsException $e)
    {
        return $this->redirector
            ->action(HomeController::class.'@index')
            ->withInput();
    }
}