<?php

namespace Watershine\FirebaseBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class WatershineFirebaseExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $cloudMessagingService = $container->getDefinition( 'watershine_firebase.cloud_messaging' );
        $cloudMessagingService->addMethodCall( 'setFirebaseURL', array( $config[ 'firebase_url' ] ) );
        $cloudMessagingService->addMethodCall( 'setAuthorizationKey', array( $config[ 'authorization_key' ] ) );

    }

    public function getAlias()
    {
        return 'watershine_firebase';
    }


}
