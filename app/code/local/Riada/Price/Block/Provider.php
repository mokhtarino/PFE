<?php

class Riada_Price_Block_Provider extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{	

public function render(Varien_Object $row)
{
$providertId =  $row->getData($this->getColumn()->getIndex());
$provider= Mage::getModel('riyada_imei/provider')->load($providertId)
     
        ;

$value =$provider->getName();;

return $value;
}
}
