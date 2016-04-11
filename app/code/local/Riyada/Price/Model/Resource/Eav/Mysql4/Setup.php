<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Riyada_Price_Model_Resource_Eav_Mysql4_Setup extends Mage_Eav_Model_Entity_Setup
    {
        public function getDefaultEntities()
    {
        return array(
            'catalog_product' => array(
                'entity_model'      => 'catalog/product',
                'attribute_model'   => 'catalog/resource_eav_attribute',
                'table'             => 'catalog/product',
                'attributes'        => array(
                    'myattribcode' => array(
                        'group'             => 'Group/Tab',
                        'label'             => 'My Attrib Label',
                        'type'              => 'int',
                        'input'             => 'boolean',
                        'default'           => '0',
                        'class'             => '',
                        'backend'           => '',
                        'frontend'          => '',
                        'source'            => '',
                        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'visible'           => true,
                        'required'          => false,
                        'user_defined'      => false,
                        'searchable'        => false,
                        'filterable'        => false,
                        'comparable'        => false,
                        'visible_on_front'  => false,
                        'visible_in_advanced_search' => false,
                        'unique'            => false
                    ),
  
                  
               )
           ),
             // define attributes for other model entities here
      ); 
    }
    }