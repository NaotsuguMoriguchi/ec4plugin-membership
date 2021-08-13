<?php

namespace Plugin\MemProduct\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Eccube\EntityExtension("Eccube\Entity\Product")
 */
trait ProductTrait
{
    
    /**
     * @var \Plugin\MemProduct\Entity\ProductSort
     *
     * @ORM\ManyToOne(targetEntity="Plugin\MemProduct\Entity\ProductSort")
     * @ORM\JoinColumn(name="product_sort_id", 
     *                  referencedColumnName="id")
     * @Eccube\FormAppend(
     *   auto_render=true,
     *   type="\Plugin\MemProduct\Form\Type\ProductSortType",
     *   options={
     *     "required": false,
     *     "label": "有料/無料 Product",
     *   })
     */

    private $prodsort;

    /**
     * Get prodsort.
     *
     * @return \Plugin\MemProduct\Entity\ProductSort|null
     */
    public function getProdsort()
    {
        return $this->prodsort;
    }
    public function setProdsort($type)
    {
        $this->prodsort = $type;
    }
    
}