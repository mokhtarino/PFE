<?php
class Riada_Price_Model_Price extends Mage_Core_Model_Abstract
{
     public function _construct()
     {
         parent::_construct();
         $this->_init('price/price');
     }
      public function toOptionArray($collection)
    {
        

        $options = array();
        /*if ($addEmpty) {
            $options[] = array(
                'label' => Mage::helper('adminhtml')->__('-- Please Select a Category --'),
                'value' => ''
            );
        }*/

        foreach($collection as $product){
           
                $options[] = array(
                    'label' => $product->getName(),
                    'value' => $product->getId()
                );
            
        }
        return $options;

    }
      public function optionjs($collection)
    {
        

       
        /*if ($addEmpty) {
            $options[] = array(
                'label' => Mage::helper('adminhtml')->__('-- Please Select a Category --'),
                'value' => ''
            );
        }*/

        foreach($collection as $product){
           
                $options[] = array('label' => $product->getName(),'value' => $product->getId());
            
        }
        return $options;

    }
     
   
}