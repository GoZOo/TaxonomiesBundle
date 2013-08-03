<?php

/*
 * This file is part of the RzTaxonomiesBundle package.
 *
 * (c) mell m. zamora <mell@rzproject.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
