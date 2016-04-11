<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 10/11/2015
 * Time: 12:01
 */ 
class Riyada_IMEI_Block_Sales_Order_Email_Items_Order_Default extends Mage_Sales_Block_Order_Email_Items_Order_Default {

    public function getItemOptions()
    {
        $result = array();
        if ($options = $this->getItem()->getProductOptions()) {
            if (isset($options['options'])) {
                $result = array_merge($result, $options['options']);
            }
           /* if (isset($options['additional_options'])) {
                $result = array_merge($result, $options['additional_options']);
            }*/
            if (isset($options['attributes_info'])) {
                $result = array_merge($result, $options['attributes_info']);
            }
        }

        return $result;
    }

}