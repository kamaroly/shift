<?php namespace Tectonic\Shift\Modules\Accounts\Validators;

use Tectonic\Shift\Library\Validation\Validator;

class AccountValidator extends Validator
{
    protected $rules = [
        'name' => ['required'],
        'url'  => ['required'],
    ];
}