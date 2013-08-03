<?php

namespace Rz\TaxonomiesBundle\Entity;

use Rz\TaxonomiesBundle\Model\Taxonomy as BaseTaxonomy;

/**
 * Entity for taxonomies.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class Taxonomy extends BaseTaxonomy
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        //$this->setRoot(new Taxon());
    }
}
