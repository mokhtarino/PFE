<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 09/11/2015
 * Time: 13:33
 */ 
class Riyada_IMEI_Model_Resource_Provider_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('riyada_imei/provider');
    }

}