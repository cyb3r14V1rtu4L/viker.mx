<?php

class companyController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        $this->model=$this->loadModel('db');
    }

    public function index() // Profile
    {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Enterprises = $this->model->select_data('system_user_enterprise','*',$conditions);
        $this->_view->Enterprises = $Enterprises;
        $this->_view->function = 'getProfile';
        $this->_view->setTemplates(array('enterprise'));
        $this->_view->renderizar('index');
    }

    public function products()
    {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Enterprises = $this->model->select_data('system_user_enterprise','*',$conditions);
        $this->_view->Enterprises = $Enterprises;
        $this->_view->function = 'getProfile';
        $this->_view->setTemplates(array('products'));
        $this->_view->renderizar('index');
    }


    public function reports() {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Enterprises = $this->model->select_data('system_user_enterprise','*',$conditions);
        $this->_view->Enterprises = $Enterprises;
        $this->_view->function = 'getReports';
        $this->_view->setTemplates(array('enterprise'));
        $this->_view->renderizar('index');
    }

}