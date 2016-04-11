<?php

class Riada_Price_Block_Price extends Mage_Core_Block_Template {

   

    function listproduct() {
        $product = Mage::getModel('catalog/product')->getCollection();
         foreach ($product as $prod) {
         
            $prodlist[]= $prod;
            
        }
        
        return $prodlist;
        }
    function listprovider() {
        $provider= Mage::getModel('riyada_imei/provider')->getCollection();
         foreach ($provider as $prov) {
            
            $providerlist[]= $prov;
            
        }
        
        return $providerlist;
        }

}
