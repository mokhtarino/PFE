<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 09/11/2015
 * Time: 14:16
 */
class Riyada_IMEI_Block_Adminhtml_Provider extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct()
    {
        $this->_blockGroup      = 'riyada_imei';
        $this->_controller      = 'adminhtml_provider';
        $this->_headerText      =  Mage::helper('riyada_imei')->__('Riyada Providers');
        $this->_addButtonLabel  = Mage::helper('riyada_imei')->__('Add new Provider');
        parent::__construct();
            }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/new');
    }

}

