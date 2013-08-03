<?php

/*
 * This file is part of the RzTaxonomiesBundle package.
 *
 * (c) mell m. zamora <mell@rzproject.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rz\TaxonomiesBundle\Model;

Interface TaxonomyManagerInterface
{
    /**
     * Creates an empty Taxonomy instance
     *
     * @return Taxonomy
     */
    public function create();

    /**
     * Deletes a Taxonomy
     *
     * @param TaxonomyInterface $taxonomy
     *
     * @return void
     */
    public function delete(TaxonomyInterface $taxonomy);

    /**
     * Finds one Taxonomy by the given criteria
     *
     * @param array $criteria
     *
     * @return TaxonomyInterface
     */
    public function findOneBy(array $criteria);

    /**
     * Finds one Taxonomy by the given criteria
     *
     * @param array $criteria
     *
     * @return TaxonomyInterface
     */
    public function findBy(array $criteria);

    /**
     * Returns the Taxonomy's fully qualified class name
     *
     * @return string
     */
    public function getClass();

    /**
     * Save a Taxonomy
     *
     * @param TaxonomyInterface $taxonomy
     *
     * @return void
     */
    public function save(TaxonomyInterface $taxonomy);
}
