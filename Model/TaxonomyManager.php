<?php

namespace Rz\TaxonomiesBundle\Model;

use Rz\TaxonomiesBundle\Model\TaxonomyManagerInterface;

abstract class TaxonomyManager implements TaxonomyManagerInterface
{
    /**
     * @var string
     */
    protected $class;

    /**
     * {@inheritDoc}
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * {@inheritDoc}
     */
    public function create()
    {
        return new $this->class;
    }
}
