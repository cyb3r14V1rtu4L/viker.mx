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
        $this->pr($_POST);
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
