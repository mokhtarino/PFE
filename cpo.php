<?php

$magePath = 'app/Mage.php'; require_once $magePath;

Mage::app(0);


$options = array();
$options[$sku] = array(
'title' => 'Cadeauverpakking?',
'type' => 'checkbox',
'is_require' => 1,
'sort_order' => 0,
'values' => array()
);

foreach($options as $sku => $option) {
$id = Mage::getModel('catalog/product')->getIdBySku($sku);
$product = Mage::getModel('catalog/product')->load($id);

if(!$product->getOptionsReadonly()) {
$product->setProductOptions(array($option));
$product->setCanSaveCustomOptions(true);
$product->save();
}
}

?>