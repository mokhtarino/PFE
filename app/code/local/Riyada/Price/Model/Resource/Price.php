<?php
/**
 * app/code/local/MasteringMagento/Model/Resource/Price.php
 *
 * This Price code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   Price
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Riyada_Price_Model_Resource_Price extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('price/price', 'provider_id');
    }
}
