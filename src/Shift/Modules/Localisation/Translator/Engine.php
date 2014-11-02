<?php
namespace Tectonic\Shift\Modules\Localisation\Translator;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Tectonic\Shift\Modules\Localisation\Contracts\TransformerInterface;
use Tectonic\Shift\Modules\Localisation\Services\Localiser;

/**
 * Class Engine
 *
 * Works on a single object, and calls the appropriate transformer to work on said object. You can
 * register any number of transformers that can be used to transform a given object for translation.
 *
 * Simply call the registerTransformer method:
 *
 *     $engine->registerTransformer($transformer);
 *
 * Or, you can call it via the Facade:
 *
 *     Translator::registerTransformer($transformer);
 *
 * @package Tectonic\Shift\Modules\Localisation\Support\Transformers
 */
class Engine
{
    /**
     * Stores the possible translators that can be used for object translation.
     *
     * @var array
     */
    private $transformers = [];

    /**
     * The translate method is simply a helper that can be used as the entry point for all translations.
     *
     * @param mixed $object
     */
    public function translate($object)
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->isAppropriateFor($object)) {
                return $transformer->transform($object);
            }
        }
    }

    /**
     * Registers a new transformer that can be used for translations. You can pass
     * many transformers at once, if you so wish.
     *
     * @param TransformerInterface $transformers
     */
    public function registerTransformer(TransformerInterface ...$transformers)
    {
        foreach ($transformers as $transformer) {
            $this->transformers[] = $transformer;
        }
    }
}