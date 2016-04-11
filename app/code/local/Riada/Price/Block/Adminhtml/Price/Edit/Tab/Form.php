<?php

class Riada_Price_Block_Adminhtml_Price_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $collection = Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect('*');
        $provider= Mage::getModel('riyada_imei/provider')->getCollection();
        $option=Mage::getModel('price/price')->toOptionArray($collection);
        $optionProvider=Mage::getModel('price/price')->toOptionArray($provider);
        $fieldset = $form->addFieldset('price_form', array('legend' => 'Item information'));



        $fieldset->addField('id_product', 'select', array(
            'label' => 'Product',
            'name' => 'product',
            
            'required'  => true,
            'values' =>$option,
        ));
        $fieldset->addField('id_provider', 'select', array(
            'label' => 'Provider',
            'name' => 'provider',
            'required' => true,
            'values' => $optionProvider,
        ));
        $fieldset->addField('price', 'text', array(
            'label' => 'price',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'price',
        ));

        $fieldset->addField('dispo', 'select', array(
            'label' => 'Disponibility',
            'name' => 'disponible',
            'required' => true,
            'values' => array(
                array(
                    'value' => '',
                    'label' => '',
                ),
                array(
                    'value' => 1,
                    'label' => 'IN STOCK',
                ),
                array(
                    'value' => 0,
                    'label' => 'OUT OF STOCK'
                ),
            ),
        ));

        if (Mage::getSingleton('adminhtml/session')->getPriceData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getPriceData());
            Mage::getSingleton('adminhtml/session')->setPriceData(null);
        } elseif (Mage::registry('price_data')) {
            $form->setValues(Mage::registry('price_data')->getData());
        }
        return parent::_prepareForm();
    }

}
