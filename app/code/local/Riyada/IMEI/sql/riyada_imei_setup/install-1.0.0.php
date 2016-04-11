<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$installer = $this;
$installer->startSetup();
$installer->addAttributeGroup('catalog_product', 'Default', 'My New Attribute Group', 100);
$installer->endSetup();