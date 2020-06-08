<?php

class checkoutController extends Controller
{
    public function __construct() {
        //Session::validate();
        parent::__construct();
        $this->menu=$this->loadModel('menu');
        $this->enterprise=$this->loadModel('enterprise');
    }

    public function index() {
        $this->_view->setTemplates(array('geoloc'),true);
        if (isset($_POST['submitPayment'])) {
            $order_id = $_POST['order_uid'];
            $shopping_data = Session::get('ShoppingData');
            $shopping_data['order_uid'] = $order_id;
            Session::set('ShoppingData', $shopping_data);
        }
        $this->_view->renderizar('index');
    }

    public function confirmation() {

        $Shopping = Session::get('Shopping');
        $shopping_data = Session::get('ShoppingData');
        #$checkout_shop = Session::get('CheckoutShop');
        $order_data = $this->unserilizeArray($_POST['order_data']);
        $checkout_shop = $this->unserilizeArray($_POST['checkout_shop']);

        $orderData = array();
        $stuffData = array();
        $dataO = array();
        $dataS = array();
        foreach ($Shopping['Enterprise'] as $e => $enterprise)
        {
            foreach ($enterprise as $e_id => $stuff)
            {
                if($e_id !== 'enterprise_data')
                {
                    $dataO['enterprise_id'] = $e;
                    $dataO['order_uid'] = $shopping_data['order_uid'];
                    $dataO['user_id'] = Session::get('user_id');
                    $dataO['notes_order'] = $shopping_data['item_note_' . $e];
                    $dataO['date_order'] = date("Y-m-d H:i");
                    $dataO['distance_kms'] = $checkout_shop['distance_kms'];

                    $dataO['geo_lat'] = $order_data['geo_lat'];
                    $dataO['geo_lng'] = $order_data['geo_lng'];
                    $dataO['geo_str'] = $order_data['street'];
                    $dataO['geo_ext'] = $order_data['number_ext'];
                    $dataO['geo_int'] = $order_data['number_int'];

                    $dataO['total_order'] = $checkout_shop['gran_total'];
                    $dataO['total_pay'] = ($checkout_shop['pay_with'] > 0 && $checkout_shop['pay_with'] !== null) ? $checkout_shop['pay_with'] : 0.00;
                    $dataO['total_pay_real'] = $checkout_shop['total_pay_real'];
                    $dataO['total_vikers'] = $checkout_shop['granTotal_cycler_float'];
                    $dataO['total_change'] = ($checkout_shop['pay_change'] > 0 && $checkout_shop['pay_change'] !== null) ? $checkout_shop['pay_change'] : 0.00;
                    $dataO['status'] = 'NEW';
                    $dataO['origin'] = 'paypal';
                    $orderData = $this->model->insert("order_enterprise",$dataO,array());
                    #$this->pr($orderData);
                    $order_id = $orderData['data'];
                }

                foreach ($stuff as $s_id => $Stuff)
                {
                    $dataS=array();
                    if (is_int($s_id))
                    {
                        foreach ($Stuff as $s_uid => $stuff) {
                            $dataS['order_id'] = $order_id;
                            $dataS['stuff_id'] = $s_id;
                            $dataS['stuff_uid'] = $s_uid;
                            $dataS['how_many_stuff'] = $stuff['how_many'];
                            $dataS['price_stuff'] = $stuff['price'];
                            $stuffData = $this->model->insert('order_stuff', $dataS, array());
                            if(isset($stuff['stuff_data']['Ingredients'])) {
                                $Ingredients = $stuff['stuff_data']['Ingredients'];
                                foreach ($Ingredients as $ingredient) {
                                    $dataI=array();
                                    $dataI['order_id'] = $order_id;
                                    $dataI['stuff_id'] = $s_id;
                                    $dataI['stuff_uid'] = $s_uid;
                                    $dataI['extra_id'] = $ingredient['extra_id'];
                                    $dataI['extra_price'] = $ingredient['extra_price'];
                                    $stuffData = $this->model->insert('order_stuff_extra', $dataI, array());
                                }
                            }
                        }
                    }
                }
            }
        }

        $this->destroySessions();
        $this->_view->renderizar('confirmation');
    }

    public function destroySessions() {
        Session::destroy('Shopping');
        Session::destroy('ShoppingAux');
        Session::destroy('ShoppingData');
        Session::destroy('CheckoutShop');
        Session::destroy('Checkout');
        Session::destroy('gtotal');
        Session::destroy('cycler');
    }

}
