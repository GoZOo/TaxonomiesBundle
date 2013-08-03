<?php


namespace Rz\TaxonomiesBundle\Entity;

use Rz\TaxonomiesBundle\Model\TaxonManager as BaseTaxonManager;
use Rz\TaxonomiesBundle\Model\TaxonInterface;

use Doctrine\ORM\EntityManager;

class TaxonManager extends BaseTaxonManager
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     * @param string                      $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em    = $em;
        $this->class = $class;
    }

    /**
     * {@inheritDoc}
     */
    public function save(TaxonInterface $category)
    {
        $this->em->persist($category);
        $this->em->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function findOneBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findOneBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function findBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(TaxonInterface $category)
    {
        $this->em->remove($category);
        $this->em->flush();
    }

    public function fetchTaxons() {
        $entityManager = $this->em->getRepository($this->class);
        $query = $entityManager->createQueryBuilder('category')
                 ->orderBy('category.root', 'ASC')
                 ->addOrderBy('category.left', 'ASC')
                 ->getQuery();
        return $query->getResult();
    }
}
