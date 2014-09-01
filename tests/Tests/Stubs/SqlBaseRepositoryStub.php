<?php

namespace Tests\Stubs;

use Tectonic\Shift\Library\Support\Database\Eloquent\EloquentBaseRepository;

class EloquentBaseRepositoryStub extends EloquentBaseRepository
{
	public function __construct($model, $search)
	{
		$this->model = $model;
		$this->search = $search;
	}
}