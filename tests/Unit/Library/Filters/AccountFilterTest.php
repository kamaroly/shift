<?php
namespace Tests\Unit\Library\Filters;

use CurrentAccount;
use Mockery as m;
use Tectonic\Shift\Library\Filters\AccountFilter;
use Tectonic\Shift\Modules\Accounts\Models\Account;
use Tectonic\Shift\Modules\Accounts\Services\AccountsService;
use Tectonic\Shift\Modules\Accounts\Services\CurrentAccountService;
use Tests\UnitTestCase;

class AccountFilterTest extends UnitTestCase
{
    private $mockAccount;
	private $mockAccountManagementService;
	private $mockCurrentAccountService;

    public function setUp()
	{
		parent::setUp();

        $this->mockAccount = m::mock(Account::class);
		$this->mockAccountManagementService = m::mock(AccountsService::class)->makePartial();

		$this->filter = new AccountFilter($this->mockAccountManagementService);
	}

	public function testFilterWithNoActiveAccount()
	{
		CurrentAccount::shouldReceive('determine')->once()->andReturn(null);
		$this->mockAccountManagementService->shouldReceive('totalNumberOfAccounts')->andReturn(0);

        $this->filter->filter();
	}

    public function testFilterWithActiveValidAccount()
    {
        CurrentAccount::shouldReceive('determine')->once()->andReturn($this->mockAccount);
        CurrentAccount::shouldReceive('set')->once()->with($this->mockAccount);

        $this->filter->filter();
    }
}
