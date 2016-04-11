<?php
 
/**
 * Adminhtml sales operations controller
 *
 * @category    Inchoo
 * @package     Inchoo_DateOrder
 */
class Inchoo_DateOrder_Adminhtml_Operations_OrderController extends Mage_Adminhtml_Controller_Action
{
 
    /**
     * Additional initialization
     *
     */
    protected function _construct()
    {
        $this->setUsedModuleName('Inchoo_DateOrder');
    }
 
    /**
     * Init layout, menu and breadcrumb
     *
     * @return Inchoo_DateOrder_Adminhtml_Operations_OrderController
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('sales/order')
            ->_addBreadcrumb($this->__('Sales'), $this->__('Sales'))
            ->_addBreadcrumb($this->__('Operations'), $this->__('Operations'));
        return $this;
    }
 
    /**
     * Orders grid
     */
    public function indexAction()
    {
        $this->_title($this->__('Sales'))->_title($this->__('Operations'));
 
        $this->_initAction()
            ->renderLayout();
    }
 
    /**
     * Order grid
     */
    public function gridAction()
    {
        $this->loadLayout(false);
        $this->renderLayout();
    }
 
    /**
     * Export order grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName   = 'operations.csv';
        $grid       = $this->getLayout()->createBlock('operations_adminhtml/operations_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
 
    /**
     *  Export order grid to Excel XML format
     */
    public function exportExcelAction()
    {
        $fileName   = 'operations.xml';
        $grid       = $this->getLayout()->createBlock('operations_adminhtml/operations_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
 
}