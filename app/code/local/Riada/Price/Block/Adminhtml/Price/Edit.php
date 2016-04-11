<?php
class Riada_Price_Block_Adminhtml_Price_Edit extends
                    Mage_Adminhtml_Block_Widget_Form_Container{
   public function __construct()
   {
        parent::__construct();
        $this->_objectId = 'id';
        //vous remarquerez qu’on lui assigne le même blockGroup que le Grid Container
        $this->_blockGroup = 'price';
        //et le meme controlleur
        $this->_controller = 'adminhtml_price';
        //on definit les labels pour les boutons save et les boutons delete
        $this->_updateButton('save', 'label','save association');
        $this->_updateButton('delete', 'label', 'delete association');
    }
       /* Ici,  on regarde si on a transmit un objet au formulaire,
            afin de mettre le bon texte dans le  header (Editer ou
             Ajouter) */
    public function getHeaderText()
    {
        if( Mage::registry('price_data')&&Mage::registry('price_data')->getId())
         {
              return 'Edit the association product-provider '.$this->htmlEscape(
              Mage::registry('price_data')->getTitle()).'<br />';
         }
         else
         {
             return 'Add a new association product-provider';
         }
    }
}