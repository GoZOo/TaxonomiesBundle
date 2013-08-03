<?php

/*
 * This file is part of the RzTaxonomiesBundle package.
 *
 * (c) mell m. zamora <mell@rzproject.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rz\TaxonomiesBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Rz\TaxonomiesBundle\Model\TaxonManagerInterface;

class TaxonChoiceType extends AbstractType
{
    protected $manager;

    /**
     * @param TaxonManagerInterface $manager
     */
    public function __construct(TaxonManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'sonata_type_model';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $that = $this;

        $resolver->setDefaults(array(
                                   'choice_list' => function (Options $opts, $previousValue) use ($that) {
                                       return new SimpleChoiceList($that->getChoices($opts));
                                   },
                               ));
    }

    /**
     * @param Options $options
     *
     * @return array
     */
    public function getChoices(Options $options)
    {
        $taxons = $this->manager->fetchTaxons();

        $choices = array();

        foreach ($taxons as $taxon) {
            $choices[$taxon->getId()] = $taxon;
        }

        return $choices;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'rz_taxonomies_taxon_choice';
    }
}
