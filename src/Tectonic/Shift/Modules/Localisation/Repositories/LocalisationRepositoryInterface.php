<?php namespace Tectonic\Shift\Modules\Localisation\Repositories;

use Tectonic\Shift\Library\Support\BaseRepositoryInterface;

interface LocalisationRepositoryInterface extends BaseRepositoryInterface
{
    public function getUILocalisations($localeId);
}