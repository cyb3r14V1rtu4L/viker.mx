<?php

class profileController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        Session::checkPrivileges('enterprise');
        $this->model=$this->loadModel('db');

    }

    public function index(){}

    public function edit($e_id=null)
    {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker','bootstrap-toggle'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Customer = $this->model->select_row('system_users','*',$conditions);

        $conditions = array('enterprise_id' => $e_id);
        $Enterprise = $this->model->select_row('system_user_enterprise','*',$conditions);

        $EnterpriseHO = $this->model->select_row('enterprise_opening_hour','*',$conditions);


        $SetViewMap['geo_lat'] = round($Enterprise['geo_lat'],4);
        $SetViewMap['geo_lng'] = round($Enterprise['geo_lng'],4);
        #$this->pr($SetViewMap);
        $this->_view->Customer = $Customer;
        $this->_view->SetViewMap = $SetViewMap;
        $this->_view->Enterprise = $Enterprise;
        $this->_view->EnterpriseHO = $EnterpriseHO;
        $this->_view->function = 'getProfile';
        $this->_view->customerName = Session::get('first_name').' '.Session::get('last_name');
        $this->_view->customerID = $user_id;
        $this->_view->enterpriseID = $e_id;
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

    public function update_address()
    {
        $enterprise_id = $_POST['enterprise_id'];
        $user_id = $_POST['user_id'];
        $geo_lat = $_POST['geo_lat'];
        $geo_lng = $_POST['geo_lng'];
        $geo_int = $_POST['geo_int'];
        $geo_ext = $_POST['geo_ext'];

        $this->getLibrary('encoding');
        $Encoding=new Encoding();
        $geo_str = $Encoding->fixUTF8($_POST['geo_str']);

        $mySQL =" UPDATE system_user_enterprise "
               ." SET "
               ."  geo_lat='$geo_lat', "
               ."  geo_lng='$geo_lng', "
               ."  geo_str='$geo_str', "
               ."  geo_int='$geo_int', "
               ."  geo_ext='$geo_ext' "
               ." WHERE enterprise_id = $enterprise_id AND user_id = $user_id ";
        #echo $mySQL;
        $Profile = $this->model->query($mySQL);
        $response = array('profile_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }

    public function update_enterprise_ho()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];

        //Check 00/24 Hour
        $Hour = substr($value,0,2);
        $Hour = ($Hour == '00') ? '24': $Hour;
        $value = substr_replace($value, $Hour,0,2);

        $enterpise_id = $_POST['enterprise_id'];
        $user_id = $_POST['user_id'];
        
        $days_open_arr = array('sun_day_open','mon_day_open','tue_day_open','wed_day_open','thu_day_open','fri_day_open','sat_day_open');
        $is_bool = in_array($field, $days_open_arr);
        
        $conditions = array('enterprise_id' => $enterpise_id);
        $HourExist = $this->model->select_row('enterprise_opening_hour','*',$conditions);
      
        
        if ($HourExist) {
            $mySQL = ($is_bool !== true)
            ? " UPDATE enterprise_opening_hour SET $field = '$value'  WHERE enterprise_id = $enterpise_id AND user_id = $user_id "
            : " UPDATE enterprise_opening_hour SET $field = $value  WHERE enterprise_id = $enterpise_id AND user_id = $user_id ";
            
            $Hour = $this->model->query($mySQL);
        } else {
            $data = array();
            $data['enterprise_id'] = $enterpise_id;
            $data['user_id'] = $user_id;
            $newHour = $this->model->insert('enterprise_opening_hour', $data, array());
            
            if($newHour['status'] == 'success')
            {
                $hour_id = $newHour['data'];
        
                $mySQL = ($is_bool !== true)
                ? " UPDATE enterprise_opening_hour SET $field = '$value' WHERE hour_id = $hour_id "
                : " UPDATE enterprise_opening_hour SET $field = $value   WHERE hour_id = $hour_id ";
                $Hour = $this->model->query($mySQL);
               
            }
        }
                
        $message = ($is_bool !== true) ? 'Hour updated...' : 'Day updated...';
        $response = array('hour_update'=>$Hour['status'],'query'=>$mySQL, 'message'=>$message);
        echo json_encode($response);
    }
}

