<?php

namespace Tectonic\Shift\Modules\Security\Controllers;

use Tectonic\Shift\Library\Support\Controller;
use Tectonic\Shift\Modules\Security\Services\RoleManagementService;

class RoleController extends Controller
{
	public function __construct(RoleManagementService $roleManagementService)
	{
		$this->crudService = $roleManagementService;
	}
}
