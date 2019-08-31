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

        $this->_view->renderizar('index');
    }

    public function confirmation() {

        Session::destroy('Shopping');
        Session::destroy('ShoppingData');
        Session::destroy('CheckoutShop');
        Session::destroy('Checkout');
        Session::destroy('gtotal');
        Session::destroy('cycler');

        $this->_view->renderizar('confirmation');

    }

}