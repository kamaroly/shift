<?php
namespace Tectonic\Shift\Modules\Authentication\Observers;

use Illuminate\Auth\UserInterface;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Tectonic\Shift\Library\Traits\Respondable;
use Tectonic\Shift\Controllers\AuthenticationController;
use Tectonic\Application\Validation\ValidationException;
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
class AuthenticationResponder implements AuthenticationResponderInterface
{
    use Respondable;

    /**
     * When authentication has succeeded, then the $user object belonging to the newly
     * authenticated user, is passed back and can be handled by this observer method.
     *
     * @param \Illuminate\Auth\UserInterface    $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function onSuccess(UserInterface $user)
    {
        return Redirect::action(HomeController::class.'@user');
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
        return Redirect::action(AuthenticationController::class.'@form')
            ->withInput()
            ->withErrors($e->getValidationErrors());
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
        $messageBag = new MessageBag(['Your email and password combination appear to be incorrect!']);

        return Redirect::action(AuthenticationController::class.'@form')
            ->withInput()
            ->withErrors($messageBag);
    }
}