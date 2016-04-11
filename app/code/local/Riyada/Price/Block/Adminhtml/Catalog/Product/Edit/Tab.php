<?php
class Riyada_Price_Block_Adminhtml_Catalog_Product_Edit_Tab 
extends Mage_Core_Block_Template implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
 public function __construct(){
  $this->setTemplate('custom/content.phtml');
  parent::__construct();
 }

 //Label to be shown in the tab
 public function getTabLabel(){
  return Mage::helper('core')->__('Custom Tab');
 }
 public function getproduct() {
    if(Mage::registry('current_product')) { 
    $product = Mage::registry('current_product');
   
    
    return $product;
} 
 }
 public function getTabTitle(){
  return Mage::helper('core')->__('Custom Tab');
 }

 public function canShowTab(){
  return true;
 }

 public function isHidden(){
  return false;
 }

 
}