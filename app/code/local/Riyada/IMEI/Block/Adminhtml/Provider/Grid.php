<?php
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 09/11/2015
 * Time: 14:16
 */
class Riyada_IMEI_Block_Adminhtml_Provider_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct()
    {
        parent::__construct();
        $this->setId('grid_id');
        // $this->setDefaultSort('COLUMN_ID');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('riyada_imei/provider')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

      $this->addColumn('provider_id',
          array(
              'header'=> $this->__('ID'),
              'index' => 'provider_id',
              'type' => 'number'
          )
      );
        $this->addColumn('created_at', array(
            'header' => Mage::helper('riyada_imei')->__('Created'),
            'type' => 'datetime',
            'index' => 'created_at'
        ));

        $this->addColumn('updated_at', array(
            'header' => Mage::helper('riyada_imei')->__('Updated'),
            'type' => 'datetime',
            'index' => 'updated_at'
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('riyada_imei')->__('Name'),
            'type' => 'text',
            'index' => 'name'
        ));
        $this->addColumn('telephone', array(
            'header' => Mage::helper('riyada_imei')->__('Telephone'),
            'type' => 'text',
            'index' => 'telephone'
        ));
        $this->addColumn('email', array(
            'header' => Mage::helper('riyada_imei')->__('Email'),
            'type' => 'text',
            'index' => 'email'
        ));

                $this->addExportType('*/*/exportCsv', Mage::helper('riyada_imei')->__('CSV'));
        
                $this->addExportType('*/*/exportExcel', Mage::helper('riyada_imei')>__('Excel XML'));
        
        return parent::_prepareColumns();
    }



    public function getRowUrl($row)
    {
       return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

        protected function _prepareMassaction()
    {
        $modelPk = Mage::getModel('riyada_imei/provider')->getResource()->getIdFieldName();
        $this->setMassactionIdField($modelPk);
        $this->getMassactionBlock()->setFormFieldName('ids');
        // $this->getMassactionBlock()->setUseSelectAll(false);
        $this->getMassactionBlock()->addItem('delete', array(
             'label'=> Mage::helper('riyada_imei')->__('Delete'),
             'url'  => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }
    }
