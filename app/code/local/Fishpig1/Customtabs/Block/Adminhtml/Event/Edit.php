<?php
/**
 * app/code/local/MasteringMagento/Block/Adminhtml/Event/Edit.php
 *
 * This customtabs code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   customtabs
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Fishpig_Customtabs_Block_Adminhtml_Event_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'event_id';
        $this->_blockGroup = 'customtabs';
        $this->_controller = 'adminhtml_event';

        parent::__construct();
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        return Mage::helper('customtabs')->__('New Event');
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/event/save', array('_current' => true));
    }
}
