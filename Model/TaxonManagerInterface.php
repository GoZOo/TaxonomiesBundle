<?php

namespace Rz\TaxonomiesBundle\Model;

interface TaxonManagerInterface
{
    /**
     * Creates an empty Taxon instance
     *
     * @return Taxon
     */
    public function create();

    /**
     * Deletes a Taxon
     *
     * @param TaxonInterface $taxon
     *
     * @return void
     */
    public function delete(TaxonInterface $taxon);

    /**
     * Finds one Taxon by the given criteria
     *
     * @param array $criteria
     *
     * @return TaxonInterface
     */
    public function findOneBy(array $criteria);

    /**
     * Finds one Taxon by the given criteria
     *
     * @param array $criteria
     *
     * @return TaxonInterface
     */
    public function findBy(array $criteria);

    /**
     * Returns the Taxon's fully qualified class name
     *
     * @return string
     */
    public function getClass();

    /**
     * Save a Taxon
     *
     * @param TaxonInterface $taxon
     *
     * @return void
     */
    public function save(TaxonInterface $taxon);
}
