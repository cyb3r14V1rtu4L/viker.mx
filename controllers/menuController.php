
<?php
/**
 * Created by PhpStorm.
 * User: enterprise
 * Date: 6/6/16
 * Time: 10:14 AM
 */

class menuController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->menu=$this->loadModel('menu');
        $this->shop=$this->loadModel('db');
        $this->enterprise=$this->loadModel('enterprise');
    }

    public function index()
    {
        // $this->dataStuff();
        $this->_view->renderizar('index');
    }

    public function showMenu($E_id)
    {
        $this->_view->e_id = $E_id;
        $this->_view->Enterprise = $this->enterprise->select_data('system_user_enterprise','*',array('enterprise_id'=>$E_id));
        $CategoryTab = array();
        $Category = $this->enterprise->select_data('category_stuff','*',array('enterprise_id'=>$E_id),false,false,'tab_cat');
        if(is_array($Category)){
            foreach($Category as $cat_data)
            {
                $Stuff = $this->enterprise->select_data('enterprise_stuff','*',array('enterprise_id'=>$E_id,'category_id'=>$cat_data['category_id'], 'active_stuff'=> '1'));
                
                if(!empty($_SESSION['user_id']))
                {
                    if(!empty($Stuff))
                    {
                        foreach($Stuff as $s=>$stuf)
                        {
                            //echo $s;
                            $data['enterprise_id'] = $E_id;
                            $data['stuff_id'] = $stuf['stuff_id'];
                            $data['user_id'] = $_SESSION['user_id'];
                            $Favorite = $this->enterprise->select_row("system_user_favorite","*",$data);
                            if(!empty($Favorite))
                            {
                                $Stuff[$s]['favorite'] = '';
                            }else{
                                $Stuff[$s]['favorite'] = '-o';
                            }
                        }
                    }
                }

                $CategoryTab[$cat_data['name_cat']] = $Stuff;
            }
        }

        $this->_view->CategoryStuff = $CategoryTab;
        $this->_view->renderizar('index');
    }

    public function addIngredients() { 
        $this->_view->Shopping = Session::get('Shopping');
        //$this->pr(Session::get('Shopping'));
        $stuff_id = $this->getPostParam('stuff_id');
        $this->_view->stuff_id = $stuff_id;

        $this->_view->enterprise_id = $this->getPostParam('enterprise_id');
        $this->_view->stuff_uid = $this->getPostParam('stuff_uid');

        $conditions = array('stuff_id' => $stuff_id, 'extra_activo'=> 1);
        $Additionals = $this->enterprise->select_data('enterprise_stuff_extra','*',$conditions);

        $this->_view->Additionals = $Additionals;
        ob_start();
        ?>
            <link href="/public/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
            <script src="/public/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js" type="text/javascript"></script>
            <script src="/views/menu/js/ingredients.js" type="text/javascript"></script>

            <div class="col-md-12 col-sm-12 col-xs-12">
        
            <?php
            echo $this->_view->loadTemplate('additional_stuff', false);
            ?>
        </div>
     

        <div class="clear"></div>
        
        <?php
        $html=ob_get_contents();
        ob_end_clean();

        $response = array('html'=>$html);
        echo json_encode($response);

    }

    public function updateExtraOrder()
    {
        $Ingredients = array();
        $Shopping = array();
        $Shopping = Session::get('Shopping');

        $ShoppingAux = Session::get('ShoppingAux');
        if ($ShoppingAux === NULL) {
            Session::Set('ShoppingAux', Session::get('Shopping'));
            $ShoppingAux = Session::get('ShoppingAux');
        }

        $enterprise_id = $this->getPostParam('enterprise_id');
        $extra_id = $this->getPostParam('extra_id');
        $stuff_id = $this->getPostParam('stuff_id');
        $stuff_uid = $this->getPostParam('stuff_uid');
        $checked   = $this->getPostParam('v');
        $conditions = array('extra_id' => $extra_id);
        $Extra = $this->enterprise->select_data('enterprise_stuff_extra','*',$conditions);
        
        if(!isset($Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'])) {
            $Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'] = array();
        }
        
        if($checked == 'true') {
            $Ingredients = $Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'];
            $push_item = true;
            foreach($Ingredients as $ingredient) { 
                if($ingredient['extra_id'] == $extra_id) {
                    $push_item = false;
                    break;
                }
            }

            if($push_item) {
                array_push($Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'],$Extra[0]);
            }

        }else {
            $Ingredients = $Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'];
            foreach($Ingredients as $i=>$ingredient) {
                if($ingredient['extra_id'] == $extra_id) {
                    unset($Ingredients[$i]);
                }
            }
            $Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'] = $Ingredients;      
        }

        $IngredientsPrice = $Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['stuff_data']['Ingredients'];
        $iTotal=0;
        foreach ($IngredientsPrice as $i=>$data) {
            $iTotal += $data['extra_price'];
        }
        $newPrice = $ShoppingAux['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['price'] += $iTotal;
        $Shopping['Enterprise'][$enterprise_id]['stuff'][$stuff_id][$stuff_uid]['price'] = $newPrice;

        Session::set('Shopping', $Shopping);
        $response = array('orderData'=>$Shopping);
        echo json_encode($response);
    }

    public function shopping()
    {
        $this->_view->renderizar('shopping');
    }

    public function delete_stuff($enterprise, $stuff_id, $stuff_uid)
    {
        $Shopping = $_SESSION;
        unset($Shopping['Shopping']['Enterprise'][$enterprise]['stuff'][$stuff_id][$stuff_uid]);
        $_SESSION = $Shopping;
        $this->redireccionar('menu/shopping');
    }

   
    public function products()
    {
        $this->_view->getPlugins(array('minicart'));
        $this->_view->renderizar('products');
    }


    public function cancel_shopping()
    {
        Session::destroy('Shopping');
        Session::destroy('ShoppingAux');
        $this->redireccionar();
    }



}
