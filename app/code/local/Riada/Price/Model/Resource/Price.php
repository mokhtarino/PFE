<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Price
 *
 * @author mokhtar
 */
class Riada_Price_Model_Resource_Price extends Mage_Core_Model_Resource_Db_Abstract{
    protected function _construct()
    {
        $this->_init('price/price','id');
    }
}
