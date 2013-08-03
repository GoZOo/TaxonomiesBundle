<?php

namespace Rz\TaxonomiesBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;
use Rz\TaxonomiesBundle\Model\TaxonManagerInterface;

class TaxonAdmin extends Admin
{

    protected $parentAssociationMapping = 'taxonomy';

    protected $taxonManager;

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        if($this->getSubject()->isRoot()  &&  !$this->isChild()) {
            $formMapper->add('taxonomy', 'sonata_type_model_list');
        }

        $formMapper
            ->add('name')
            ->add('parent', 'rz_type_tree',
                  array(
                      'choice_list' => new SimpleChoiceList($this->getChoices()),
                      'model_manager' => $this->getModelManager(),
                      'class'         => $this->getClass(),
                      'required'      => false, 
                      'current'      => $this->getSubject() ?: null))
            ->add('description', null, array('required' => false))
        ;
    }

    /**
     *
     * @return array
     */
    public function getChoices()
    {
        $taxons = $this->taxonManager->fetchTaxons();
        $choices = array();
        foreach ($taxons as $taxon) {
            $choices[$taxon->getId()] = $taxon;
        }
        return $choices;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('name')
        ->add('description')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('name')
        ->add('parent')
        ->add('deescription')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        if(!$object->isRoot()) {
            $root = $this->taxonManager->findOneBy(array('id'=>$object->getRoot()));
            $object->setTaxonomy($root->getTaxonomy() ?: null);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        if(!$object->isRoot()) {
            $root = $this->taxonManager->findOneBy(array('id'=>$object->getRoot()));
            $object->setTaxonomy($root->getTaxonomy() ?: null);
        }
    }

    public function setTaxonManager(TaxonManagerInterface $taxonManager) {
        $this->taxonManager = $taxonManager;
    }
}
