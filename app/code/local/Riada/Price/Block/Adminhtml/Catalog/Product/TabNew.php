<?php

class Riada_Price_Block_Adminhtml_Catalog_Product_TabNew 
extends Mage_Adminhtml_Block_Template
implements Mage_Adminhtml_Block_Widget_Tab_Interface {

	/**
	 * Set the template for the block
	 *
	 */
	public function _construct()
	{
		parent::_construct();
		
		$this->setTemplate('price/catalog/product/tab.phtml');
	}
	
	/**
	 * Retrieve the label used for the tab relating to this block
	 *
	 * @return string
	 */
          public function getproduct() {
    if(Mage::registry('current_product')) { 
    $product = Mage::registry('current_product');
    
    $a=$product->getId();
   
    
    return $a;
   } 
   
    }
    public function getTabLabel()
    {
    	return $this->__('Riyada Provider');
    }
    
    /**
     * Retrieve the title used by this tab
     *
     * @return string
     */
    public function getTabTitle()
    {
    	return $this->__(' manage Riyada Providers');
    }
    
	/**
	 * Determines whether to display the tab
	 * Add logic here to decide whether you want the tab to display
	 *
	 * @return bool
	 */
    public function canShowTab()
    {
		return true;
    }
    
    /**
     * Stops the tab being hidden
     *
     * @return bool
     */
    public function isHidden()
    {
    	return false;
    }
 
      public function getTicketData()
    {
        $ticketArr = array();
        $tickets = $this->getProduct()->getTypeInstance(true)->getTickets($this->getProduct());
        
        foreach ($tickets as $ticket) {
            $tmpTicketItem = array(
                'ticket_id' => $ticket->getId(),
                'title' => $this->escapeHtml($ticket->getTitle()),
                'price' => $this->getPriceValue($ticket->getPrice()),
                'sort_order' => $ticket->getSortOrder(),
            );
            $ticketArr[] = new Varien_Object($tmpTicketItem);
        }
        return $ticketArr;
    }

    /**
     * Return formated price with two digits after decimal point
     *
     * @param decimal $value
     * @return decimal
     */
    public function getPriceValue($value)
    {
        return number_format($value, 2, null, '');
    }
	
	/**
	 * AJAX TAB's
	 * If you want to use an AJAX tab, uncomment the following functions
	 * Please note that you will need to setup a controller to recieve
	 * the tab content request
	 *
	 */
	/**
	 * Retrieve the class name of the tab
	 * Return 'ajax' here if you want the tab to be loaded via Ajax
	 *
	 * return string
	 */
#	public function getTabClass()
#	{
#		return 'my-custom-tab';
#	}

	/**
	 * Determine whether to generate content on load or via AJAX
	 * If true, the tab's content won't be loaded until the tab is clicked
	 * You will need to setup a controller to handle the tab request
	 *
	 * @return bool
	 */
#	public function getSkipGenerateContent()
#	{
#		return false;
#	}

	/**
	 * Retrieve the URL used to load the tab content
	 * Return the URL here used to load the content by Ajax 
	 * see self::getSkipGenerateContent & self::getTabClass
	 *
	 * @return string
	 */
#	public function getTabUrl()
#	{
#		return null;
#	}

}