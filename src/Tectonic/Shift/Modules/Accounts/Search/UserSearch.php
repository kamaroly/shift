<?php

namespace Tectonic\Shift\Modules\Accounts\Search;

use Tectonic\Shift\Modules\Accounts\Models\User;
use Tectonic\Shift\Library\Search\Filters\KeywordFilter;
use Tectonic\Shift\Library\Search\Filters\OrderFilter;

class UserSearch extends \Tectonic\Shift\Library\Search\Search
{
	private $keywordFilter;

	private $orderFilter;

	public function __construct(User $user, KeywordFilter $keywordFilter, OrderFilter $orderFilter)
	{
		$this->setQuery($user);

		$this->keywordFilter = $keywordFilter;
		$this->orderFilter = $orderFilter;

		$this->registerFilters();
	}

	public function registerFilters()
	{
		$this->addFilter($this->keywordFilter);
		$this->addFilter($this->orderFilter);
	}
}