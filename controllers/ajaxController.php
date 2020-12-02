<?php
class ajaxController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->model = $this->loadModel('db');
    }
    
    public function index(){ }


}
