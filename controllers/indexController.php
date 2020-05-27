<?php

class indexController extends Controller
{
    public function __construct() {
        //Session::validate();
        parent::__construct();
        $this->menu=$this->loadModel('menu');
        $this->shop=$this->loadModel('db');
        $this->enterprise=$this->loadModel('enterprise');

    }

    public function getMySQL($field_open, $field_close, $field_day_open) {

        //Current Day
        $date = date("Y-m-d");
        $hora = date("H:mm");

        $hora_actual = $this->enterprise->query(" SELECT CURRENT_TIME ");
        $hora_db = $hora_actual[0]['CURRENT_TIME'];

        //Check 00/24 Hour
        $Hour = substr($hora_db,0,2);
        $Hour = ($Hour == '00') ? '24': $Hour;
        $hora_db = substr_replace($hora_db, $Hour,0,2);


        $HoraiosEmpresa = $this->enterprise->select_data("enterprise_opening_hour",
                                                         "$field_open, $field_close, $field_day_open",
                                                        array()
                                                    );
        $HoursValids=array();


        #echo 'HORA ACTUAL: '.$hora.'<BR>';
        if($HoraiosEmpresa){
            foreach($HoraiosEmpresa as $horario)
            {
                $HoursValids=array();
                $ho = strtotime($horario["$field_open"]);
                $hc = strtotime($horario["$field_close"]);
                #echo $ho.':  '.$horario["$field_open"].'<br>'.$hc.':  '.$horario["$field_close"].'<br><br>';
                // Horario Nocturno
                if($ho > $hc) { 
                    $mySQL = " SELECT enterprise_id "
                            ." FROM enterprise_opening_hour "
                            ." WHERE CONVERT('$date $hora_db', datetime) BETWEEN "
                            ." CONVERT('".$date." ".$horario["$field_open"]."', datetime) " 
                            ." AND DATE_ADD(CONVERT('".$date." ".$horario["$field_close"].")', datetime), INTERVAL 1 DAY) "
                            ." AND $field_day_open = true ";
                    
                }else { 
                    $mySQL = " SELECT enterprise_id"
                            ." FROM enterprise_opening_hour "
                            ." WHERE CURRENT_TIME BETWEEN CONVERT($field_open, time) AND CONVERT($field_close, time) "
                            ." AND CONVERT('$hora_db', time) > CONVERT($field_open, time) "
                            ." AND CONVERT($field_close, time) > CONVERT('$hora_db', time) "
                            ." AND $field_day_open = true ";
                }
               #echo $mySQL.'sql<br>';//$HoursValids=array();
                
                $EnterpriseOpened =  $this->enterprise->query($mySQL);
                if(is_array($EnterpriseOpened)) {
                    
                    foreach($EnterpriseOpened as $eo) {
                        array_push($HoursValids, $eo);
                    }
                    
                }
            }
        }
        
        return $HoursValids;
        
    }

    public function index($login=0)
    {
        $this->dataStuff();
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('index'));

        $hora_actual = $this->enterprise->query(" SELECT CURRENT_TIME ");
        $hora_db = $hora_actual[0]['CURRENT_TIME'];

        //Check 00/24 Hour
        $Hour = substr($hora_db,0,2);
        $Hour = ($Hour == '00') ? '24': $Hour;
        $hora_db = substr_replace($hora_db, $Hour,0,2);
        $field_open = strtolower(date("D").'_hour_open');
        $field_close = strtolower(date("D").'_hour_close');
        $field_day_open = strtolower(date("D").'_day_open');
        
        $EnterpriseOpened = array();
        array_push($EnterpriseOpened, $this->getMySQL($field_open, $field_close, $field_day_open));

        $Enterprise = array();
        if (is_array($EnterpriseOpened)) {
            foreach ($EnterpriseOpened[0] as $e) {
                $E = $this->enterprise->select_data('system_user_enterprise','*',array('active_enterprise'=>'1', 'enterprise_id' => $e['enterprise_id']));
                array_push($Enterprise, $E[0]);
            }
        }

        $total_distance = $this->enterprise->query(" SELECT SUM(distance_kms) AS distance_kms FROM order_enterprise; ");
        $this->_view->Enterprise = $Enterprise;
        $this->_view->Emissions = $this->CO2KG($total_distance[0]['distance_kms']);
        $this->_view->total_distance = $total_distance[0]['distance_kms'];

        if($login == 0)
        {
            if (isset($_SESSION['autenticado'])) {
                $_SESSION['welcomeBack'] = 'swal("Welcome Back",
                "' . $_SESSION['first_name']  . ' ' . $_SESSION['last_name']. '",
                "success");';
            }
        }else{
            Session::destroy('welcomeBack');
        }


        $this->_view->getPlugins(array('jquery-masked'));
        $this->_view->setTemplates(array('geoloc_delivery','geoloc_static'),true);
        $this->_view->renderizar('index');
    }


    public function dash($login=0)
    {
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('index'));

        $this->_view->Enterprise = $this->enterprise->select_data('system_user_enterprise','*',array());
        #$this->pr($Enterprise);
        if($login == 0)
        {
            if (isset($_SESSION['autenticado'])) {
                $_SESSION['welcomeBack'] = 'swal("Welcome Back",
        "' . $_SESSION['first_name']  . ' ' . $_SESSION['last_name']. '",
        "success");';
            }
        }else{
            Session::destroy('welcomeBack');

        }

        $this->_view->renderizar('dash');

    }

    public function geoloc()
    {
        $this->_view->renderizar('geoloc');
    }

    public function footer(){
        $this->printR($_POST);
    }

    public function cancel_shopping()
    {

        Session::destroy('Shopping');
        $this->index();
    }



}