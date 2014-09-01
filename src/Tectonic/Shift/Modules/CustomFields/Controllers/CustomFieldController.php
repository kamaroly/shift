<?php namespace Tectonic\Shift\Modules\CustomFields\Controllers;

use Tectonic\Shift\Library\Support\Controller;
use Tectonic\Shift\Modules\CustomFields\Validators\CustomFieldValidator;
use Tectonic\Shift\Modules\CustomFields\Services\CustomFieldManagementService;
use Tectonic\Shift\Modules\CustomFields\Repositories\CustomFieldRepositoryInterface;

class CustomFieldController extends Controller
{

    public function __construct(
        CustomFieldRepositoryInterface $repository,
        CustomFieldValidator $validator,
        CustomFieldManagementService $service
    ) {
        $this->validator   = $validator;
        $this->repository  = $repository;
        $this->crudService = $service;
    }

}
