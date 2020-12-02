<?php

class guiasController extends Controller
{
    public function __construct() {
        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        Session::checkPrivileges('enterprise');
        $this->model=$this->loadModel('db');
    }

    public function index() {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','bootstrap-toggle','bootstrap-stepper'));
        //$user_id = Session::get('user_id');

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Customer = $this->model->select_row('system_users','*',$conditions);

        $conditions = array('enterprise_id' => 1);
        $Enterprise = $this->model->select_row('system_user_enterprise','*',$conditions);
        $this->_view->Customer = $Customer;
        $this->_view->Enterprise = $Enterprise;


        $this->_view->setTemplates(array('profile'));
        $this->_view->setTemplates(array('geoloc_address'),true);
        $this->_view->setTemplates(array('profile_enterprise','profile_enterprise_hour','profile_enterprise_user_data','profile_enterprise_user_data_e'));
        $this->_view->renderizar('index');
    }


    public function update_profile()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];
        $user_id = $_POST['user_id'];

        $change_pass = ($field == 'password_clean') ? ", password=sha1('$value') " : '' ;
        $mySQL = " UPDATE system_users SET $field = '$value' $change_pass WHERE user_id = $user_id ";
        $Profile = $this->model->query($mySQL);

        $response = array('profile_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }

    public function update_enterprise()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];
        $enterpise_id = $_POST['enterprise_id'];
        $user_id = $_POST['user_id'];

        $mySQL = " UPDATE system_user_enterprise SET $field = '$value'  WHERE enterprise_id = $enterpise_id AND user_id = $user_id ";
        $Profile = $this->model->query($mySQL);

        $response = array('profile_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }


}

