<?php
class ajaxController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->model=$this->loadModel('db');
        $this->shop=$this->loadModel('db');

    }
    
    public function index(){ }

    public function profileRequest()
    {
        $this->getLibrary('encrypt');
        $encrypt=new Encryption(HASH_KEY);

        $dataArray = $this->unserilizeArray($_POST['dataInArray']);

        $UserExist = $this->model->select_row('system_users', 'user_id', array("username"=>$dataArray['email']));

        if(!$UserExist)
        {
            $response = false;
            $message_t = 'error';
            $file_template = '';
            $toString = '';
            $subject = '';

            $data['type'] = $dataArray['type'];

            switch ($dataArray['type'])
            {
                case 1: //Enterprise
                case 2: //Customer
                    $file_template = 'welcome.html';
                    $toString = $dataArray['email'];
                    $subject = 'Welcome to VIKER.MX';
                    break;
                case 3: #Cycler
                    $file_template = 'request.html';
                    $toString = EMAIL_RH;
                    $subject = 'New CYCLER Request to VIKER.MX';
                    break;
            }

            $data['first_name'] = $dataArray['first_name'];
            $data['last_name'] = $dataArray['last_name'];
            $data['phone_number'] = $dataArray['phone_number'];

            $data['username'] = $dataArray['email'];
            $data['password'] = sha1($dataArray['password']);
            $data['password_clean'] = $dataArray['password'];

            $data['lang'] = 'EN';
            $data['company'] = 'VIKER';
            $data['active'] = 0;
            $data['date_created'] = date('Y-m-d H:i:s');
            //$this->pr($data);
            $res = $this->model->insert('system_users', $data, array());

            if ($res['status'] == 'success')
            {
                $user_id = $res['data'];
                // user validation
                $val['user_id'] = $user_id;
                $val['signed_agree'] = 0;
                $val['val'] = 0;
                $resV = $this->model->insert('validations', $val, array());
                if ($resV['status'] == 'success')
                {


                    if ($data['type'] == 1) {
                        $dataEnterprise['user_id'] = $user_id;
                        $dataEnterprise['name_enterprise'] = 'Default Name';
                        $dataEnterprise['active_enterprise'] = '0';
                        $dataEnterprise['geo_lat'] = '20.6539385';
                        $dataEnterprise['geo_lng'] = '-87.1417377';
                        $resEnterprise = $this->model->insert('system_user_enterprise', $dataEnterprise, array());

                        if ($resEnterprise['status'] == 'success') {
                            $enterprise_id = $resEnterprise['data'];
                            $dataEnterpriseHO['enterprise_id'] = $enterprise_id;
                            $dataEnterpriseHO['user_id'] = $user_id;
                            $resEnterpriseHO = $this->model->insert('enterprise_opening_hour', $dataEnterpriseHO, array());
                        }

                    }

                    $response = true;
                    $message_a = 'Profile created';
                    $message_b = 'Activating your account...Check your inbox';
                    $message_t = 'success';

                    $template_data = array( '{{customer_name}}',
                        '{{user_id}}',
                        '{{username}}',
                        '{{password}}',
                        '{{url}}',
                        '{{mail_company}}'
                    );

                    $template_replace = array(  $data['first_name'] . ' ' . $data['last_name'],
                        $encrypt->encrypt($user_id),
                        $data['username'],
                        $dataArray['password'],
                        APP_URL,
                        EMAIL_COMPANY
                    );

                    $htmlContent = $this->getEmailTemplate($file_template, $template_data, $template_replace);
                    $this->sendMail(EMAIL_COMPANY, $toString, $subject, $htmlContent);

                }
            } else {
                $message_a = 'Error...';
                $message_b = 'Check your information and try again!';
            }
        }else{
            $message_a = 'Error...';
            $message_b = 'Email Address already register!';
        }

        $response_data = array(
            'response' => $response,
            'message_a' => $message_a,
            'message_b' => $message_b,
            'message_t' => $message_t,
            'data' => $data);
        echo json_encode($response_data);
    }


    public function addStuff()
    {
        $enterprise= $_POST['enterprise'];
        $stuff_id = $_POST['stuff_id'];
        $how_many = $_POST['how_many'];

        $stuff_uid = 'VKR' . uniqid();

        $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['how_many'] =
            (!isset($_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['how_many']))
                ? 0
                : $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['how_many'];

        $how_many_s = $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['how_many'];

        $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['stuff_uid'] = $stuff_uid;
        $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['price'] = $_POST['price'];
        $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]["$stuff_uid"]['how_many'] +=1;
        
        $this->dataStuff();
     
        $response = array('orderData'=>$_SESSION['Shopping']);

        echo json_encode($response);
    }

    public function addStuffFav()
    {
        
        $data['enterprise_id'] = $_POST['enterprise'];
        $data['stuff_id'] = $_POST['stuff_id'];
        $data['user_id'] = $_SESSION['user_id'];

        $Favorite = $this->model->select_row("system_user_favorite","*",$data);
        $message = "You already have this item";
        if(!$Favorite)
        {
            $message="Item added to favorites";
            $Favorite = $this->model->insert("system_user_favorite",$data,array());
        }
        $response = array('favoriteData'=>$Favorite,'message'=>$message);

        echo json_encode($response);
    }

    public function updStuff()
    {
        $enterprise= $_POST['enterprise'];
        $stuff_id = $_POST['stuff_id'];
        $how_many = $_POST['how_many'];

        $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]['price'] = $_POST['price'];
        $_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]['how_many'] = $_POST['how_many'];

        $response = array('orderData'=>$_SESSION['Shopping']);
        echo json_encode($response);
    }

    public function delStuff()
    {
        $enterprise= $_POST['enterprise'];
        $stuff_id = $_POST['stuff_id'];
        #$_SESSION['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]['how_many'] = 0;
        $Shopping = $_SESSION;
        $Shopping['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]['how_many'] = 0;
        
        #unset($Shopping['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id]);
        $_SESSION = $Shopping;
        $response = array('orderData'=>$_SESSION['Shopping']);
        echo json_encode($response);
    }

    

    public function startCheckout()
    {
        $shopping_data = $this->unserilizeArray($_POST['shopping_data']);
        $checkout_shop = $this->unserilizeArray($_POST['checkout_shop']);

        Session::set('Checkout',true);
        Session::set('ShoppingData',$shopping_data);
        Session::set('CheckoutShop',$checkout_shop);

        $response = array('ShoppingData'=>$shopping_data,'CheckoutShop'=>$checkout_shop);
        echo json_encode($response);
    }

    public function determinateCostsCycler()
    {
        $Shopping = Session::get('Shopping');
        $checkout_shop = Session::get('CheckoutShop');

        $order_data = $this->unserilizeArray($_POST['order_data']);
        foreach ($Shopping['Enterprise'] as $e => $enterprise)
        {
            foreach ($enterprise as $e_id => $stuff)
            {
                if ($e_id == 'enterprise_data')
                {
                    $geo_lat_c = $order_data['geo_lat'];
                    $geo_lng_c = $order_data['geo_lng'];

                    $geo_lat_e = $enterprise[$e_id]['geo_lat'];
                    $geo_lng_e = $enterprise[$e_id]['geo_lng'];

                    $kmDistance = $this->cyclerCostDistance($geo_lat_c, $geo_lng_c, $geo_lat_e, $geo_lng_e);
                    $Emissions = $this->CO2KG($kmDistance);

                    if($kmDistance > 3)
                    {
                        $cost = $kmDistance * 10;
                    }else
                    {
                         $cost = CYCLER;
                    }

                    $cycler_cost = number_format($cost,2);

                    $_SESSION['CheckoutShop']['gran_total'] = $cycler_cost +  $checkout_shop['total_pay_real'];
                    $_SESSION['CheckoutShop']['granTotal_cycler_float'] = $cycler_cost;

                    $htmlCosts = '
                            <table class="table" style="color:#00a65a">
                                <tbody><tr>
                                    <th>&nbsp;</th>
                                    <th>SUBTOTAL</th>
                                    <td class="pull-right"  style="color:#00a65a">$'.number_format($checkout_shop['total_pay_real'],2).'</td>
                                </tr>
                
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Cycler <span id="kmDistance">['.$kmDistance.'Kms.]</span>:</th>
                                    <td class="pull-right"  id="cycler_cost" style="color:#00a65a">$'.number_format($cycler_cost,2).'</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>TOTAL</th>
                                    <td class="pull-right" id="total_cost" style="color:#00a65a">$'.number_format($cycler_cost +  $checkout_shop['total_pay_real'],2).'</td>
                                </tr>             
                                </tbody>
                            </table>';
                    $gran_total = $cycler_cost+$checkout_shop['total_pay_real'];

                    $htmlPayment = '<form id="checkout_shop" action="" method="post" role="form">
                                        <input type="hidden"
                                           id="granTotal_float"
                                           name="gran_total"
                                           value="'.$gran_total.'">
                                        
                                        <input type="hidden"
                                               id="granTotal_cycler_float"
                                               name="granTotal_cycler_float"
                                               value="'.$cycler_cost.'">
                                        
                                        <input type="hidden"
                                               id="total_pay_real"
                                               name="total_pay_real"
                                               value="'.$checkout_shop['total_pay_real'].'">
                                        <div class="col-md-6" style="text-align: center;">
                                        
                                            <input type="hidden"
                                               id="distance_kms"
                                               name="distance_kms"
                                               value="'.$kmDistance.'">
                                            <!--
                                            <label>You pay with...</label>
                                            <div class="form-group has-warning">
                                            
                                                <input type="text" id="pay_with" name="pay_with" class="form-control number"
                                                   maxlength="5" onchange="getChange(this.value);">
                                            </div>
                                            -->
                                            
                                            <div class="form-group">
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <select name="type" id="pay_with" class="form-control reg_info text4rea" onchange="payWith(this.value);">
                                                        <option selected value="">Choose Your payment method...</option>
                                                        <option value="1" >Cash</option>
                                                        <option value="2" >Paypal</option>
                                                    </select>
                                                </div>
                
                                            </div>
                                            <div  id="cashPayment" style="display: none;">
                                                <label>You pay with...<span><small>$100, $200, $500</small></span></label>
                                                <div class="form-group has-warning" >
                                                
                                                    <input type="text" id="pay_with" name="pay_with" class="form-control number"
                                                       maxlength="5" onchange="getChange(this.value);" placeholder="">
                                                </div>
                                                
                                                <div class="form-group has-warning">
                                                    <input type="hidden" class="form-control" id="pay_change" name="pay_change" value="" readonly>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div style="text-align: center;">
                                                        <a href="#" id="order_now" class="btn btn-primary" onclick="orderCheckout();" style="display: none;">Order NOW!!</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>

                                        
                                    </form>';

                }
            }
            
        }


        $response = array('cycler_cost'=>'$'.$cycler_cost,
                          'total_pay_real' => '$'.number_format($_SESSION['CheckoutShop']['gran_total'],2),
                          'kmDistance' => $kmDistance,
                          'Emissions' => $Emissions,
                          'htmlCosts'=>$htmlCosts,
                          'htmlPayment'=>$htmlPayment
                          );

        //var_dump($response);
        echo json_encode($response);
    }

    public function orderCheckout()
    {
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
                    $dataO['user_id'] = Session::get('user_id');
                    #$dataO['address_id'] = $Stuff['stuff_data'][''];
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
                    $orderData = $this->model->insert("order_enterprise",$dataO,array());
                    #$this->pr($orderData);
                    $order_id = $orderData['data'];
                }
                foreach ($stuff as $s_id => $Stuff)
                {
                    $dataS=array();
                    if (is_int($s_id))
                    {
                        foreach ($Stuff as $stuff) {
                            $dataS['order_id'] = $order_id;
                            $dataS['stuff_id'] = $s_id;
                            $dataS['how_many_stuff'] = $stuff['how_many'];
                            $dataS['price_stuff'] = $stuff['price'];
                            #$this->pr($dataS);
                            $stuffData = $this->model->insert('order_stuff', $dataS, array());
                        }
                    }
                }
            }
        }



        $response = array('ShoppingData'=>$shopping_data,'CheckoutShop'=>$checkout_shop,'orderData'=>$orderData);
        echo json_encode($response);
    }


    public function oSpecialDelivery()
    {
        $order_data = $this->unserilizeArray($_POST['order_data']);

        $dataO['user_id'] = Session::get('user_id');
        $dataO['geo_lat'] = $order_data['geo_lat'];
        $dataO['geo_lng'] = $order_data['geo_lng'];
        $dataO['geo_str'] = $order_data['street'];
        $dataO['geo_ext'] = $order_data['geo_ext'];
        $dataO['geo_int'] = $order_data['geo_int'];
        $dataO['total_viker'] = SCYCLER;
        $dataO['special_delivery_where'] = $order_data['special_delivery_where'];
        $dataO['special_delivery'] = $order_data['special_delivery'];
        $dataO['status'] = 'NEW';

        Session::set('CheckoutShop',$dataO);
        $orderData = $this->model->insert("order_special",$dataO,array());
        $response = array('orderData'=>$orderData);
        echo json_encode($response);
    }

    public function checkSession()
    {
        if(Session::get('Shopping') && Session::get('Checkout'))
        {
            $url = BASE_URL . 'checkout/index';
        }

        if(Session::get('Shopping') && !Session::get('Checkout'))
        {
            $url = BASE_URL . 'menu/shopping';
        }

        if(!Session::get('autenticado'))
        {
            $url = BASE_URL . 'login/index';
        }
        $response = array('url'=>$url);
        echo json_encode($response);
    }

    public function checkSessionO()
    {
        if(Session::get('Shopping') && !Session::get('Checkout'))
        {
            $url = BASE_URL . 'index';
        }

        if(!Session::get('autenticado'))
        {
            $url = BASE_URL . 'login/index';
        }
        $response = array('url'=>$url);
        echo json_encode($response);
    }

    public function get_total()
    {
        Session::set('gtotal',$_POST['granTotal_float']);
        $response = array('gtotal' => number_format(Session::get('gtotal'),2,'.',','));
        echo json_encode($response);
    }

    public function get_total_s()
    {
        $response = array('gtotal' => number_format(Session::get('gtotal'),2,'.',','));
        echo json_encode($response);
    }


    /* * * * * * * * * * *
     * ORDERS ENTERPRISE *
     * * * * * * * * * * */

    public function get_orders_e()
    {
        #$conditions = array('enterprise_id' => $this->getPostParam('enterprise_id'));
        #$Orders = $this->model->select_data('order_enterprise','*',$conditions,false,false,'order_id','DESC');

        $Orders_new = array();
        $Orders_cyc = array();
        $Orders_aut = array();
        $Orders_del = array();

        $where =  ' enterprise_id ='.$this->getPostParam('enterprise_id').' AND status = "NEW"';
        $Orders_new = $this->model->select_data_where('order_enterprise','*',$where);
        if(!empty($Orders_new))
        {
            foreach ($Orders_new as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $Orders_new[$ido]['Customer'] = $Customer;
            }
        }

        $where =  ' enterprise_id = '.$this->getPostParam('enterprise_id').' AND status = "CYCLER"';
        $Orders_cyc = $this->model->select_data_where('order_enterprise','*',$where);
        if(!empty($Orders_cyc))
        {
            foreach ($Orders_cyc as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $Orders_cyc[$ido]['Customer'] = $Customer;
            }
        }

        $where =  ' enterprise_id = '.$this->getPostParam('enterprise_id').' AND status = "AUTH"';
        $Orders_aut = $this->model->select_data_where('order_enterprise','*',$where);
        if(!empty($Orders_aut))
        {
            foreach ($Orders_aut as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $Orders_aut[$ido]['Customer'] = $Customer;
            }
        }

        $where =  ' enterprise_id = '.$this->getPostParam('enterprise_id').' AND status = "DELIVERED"';
        $Orders_del = $this->model->select_data_where('order_enterprise','*',$where);
        if(!empty($Orders_del))
        {
            foreach ($Orders_del as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $Orders_del[$ido]['Customer'] = $Customer;
            }
        }

        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));
        $this->_view->Orders_new = $Orders_new;
        $this->_view->Orders_cyc = $Orders_cyc;
        $this->_view->Orders_del = $Orders_del;
        $this->_view->Orders_aut = $Orders_aut;
        ob_start();

        echo $this->_view->loadTemplate('orders','enterprise');
        $html_orders=ob_get_contents();
        ob_end_clean();

        $response = array('html_orders'=>$html_orders);
        echo json_encode($response);
    }

    /* * * * * * * * * * *
     * ORDERS CUSTOMER *
     * * * * * * * * * * */

    public function get_orders_c()
    {
        #$conditions = array('enterprise_id' => $this->getPostParam('enterprise_id'));
        #$Orders = $this->model->select_data('order_enterprise','*',$conditions,false,false,'order_id','DESC');

        $user_id = Session::get('user_id');
        $this->_view->setJs(array('index'));
        $total_distance = $this->model->query("SELECT SUM(distance_kms) AS distance_kms FROM order_enterprise WHERE user_id = $user_id;");

        $this->_view->Emissions = $this->CO2KG($total_distance[0]['distance_kms']);
        $this->_view->cOrders = $this->countShoppings('order_enterprise',$_SESSION['user_id']);
        $this->_view->csOrders= $this->countShoppings('order_special',$_SESSION['user_id']);

        $this->_view->total_distance = $total_distance[0]['distance_kms'];


        $this->_view->setCss(array('index'));
        #$this->_view->setTemplates(array('orders','profile'),false);
        $conditions = array('user_id' => $user_id);
        $Orders = $this->model->select_data('order_enterprise','*',$conditions,false,false,'order_id','DESC');
        $sOrders = $this->model->select_data('order_special','*',$conditions,false,false,'order_id','DESC');

        if(!empty($Orders))
        {
            foreach ($Orders as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $Orders[$ido]['Customer'] = $Customer;

                $conditions = array('enterprise_id' => $o['enterprise_id']);
                $Enterprise = $this->model->select_row('system_user_enterprise','logo_enterprise, enterprise_id, name_enterprise,geo_lat,geo_lng,geo_str,geo_ext,geo_int',$conditions);
                $Orders[$ido]['Enterprise'] = $Enterprise;
            }
        }

        if(!empty($sOrders))
        {
            foreach ($sOrders as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $sOrders[$ido]['Customer'] = $Customer;
            }
        }

        $this->_view->customerName = Session::get('first_name').' '.Session::get('last_name');
        $this->_view->customerID = Session::get('user_id');

        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));
        $this->_view->Orders = $Orders;
        $this->_view->sOrders = $sOrders;
        ob_start();

        echo $this->_view->loadTemplate('orders','customer');
        $html_orders=ob_get_contents();
        ob_end_clean();

        $response = array('html_orders'=>$html_orders);
        echo json_encode($response);
    }

    public function get_files_uploaded($user_id,$f=false,$ft=false)
    {
        $path = "public/uploads/$f/$ft/$user_id/";

        $arrPaths = array();
        $arrArchiveType = array();

        if(is_dir(ROOT.$path)){
            $folder = opendir(ROOT . $path);
            while ($archive = readdir($folder)) {
                if (!is_dir($archive)) {
                    array_push($arrPaths, '/' . $path . $archive);
                    $file_name = explode(".", $archive);
                    $fileType = end($file_name);

                    $fileType = ($fileType == 'jpg' || $fileType == 'png' || $fileType == 'jpeg') ? 'image' : 'pdf';
                    $file_stat = stat(ROOT . $path . $archive);


                    $url = "/customer/uploader/delete_docs";
                    $file_config = array('type' => "$fileType", 'size' => $file_stat['size'],
                        'url' => $url, 'extra' => array('name' => $archive, 'user_id' => $user_id, 'dir'=>$f.'/'.$ft));
                    array_push($arrArchiveType, $file_config);
                }
            }
        }
        $response = array("fileContent"=>$arrPaths, "fileType"=>$arrArchiveType);
        echo json_encode($response);
    }


    public function activateCompany() {

        $columns = array('active_enterprise'=>$this->getPostParam('active_enterprise'));
        $where = array('enterprise_id'=>$this->getPostParam('enterprise_id'));
        $result = $this->model->update('system_user_enterprise', $columns, $where,false);

        $message = "Error";
        if($result)
        {
            $message=($this->getPostParam('active_enterprise') == '1') ? "Company Activate" : "Company Deactivated";
        }
        $response = array('result'=>$result ,'message'=>$message);

        echo json_encode($response);

    }


    public function activateStuff() {

        $columns = array('active_stuff'=>$this->getPostParam('active_stuff'),'stock_stuff'=>$this->getPostParam('active_stuff'));

        $where = array( 'stuff_id'=>$this->getPostParam('stuff_id'));

        $result = $this->model->update('enterprise_stuff', $columns, $where,false);

        $message = "Error";
        if($result)
        {
            $message=($this->getPostParam('active_stuff') == '1') ? "Stuff Activate" : "Stuff Deactivated";
        }
        $response = array('result'=>$result ,'message'=>$message);

        echo json_encode($response);

    }


    public  function stockStuff() {
        $deleteStuff = array();
        $deleteStuff['active_stuff'] = $this->getPostParam('active_stuff');
        $deleteStuff['stock_stuff'] = $this->getPostParam('stock_stuff');
        $deleteStuff['enterprise_id'] = $this->getPostParam('enterprise_id');
        $deleteStuff['stuff_id'] = $this->getPostParam('stuff_id');


        $where = array('stuff_id'=>$this->getPostParam('stuff_id'));
        $result = $this->model->update('enterprise_stuff', $deleteStuff, $where,false);
        $message = 'An "Error" occurred during the transaction';
        if($result)
        {
            $message="Your product has been deleted...";
        }

        $response = array('result'=>$result ,'message'=> $message);

        echo json_encode($response);

    }



    /*
     * last change... Tue Aug 29, 17 21:40:20*/
}
