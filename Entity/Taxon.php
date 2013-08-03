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

use Rz\TaxonomiesBundle\Model\Taxon as BaseTaxon;
use Rz\TaxonomiesBundle\Model\TaxonInterface;
use Rz\TaxonomiesBundle\Model\TaxonomyInterface;

class Taxon extends BaseTaxon
{

    protected $left;


    protected $level;


    protected $right;


    protected $root;


    protected $parent;


    protected $children;


    /**
     * The taxonomy of this taxon.
     *
     * @var TaxonomyInterface
     */
    protected $taxonomy;

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left)
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right)
    {
        $this->right = $right;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getRoot()
    {
        return $this->root;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent(TaxonInterface $parent = null)
    {
        $this->parent = $parent;
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * {@inheritdoc}
     */
    public function hasChild(TaxonInterface $taxon)
    {
        return $this->children->contains($taxon);
    }

    /**
     * {@inheritdoc}
     */
    public function addChild(TaxonInterface $taxon)
    {
        if (!$this->hasChild($taxon)) {
            $taxon->setParent($this);

            $this->children->add($taxon);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeChild(TaxonInterface $taxon)
    {
        if ($this->hasChild($taxon)) {
            $taxon->setParent(null);

            $this->children->removeElement($taxon);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * {@inheritdoc}
     */
    public function setTaxonomy(TaxonomyInterface $taxonomy = null)
    {
        $this->taxonomy = $taxonomy;
    }
}
