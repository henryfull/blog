<?php
class Cart {
    protected $cart = array();
    
    private $total_cart;
    private $subtotal_cart;
    private $tax;
    

    public function __construct(){
        // get the shopping cart array from the session
        $this->cart = !empty($_SESSION['cart'])?$_SESSION['cart']:NULL;
        if ($this->cart === NULL){
            // set some base values
            $this->cart = array();
        }
    }



    public function setSubtotal_cart($subtotal_cart){			
        $this->$subtotal_cart = $subtotal_cart;			
    }
    public function getSubtotal_cart(){		
        return $this-> subtotal_cart;	
    }
    public function setTotal_cart($total_cart){			
        $this->$total_cart = $total_cart;			
    }
    public function getTotal_cart(){		
        return $this-> total_cart;	
    }

    public function setTax($tax){			
        $this->$tax = $tax;			
    }
    public function getTax(){		
        return $this-> tax;	
    }


    public function insertProductToCart($product){

        array_push($this->cart, $product);
        

    }


    public function MostrarCarrito(){



        foreach ($this->cart as $key => $product) {


              return $product ;

        }

    }


}

?>