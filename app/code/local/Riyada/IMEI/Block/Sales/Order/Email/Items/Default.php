<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 10/11/2015
 * Time: 12:13
 */ 
class Riyada_IMEI_Block_Sales_Order_Email_Items_Default extends Mage_Sales_Block_Order_Email_Items_Default {

    public function getItemOptions()
    {
        $result = array();
        if ($options = $this->getItem()->getOrderItem()->getProductOptions()) {
            if (isset($options['options'])) {
                $result = array_merge($result, $options['options']);
            }
            if (isset($options['additional_options'])) {
                $result = array_merge($result, array_slice($options['additional_options'],0,1));
            }
            if (isset($options['attributes_info'])) {
                $result = array_merge($result, $options['attributes_info']);
            }
        }

        return $result;
    }

}