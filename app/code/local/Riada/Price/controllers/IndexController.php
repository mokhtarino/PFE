<?php

class Riada_Price_IndexController extends Mage_Core_Controller_Front_Action {

    public $a;

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

    function ajaxAction() {
        print("<h1>hello from ajax controller<h1>");
    }

    function savedAction() {
        $array = $this->getRequest()->getPost('mytable');
        $product = $this->getRequest()->getPost('prodId');
       $arr= $this->reArrayAction($array);
      
      
       foreach ($arr as $a) {
           $prod=$product;
           $prov=$a[0];
           $variety=$a[1];
           $price=$a[2];
           $avail=$a[3];
         if (isset($prod)&&isset($avail)&&isset($variety)&&isset($price))
             {
            //on cree notre objet et on l'enregistre en base
            try {



                $itm = Mage::getModel('price/price');
                $itm->setData('id_product', $prod);
                $itm->setData('id_provider', $prov);
                $itm->setData('price', $price);
                $itm->setData('availability', $avail);
                $itm->setData('variety', $variety);
                $itm->save();
                echo "insertion avec succes";
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError("Message"); 
                echo "deplucated or incomplete entry";}
        }
          else  echo "deplucated or incomplete entry";      
       }
       
    }
    function reArrayAction($t){
            
            $a=array();
            $c=0;
        for($j=0;$j<sizeof($t);$j++){
            
             $k=1;
            
        while ($k+2<sizeof($t[$j])){
            
          $a[$c][0]=$t[$j][0];
          $a[$c][1]=$t[$j][$k];
          $a[$c][2]=$t[$j][$k+1];
          $a[$c][3]=$t[$j][$k+2];
          
          $k=$k+3;
            $c++; 
        }
       
       
        }
        return $a;
    }
                function addAction() {
        $collection = Mage::getModel('riyada_imei/provider')->getCollection();
        $options = (Mage::getModel('price/price')->optionjs($collection));



        echo ("<tr name='provider' id='provider'>
            <td><select style='font-size:130%;' id='pro' name='pro' >");
        foreach ($options as $pro) {


            echo "<option value=" . $pro['value'] . ">" . $pro['label'] . "</option>";
        }

        echo ("
</select></td>
       <td><div>
<input type='text' required='true' style='width:70%' name='variety' placeholder='insert  color and/or mobile capacity'><input type='text' required='true' placeHolder='price' style='width:17%' name='price' ><select><option><option value='1'>InStock <option value='0'>OutOfStock</select></br></div><button onclick='myaddFunction(this)' type='button'>add</button></div></td><td><button  type='button' onclick='myDeleteFunction(this)' class='scalable delete icon-btn delete-ticket-item'><span><span><span>Delete</span></span></span></button></td>");

        ;
    }

    function addligneAction() {
        
    }

    public function saveAction() {
        //on recuperes les données envoyées en POST
        $Product = '' . $this->getRequest()->getPost('product');
        $provider = '' . $this->getRequest()->getPost('provider');
        $disponible = '' . $this->getRequest()->getPost('disponible');
        $price = $this->getRequest()->getPost('price');
       

        //on verifie que les champs ne sont pas vide
        if (isset($Product) && ($Product != '') && isset($disponible) && ($price != '')
        ) {
            //on cree notre objet et on l'enregistre en base
            try {



                $itm = Mage::getModel('price/price');
                $itm->setData('id_product', $Product);
                $itm->setData('id_provider', $provider);
                $itm->setData('price', $price);
                $itm->setData('dispo', $disponible);
                $itm->save();
            } catch (Exception $exc) {
                Mage::getSingleton('adminhtml/session')->addSuccess('Cool Ca marche !!');
            }
        }
        //on redirige l’utilisateur vers la méthode index du controller indexController
        //de notre module <strong>test</strong>
        $this->_redirect('Price/index/index');
    }

}