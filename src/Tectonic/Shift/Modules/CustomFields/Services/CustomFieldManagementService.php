<?php namespace Tectonic\Shift\Modules\CustomFields\Services;

use Tectonic\Shift\Library\Support\BaseManagementService;
use Tectonic\Shift\Modules\CustomFields\Validators\CustomFieldValidator;
use Tectonic\Shift\Modules\CustomFields\Repositories\CustomFieldRepositoryInterface;

class CustomFieldManagementService extends BaseManagementService
{
    /**
     * @param CustomFieldRepositoryInterface $repository
     * @param CustomFieldValidator           $validator
     */
    public function __construct(CustomFieldRepositoryInterface $repository, CustomFieldValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
}
