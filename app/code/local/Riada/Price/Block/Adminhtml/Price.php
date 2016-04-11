<?php
class Riada_price_Block_Adminhtml_Price extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
     //on indique ou va se trouver le controller
     $this->_controller = 'adminhtml_price';
     $this->_blockGroup = 'price';
     //le texte du header qui s’affichera dans l’admin
     $this->_headerText = 'Manage of price and provider';
     //le nom du bouton pour ajouter une un contact
     $this->_addButtonLabel = 'New Association';
     parent::__construct();
     }
}