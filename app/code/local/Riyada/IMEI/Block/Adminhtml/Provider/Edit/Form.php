<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 09/11/2015
 * Time: 14:16
 */
class Riyada_IMEI_Block_Adminhtml_Provider_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _getModel(){
        return Mage::registry('current_provider');
    }

    protected function _getHelper(){
        return Mage::helper('riyada_imei');
    }

    protected function _getModelTitle(){
        return 'Provider';
    }

    protected function _prepareForm()
    {
        $model  = $this->_getModel();
        $modelTitle = $this->_getModelTitle();
        $form   = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save'),
            'method'    => 'post'
        ));

        $fieldset   = $form->addFieldset('base_fieldset', array(
            'legend'    => $this->_getHelper()->__("$modelTitle Information"),
            'class'     => 'fieldset-wide',
        ));

        if ($model && $model->getId()) {
            $modelPk = $model->getResource()->getIdFieldName();
            $fieldset->addField($modelPk, 'hidden', array(
                'name' => $modelPk,
            ));
        }


        $fieldset->addField('name', 'text', array(
            'label'     => $this->_getHelper()->__('Provider name'),
            'title'     => $this->_getHelper()->__('Provider name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name',
            'onclick' => "",
            'onchange' => "",
            'disabled' => false,
            'tabindex' => 1
        ));
        $fieldset->addField('email', 'text', array(
            'label'     => $this->_getHelper()->__('Provider Email'),
            'title'     => $this->_getHelper()->__('Provider email'),
            'required'  => false,
            'name'      => 'email',
            'onclick' => "",
            'onchange' => "",
            'disabled' => false,
            'tabindex' => 2
        ));
        $fieldset->addField('telephone', 'text', array(
            'label'     => $this->_getHelper()->__('Provider Telephone'),
            'title'     => $this->_getHelper()->__('Provider telephone'),
            'required'  =>false,
            'name'      => 'telephone',
            'onclick' => "",
            'onchange' => "",
            'disabled' => false,
            'tabindex' => 3
        ));
        $fieldset->addField('website', 'text', array(
            'label'     => $this->_getHelper()->__('Provider WebSite'),
            'title'     => $this->_getHelper()->__('Provider WebSite'),
            'required'  =>false,
            'name'      => 'website',
            'onclick' => "",
            'onchange' => "",
            'disabled' => false,
            'tabindex' => 4
        ));
        $fieldset->addField('description', 'textarea', array(
            'label'     => $this->_getHelper()->__('Description'),
            'title'     => $this->_getHelper()->__('Provider description'),
            'required'  =>false,
            'name'      => 'description',
            'onclick' => "",
            'onchange' => "",
            'disabled' => false,
            'tabindex' => 5
        ));

//          // custom renderer (optional)
//          $renderer = $this->getLayout()->createBlock('Block implementing Varien_Data_Form_Element_Renderer_Interface');
//          $field->setRenderer($renderer);

//      // New Form type element (extends Varien_Data_Form_Element_Abstract)
//        $fieldset->addType('custom_element','MyCompany_MyModule_Block_Form_Element_Custom');  // you can use "custom_element" as the type now in ::addField([name], [HERE], ...)


        if($model){
            $form->setValues($model->getData());
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
