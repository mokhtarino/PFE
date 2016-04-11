<?php
/**
 * app/code/local/MasteringMagento/Block/Adminhtml/Event.php
 *
 * This customtabs code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   customtabs
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Fishpig_Customtabs_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function getRowUrl($item)
    {
        return $this->getUrl('*/event/edit', array('event_id' => $item->getId()));
    }

    public function _prepareCollection()
    {
        $collection = Mage::getModel('customtabs/event')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name', array(
            'type' => 'text',
            'index' => 'name',
            'header' => $this->__('Name')
        ));

        $this->addColumn('start', array(
            'type' => 'date',
            'index' => 'start',
            'header' => $this->__('Start Date')
        ));

        $this->addColumn('end', array(
            'type' => 'date',
            'index' => 'end',
            'header' => $this->__('End Date')
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('customtabs')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('customtabs')->__('Excel XML'));

        return $this;
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('event_id');
        $this->getMassactionBlock()->setformFieldName('event_ids');

        $this->getMassactionBlock()->addItem('delete_event', array(
            'label' => Mage::helper('customtabs')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('customtabs')->__('Are you sure?')
        ));

        return $this;
    }
}
