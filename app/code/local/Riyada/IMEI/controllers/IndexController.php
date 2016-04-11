<?php

/**
 * Created by PhpStorm.
 * User: Sleh-Abdelkefi
 * Date: 24/10/2015
 * Time: 14:53
 */
class Riyada_IMEI_IndexController extends Mage_Adminhtml_Controller_Action
{


    public function updateImeiAjaxAction()
    {
        header('Content-Type: application/json');
        $imei = $this->getRequest()->getParam('imei');
        $itemid = $this->getRequest()->getParam('item_id');
        if ($imei != "" AND $itemid != "") {
            $item = Mage::getModel('sales/order_item')->load($itemid);
            if ($item->getId()) {

                $existentOptions = $item->getProductOptions();

                if (!isset($existentOptions['additional_options'])) {

                    $existentOptions['additional_options'][] = array();
                }

                $existentOptions['additional_options'][0] = array(
                    'label' => 'IMEI',
                    'value' => $imei,
                    'print_value' => $imei
                );

                $item->setProductOptions($existentOptions);
                $item->save();
                echo 1;

            } else {

                echo 0;
            }

        } else {
            echo 0;
        }

    }

    ///////////////////////////////////////////////////////////
    public function updateProviderInfoAjaxAction()
    {
        header('Content-Type: application/json');
        $cost = $this->getRequest()->getParam('cost');
        $provider = $this->getRequest()->getParam('provider');
        $itemid = $this->getRequest()->getParam('item_id');
        if ($itemid != "") {
            $item = Mage::getModel('sales/order_item')->load($itemid);
            if ($item->getId()) {

                $existentOptions = $item->getProductOptions();

                if (!isset($existentOptions['additional_options'])) {

                    $existentOptions['additional_options'][] = array();
                }

                if ($cost != "") {
                    $existentOptions['additional_options'][1] = array(
                        'label' => 'Cost',
                        'value' => $cost,
                        'print_value' => $cost
                    );
                }
                if ($provider != "") {
                    $existentOptions['additional_options'][2] = array(
                        'label' => 'Provider',
                        'value' => $provider,
                        'print_value' => $provider
                    );
                }


                $item->setProductOptions($existentOptions);
                $item->save();
                echo 1;

            } else {

                echo 0;
            }

        } else {
            echo 0;
        }

    }


    public function updateDateAjaxAction()
    {

        header('Content-Type: application/json');


        $date = $this->getRequest()->getParam('date');
        $orderid = $this->getRequest()->getParam('order_id');
        if ($date != "" AND $orderid != "") {
            $order = Mage::getModel('sales/order')->load($orderid);
            if($order->getId()){
            $order->setDeliveryDate($date);
            $order->save();
                echo 1;
            }else{
                echo 0;
                return;
            }


        } else {

            echo 0;
        }


    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('riyada_imei/adminhtml_provider'));
        $this->renderLayout();
    }

    public function exportCsvAction()
    {
        $fileName = 'Riyada Providers_export.csv';
        $content = $this->getLayout()->createBlock('riyada_imei/adminhtml_provider_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    public function exportExcelAction()
    {
        $fileName = 'Riyada Providers_export.xml';
        $content = $this->getLayout()->createBlock('riyada_imei/adminhtml_provider_grid')->getExcel();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('ids');
        if (!is_array($ids)) {
            $this->_getSession()->addError($this->__('Please select Riyada Providers(s).'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('riyada_imei/provider')->load($id);
                    $model->delete();
                }

                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) have been deleted.', count($ids))
                );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('riyada_imei')->__('An error occurred while mass deleting items. Please review log and try again.')
                );
                Mage::logException($e);
                return;
            }
        }
        $this->_redirect('*/*/index');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('riyada_imei/provider');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->_getSession()->addError(
                    Mage::helper('riyada_imei')->__('This Riyada Providers no longer exists.')
                );
                $this->_redirect('*/*/');
                return;
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('current_provider', $model);

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('riyada_imei/adminhtml_provider_edit'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        $redirectBack = $this->getRequest()->getParam('back', false);
        if ($data = $this->getRequest()->getPost()) {

            $id = $this->getRequest()->getParam('id');
            $model = Mage::getModel('riyada_imei/provider');
            if ($id) {
                $model->load($id);
                if (!$model->getId()) {
                    $this->_getSession()->addError(
                        Mage::helper('riyada_imei')->__('This Riyada Providers no longer exists.')
                    );
                    $this->_redirect('*/*/index');
                    return;
                }
            }

            // save model
            try {
                $model->addData($data);
                $this->_getSession()->setFormData($data);
                $model->save();
                $this->_getSession()->setFormData(false);
                $this->_getSession()->addSuccess(
                    Mage::helper('riyada_imei')->__('The Riyada Providers has been saved.')
                );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $redirectBack = true;
            } catch (Exception $e) {
                $this->_getSession()->addError(Mage::helper('riyada_imei')->__('Unable to save the Riyada Providers.'));
                $redirectBack = true;
                Mage::logException($e);
            }

            if ($redirectBack) {
                $this->_redirect('*/*/edit', array('id' => $model->getId()));
                return;
            }
        }
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                // init model and delete
                $model = Mage::getModel('riyada_imei/provider');
                $model->load($id);
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('riyada_imei')->__('Unable to find a Riyada Providers to delete.'));
                }
                $model->delete();
                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('riyada_imei')->__('The Riyada Providers has been deleted.')
                );
                // go to grid
                $this->_redirect('*/*/index');
                return;
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('riyada_imei')->__('An error occurred while deleting Riyada Providers data. Please review log and try again.')
                );
                Mage::logException($e);
            }
            // redirect to edit form
            $this->_redirect('*/*/edit', array('id' => $id));
            return;
        }
// display error message
        $this->_getSession()->addError(
            Mage::helper('riyada_imei')->__('Unable to find a Riyada Providers to delete.')
        );
// go to grid
        $this->_redirect('*/*/index');
    }


}