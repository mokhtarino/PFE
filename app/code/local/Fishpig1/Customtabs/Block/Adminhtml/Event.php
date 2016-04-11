<?php
/**
 * app/code/local/MasteringMagento/Block/Adminhtml/Event.php
 *
 * This customtabs code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   customtabs
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Fishpig_Customtabs_Block_Adminhtml_Event extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'customtabs';
        $this->_controller = 'adminhtml_event';
        $this->_headerText = Mage::helper('customtabs')->__('Events');
        $this->_addButtonLabel = Mage::helper('customtabs')->__('Add New Event');

        parent::__construct();
    }
}
