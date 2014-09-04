<?php


namespace Tectonic\Shift\Modules\Accounts\Entities;

/**
 * Class Accountable
 *
 * The accountable trait can be used to inject required account-based functionality to your entities.
 *
 * @package Tectonic\Shift\Modules\Accounts\Entities
 */
trait Accountable
{
    /**
     * @Column(type="integer")
     */
    private $accountId;

    /**
     * @ManyToOne(targetEntity="Tectonic\Shift\Modules\Accounts\Entities\Account", mappedBy="accountId")
     */
    private $account;

    /**
     * Returns the account associated with this domain.
     *
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set the account that will be saved.
     *
     * @param Account $account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }
}
