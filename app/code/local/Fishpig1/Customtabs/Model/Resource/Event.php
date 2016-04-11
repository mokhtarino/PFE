<?php
/**
 * app/code/local/MasteringMagento/Model/Resource/Event.php
 *
 * This customtabs code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   customtabs
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Fishpig_Customtabs_Model_Resource_Event extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('customtabs/event', 'event_id');
    }
}
