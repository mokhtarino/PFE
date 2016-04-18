<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Riada_Price_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action {

    protected function _initAction() {
        $this->loadLayout()
                ->_setActiveMenu('price/items')
                ->_addBreadcrumb('price Manager', 'Price Manager');
        return $this;
    }
function ajaxAction() {
        echo "ajax";
    }
    
    public function indexAction() {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('price/adminhtml_price'));
        $this->renderLayout();
    }

    public function editAction() {
        $priceId = $this->getRequest()->getParam('id');
        $priceModel = Mage::getModel('price/price')->load($priceId);

        if ($priceModel->getId() || $priceId == 0) {

            Mage::register('price_data', $priceModel);

            $this->loadLayout();
            $this->_setActiveMenu('price/items');

            $this->_addBreadcrumb('Price Manager', 'Price Manager');
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('price/adminhtml_price_edit'))
                    ->_addLeft($this->getLayout()->createBlock('price/adminhtml_price_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('price')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function saveAction() {
        if ($this->getRequest()->getPost()) {
            try {
                $Product = '' . $this->getRequest()->getPost('product');
                $provider = '' . $this->getRequest()->getPost('provider');
                $disponible = '' . $this->getRequest()->getPost('disponible');
                $price = $this->getRequest()->getPost('price');
                
                $itm = Mage::getModel('price/price');
                $itm->setId($this->getRequest()->getParam('id'));
                $itm->setData('id_product', $Product);
                $itm->setData('id_provider', $provider);
                $itm->setData('price', $price);
                $itm->setData('dispo', $disponible);
                $itm->save();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__(' successfully saved'));
                Mage::getSingleton('adminhtml/session')->setPriceData(false);

                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError('Duplicated entry or wrong entry');
                Mage::getSingleton('adminhtml/session')->setpriceData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

     public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $priceModel = Mage::getModel('price/price');
                
                $priceModel->setId($this->getRequest()->getParam('id'))
                    ->delete();
                    
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
     public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
               $this->getLayout()->createBlock('price/adminhtml_price_grid')->toHtml()
        );
    }

}

?>