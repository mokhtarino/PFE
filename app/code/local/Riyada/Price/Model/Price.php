<?php
/**
 * app/code/local/MasteringMagento/Model/Price.php
 *
 * This Price code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   Price
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Riyada_Price_Model_Price extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('price/price');
    }
    public function toOptionArray()
    {
        $collection = Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect('*');

        $options = array();
        /*if ($addEmpty) {
            $options[] = array(
                'label' => Mage::helper('adminhtml')->__('-- Please Select a Category --'),
                'value' => ''
            );
        }*/

        foreach($collection as $category){
            if($category->getName() != 'Root Catalog'){
                $options[] = array(
                    'label' => $category->getName(),
                    'value' => $category->getId()
                );
            }
        }
        return $options;

    }
}
