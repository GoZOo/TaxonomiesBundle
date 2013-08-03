<?php

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
