<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 09/11/2015
 * Time: 13:33
 */ 
class Riyada_IMEI_Model_Provider extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('riyada_imei/provider');
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();


        $this->_updateTimestamps();

        return $this;
    }

    protected function _updateTimestamps()
    {
        $timestamp = now();

        /**
         * Set the last updated timestamp.
         */
        $this->setUpdatedAt($timestamp);

        /**
         * If we have a new object, set the created timestamp.
         */
        if ($this->isObjectNew()) {
            $this->setCreatedAt($timestamp);
        }

        return $this;
    }

}