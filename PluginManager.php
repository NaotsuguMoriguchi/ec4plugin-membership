<?php
/*
* Plugin Name : MemProduct
*/

namespace Plugin\MemProduct;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Plugin\MemProduct\Repository\ProductSortRepository;
use Plugin\MemProduct\Entity\ProductSort;
/**
 * Class PluginManager.
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * PluginManager constructor.
     */
    public function __construct() {
    }

    /**
     * @param null|array $meta
     * @param ContainerInterface $container
     *
     * @throws \Exception
     */
    public function enable(array $meta = null, ContainerInterface $container)
    {
        // プラグイン設定を追加
        $em = $container->get('doctrine.orm.entity_manager');
        $Config = $this->createConfig($em);
    }

   
    
    protected function createConfig(EntityManagerInterface $entityManager)
    {
        $Config = $entityManager->find(ProductSort::class, 1);
        if ($Config) {
            return $Config;
        }      
        $sortNo = 1;
        
        $Config1 = new ProductSort();
        $Config1->setName('無料');
        $Config1->setSortNo($sortNo);
        
        $entityManager->persist($Config1);        
        $entityManager->flush($Config1);
        
        $Config2 = new ProductSort();
        $Config2->setName('有料');
        $Config2->setSortNo($sortNo + 1);

        $entityManager->persist($Config2);
        $entityManager->flush($Config2);
    }

   
}