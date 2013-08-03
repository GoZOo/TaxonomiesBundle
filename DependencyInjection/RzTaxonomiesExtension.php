<?php

namespace Rz\TaxonomiesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class RzTaxonomiesExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('admin.xml');
        $loader->load('orm.xml');
        $loader->load('services.xml');

        $this->configureClass($config, $container);
        $this->configureAdmin($config, $container);
    }

    /**
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function configureClass($config, ContainerBuilder $container)
    {
        // admin configuration
        $container->setParameter('rz_taxonomies.admin.taxon.entity',       $config['class']['taxon']);
        $container->setParameter('rz_taxonomies.admin.taxonomy.entity',    $config['class']['taxonomy']);

        // manager configuration
        $container->setParameter('rz_taxonomies.manager.taxon.entity',     $config['class']['taxon']);
        $container->setParameter('rz_taxonomies.manager.taxonomy.entity',  $config['class']['taxonomy']);
    }

    /**
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function configureAdmin($config, ContainerBuilder $container)
    {
        $container->setParameter('rz_taxonomies.admin.taxon.class',              $config['admin']['taxon']['class']);
        $container->setParameter('rz_taxonomies.admin.taxon.controller',         $config['admin']['taxon']['controller']);
        $container->setParameter('rz_taxonomies.admin.taxon.translation_domain', $config['admin']['taxon']['translation']);

        $container->setParameter('rz_taxonomies.admin.taxonomy.class',              $config['admin']['taxonomy']['class']);
        $container->setParameter('rz_taxonomies.admin.taxonomy.controller',         $config['admin']['taxonomy']['controller']);
        $container->setParameter('rz_taxonomies.admin.taxonomy.translation_domain', $config['admin']['taxonomy']['translation']);

    }
}
