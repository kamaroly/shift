<?php

namespace Tectonic\Shift\Library\Search;

use Eloquent;
use Event;
use Tectonic\Shift\Library\Search\SearchInterface;
use Tectonic\Shift\Library\Search\Filters\SearchFilterInterface;
use Tectonic\Shift\Library\Traits\Observable;

class Search implements SearchInterface
{
	use Observable;

	/**
	 * Query object that gets used for altering query parameters.etc.
	 * 
	 * @var Query
	 */
	protected $query;

	/**
	 * Defines the default limit for paginating result sets.
	 * 
	 * @var integer
	 */
	public $limit = 50;

	/**
	 * Stores the search parameters.
	 * 
	 * @var array
	 */
	protected $params = [];

	/**
	 * Array housing all registered search filters.
	 *
	 * @var array SearchFilterInterface
	 */
	protected $filters = [];

    /**
     * Stores the result set that is returned when the query is executed.
     *
     * @var array|null
     */
    public $results = null;

    /**
     * Applies all filters/conditions to the current query by calling
     * their relevant methods and then returning the query result.
     *
     * @return Search
     */
    public function execute()
    {
        $this->fireEvent('searchFilters', $this);

        foreach ($this->filters as $filter) {
            $filter->setSearch($this);
            $filter->criteria();
        }

        $this->fireEvent('searchExecute', $this);

        $this->results = $this->query->paginate($this->limit());

        return $this;
    }

	/**
	 * Returns the results array/object (paginated object or array of objects).
	 * 
	 * @return array
     * @throws SearchResultsException
	 */
	public function results()
	{
        if (is_null($this->results)) {
            throw new SearchResultsException('$results has not yet been set. Make sure you call the execute() method before asking for a result set.');
        }

        $this->fireEvent('searchResults', $this);

		return $this->results;
	}

	/**
	 * Sets the params required for search.
	 * 
	 * @param array $params Array of search parameters.
	 */
	public function setParams(array $params)
	{
		$this->params = $params;
	}

	/**
	 * 
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Helper method for retriving the limit value. At the moment, there is
	 * no need to change this. But should we need to update how limit is controlled,
	 * then we can either do it here, or in child classes.
	 * 
	 * @return integer
	 */
	public function limit()
	{
		return $this->limit;
	}

	/**
	 * All query objects generated by the search engine, must be started by a QueryInterface.
	 * This can be a Shift model, which extends Eloquent, or something else that implements 
	 * that interface.
	 * 
	 * @param Eloquent $query
	 */
	public function setQuery(Eloquent $query)
	{
		$this->query = $query;
	}

	/**
	 * Retrieve the $query object.
	 * 
	 * @return Query
	 */
	public function getQuery()
	{
		return $this->query;
	}

	/**
	 * Returns the value for a specific parameter, or null if it doesn't exist.
	 *
	 * @param string $key
	 * @return string
	 */
	public function getParam($key)
	{
		return @$this->getParams()[$key];
	}

	/**
	 * Checks to see if the registered search parameters contain a given key.
	 *
	 * @param string $key
	 * @return boolean
	 */
	public function hasParam($key)
	{
		return !is_null(@$this->getParams()[$key]);
	}

	/**
	 * Registers a new search filter for this search.
	 *
	 * @param  SearchFilterInterface $filter
	 */
	public function addFilter(SearchFilterInterface $filter)
	{
		$this->filters[] = $filter;
	}
}
