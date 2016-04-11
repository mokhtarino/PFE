<?php
  
class Riada_Price_Block_Adminhtml_Price_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
  
    public function __construct()
    {
        parent::__construct();
        $this->setId('price_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Association Information');
    }
  
    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => 'Item Information',
            'title'     => 'Item Information',
            'content'   => $this->getLayout()->createBlock('price/adminhtml_price_edit_tab_form')->toHtml(),
        ));
        
        return parent::_beforeToHtml();
    }
}