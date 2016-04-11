<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Riada_Price_Adminhtml_AjaxController extends Mage_Adminhtml_Controller_Action {

    function indexAction() {
        print json_encode("<h1>hello from ajax controller<h1>");
    }

    function addAction() {
     print json_encode("hello");  
    }
    public function loadFormAjaxAction() {
        $item = Mage::getModel('riyada_imei/provider');
        // on sauvegarde les données post dans notre model
        foreach ($this->getRequest()->getParams() as $k => $param) {
            if (is_string($param)) {
                $item->setData($k, $param);
            }
        }
        // on l'enregistre pour que les blocs puissent l'utiliser
        Mage::register('item_data', $item);
        $block = $this->getLayout()->createBlock('module/adminhtml_item_edit_tabs');
        $html = $block->toHtml();

        $this->getResponse()->setHeader('Content-Type', 'application/json');

        echo Zend_Json::encode(array(
            'tabs' => $html,
        ));
    }

}
