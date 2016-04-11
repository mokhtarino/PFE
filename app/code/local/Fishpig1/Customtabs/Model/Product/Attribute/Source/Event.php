<?php
/**
 * app/code/local/MasteringMagento/Model/Product/Attribute/Source/Event.php
 *
 * This customtabs code is provided for use with the Mastering Magento video
 * series, by Packt Publishing.
 *
 * @author    Franklin P. Strube <franklin.strube@gmail.com>
 * @category  MasteringMagento
 * @package   customtabs
 * @copyright Copyright (c) 2012 Packt Publishing (http://packtpub.com)
 */
class Fishpig_Customtabs_Model_Product_Attribute_Source_Event
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    /**
     * Retrieve all attribute options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $collection = Mage::app()->getModel('customtabs/event')->getCollection();
        $options = array();
        foreach ( $collection as $event ) {
            $option[] = array(
                'value' => $event->getId(),
                'label' => $event->getName()
            );
        }

        return $options;
    }
}
