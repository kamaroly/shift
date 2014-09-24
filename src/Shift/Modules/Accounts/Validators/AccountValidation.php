<?php namespace Tectonic\Shift\Modules\Accounts\Validators;

use Tectonic\Shift\Library\Validation\Validation;

class AccountValidation extends Validation
{
    public function getRules()
    {
        return [
            'name' => [
                'required',
                'unique:accounts,name,'.$this->getValue('id')
            ]
        ];
    }
}