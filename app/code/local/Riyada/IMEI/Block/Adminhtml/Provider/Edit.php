<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 09/11/2015
 * Time: 14:16
 */
class Riyada_IMEI_Block_Adminhtml_Provider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        // $this->_objectId = 'id';
        parent::__construct();
        $this->_blockGroup      = 'riyada_imei';
        $this->_controller      = 'adminhtml_provider';
        $this->_mode            = 'edit';
        $modelTitle = $this->_getModelTitle();
        $this->_updateButton('save', 'label', $this->_getHelper()->__("Save Provider"));
        $this->_addButton('saveandcontinue', array(
            'label'     => $this->_getHelper()->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    protected function _getHelper(){
        return Mage::helper('riyada_imei');
    }

    protected function _getModel(){
        return Mage::registry('current_provider');
    }

    protected function _getModelTitle(){
        return 'Riyada Providers';
    }

    public function getHeaderText()
    {
        $model = $this->_getModel();
        $modelTitle = $this->_getModelTitle();
        if ($model && $model->getId()) {
           return $this->_getHelper()->__("Edit Provider (ID: {$model->getId()})");
        }
        else {
           return $this->_getHelper()->__("New Provider");
        }
    }


    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/index');
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', array($this->_objectId => $this->getRequest()->getParam($this->_objectId)));
    }

    /**
     * Get form save URL
     *
     * @deprecated
     * @see getFormActionUrl()
     * @return string
     */
    public function getSaveUrl()
    {
                $this->setData('form_action_url', 'save');
                return $this->getFormActionUrl();
    }


}
