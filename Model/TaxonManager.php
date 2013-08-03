<?php

namespace Rz\TaxonomiesBundle\Model;

use Rz\TaxonomiesBundle\Model\TaxonManagerInterface;

abstract class TaxonManager implements TaxonManagerInterface
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
