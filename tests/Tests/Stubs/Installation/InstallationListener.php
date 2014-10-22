<?php
namespace Tests\Stubs\Installation;

use Tectonic\Shift\Library\Validation\ValidationException;
use Tectonic\Shift\Modules\Installation\Contracts\InstallationListenerInterface;

/**
 * Class InstallationListener
 *
 * The following listener is just to be able to enforce certain behaviour with the result of installation.
 * For example, when validation fails we want to see the error messages output, and we want to throw
 * generic exceptions when installation failed for any other reason.
 *
 * @package Tests\Stubs\Installation
 */
class InstallationListener implements InstallationListenerInterface
{
    /**
     * Handler for when the installation is successful.
     *
     * @return mixed
     */
    public function onSuccess()
    {
        // do nothing
    }

    /**
     * Handler for when the installation has failed as a result of validation.
     *
     * @return mixed
     */
    public function onValidationFailure(ValidationException $exception)
    {
        print_r($exception->getFailedFields());

        throw $exception;
    }

    /**
     * Failure listener for when an install fails for any other reason.
     *
     * @return mixed
     */
    public function onFailure()
    {
        throw new \Exception('Installation failed for some reason.');
    }

}
 