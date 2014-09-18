<?php

namespace Tectonic\Shift\Library\Support;

use App;
use Illuminate\Routing\Controller as Ctrl;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Tectonic\Shift\Library\BaseValidator;
use Tectonic\Shift\Library\SqlBaseRepositoryInterface;

abstract class Controller extends Ctrl
{
	/**
	 * Stores the full path to the search class to be used for search. The default search
	 * class is derived from conventions. The search class itself should sit inside the Search
	 * directory within a module.
	 *
	 * @var string
	 */
	public $searchClass;

    /**
     * The CRUDService stored represents the basic or base functionality for a given resource.
     *
     * @var CRUDService
     */
    public $crudService;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$search = $this->resolveSearchClass();

		$search->setParams(Input::get());
        $search->execute();

		return $search->results();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
        $this->crudService->create(Input::get());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		return $this->crudService->get($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id)
	{
        return $this->crudService->update($id, Input::get());
	}

	/**
	 * Remove the specified resource from storage. If no id is provided as part of the URL,
     * then it will look to the delete's payload, which should be an array of ids to remove.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id = null)
	{
        if ($id) {
            $ids = [$id];
        }
        else {
            $ids = Input::get();
        }

        foreach ($ids as $id) {
            $this->crudService->delete($id);
        }

        return Response::make(null, 200);
	}

	/**
	 * Returns the resolved search class.
	 *
	 * @return mixed
	 */
	protected function resolveSearchClass()
	{
		$className = $this->resolveSearchClassName($this->searchClass);

		$searchClass = App::make($className);

		return $searchClass;
	}

	/**
	 * Returns the name of the search class to be used for search execution.
	 *
	 * @param string $searchClass
	 * @return string
	 */
	protected function resolveSearchClassName()
	{
		return App::make($this->searchClass);
	}
}
