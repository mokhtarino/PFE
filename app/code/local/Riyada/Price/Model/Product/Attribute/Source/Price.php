<?php
/**
 * app/code/local/MasteringMagento/Model/Product/Attribute/Source/Price.php
 *
 * This Price code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   Price
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Riyada_Price_Model_Product_Attribute_Source_Price
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    /**
     * Retrieve all attribute options
     *
     * @return array
     */
     public function getAllOptions()
    {
        $collection = Mage::app()->getModel('catalog/product')->getCollection();
        var_dump($collection);
        $options = array();
        foreach ( $collection as $event ) {
            $option[] = array(
                'value' => $event->getId(),
                'label' => $event->getName()
            );
        }

        return $options;
    }
}
