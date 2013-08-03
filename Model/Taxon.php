<?php

namespace Rz\TaxonomiesBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
abstract class Taxon implements TaxonInterface
{
    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", type="string", unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(name="permalink", type="string", unique=true, nullable=true)
     */
    protected $permalink;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getName() ?: '-';
    }

    /**
     * {@inheritdoc}
     */
    public function isRoot()
    {
        return null === $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * {@inheritdoc}
     */
    public function getPermalink()
    {
        if (null !== $this->permalink) {
            return $this->permalink;
        }

        if (null === $this->parent) {
            return $this->slug;
        }

        return $this->permalink = $this->parent->getPermalink().'/'.$this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
