<?php

class Riyada_IMEI_Model_CategoriesList
{
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
