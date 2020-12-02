<?php

class uploaderController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        $this->model=$this->loadModel('db');
    }

    public function index()
    {
        $this->_view->getPlugins(array('bootstrap-fileinput'));
        $this->_view->getPlugins(array('clockpicker'));
        $this->_view->setJs(array('weeks'));
        $this->_view->renderizar('index');
    }

    public function photo_profile($user_id = 'trash') //Enterprise
    {
        if (empty($_FILES['photo_profile']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['photo_profile'];
        $success = null;

        $paths= [];
        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/enterprise/profile/$user_id/";

            if (!file_exists($target)) {
                mkdir($target);
            }

            if(move_uploaded_file($images['tmp_name'][$i], $target.'profile.jpg')) {
                $success = true;
                $paths[] = $target.$filename;
            } else {
                $success = false;
                break;
            }
        }

        if ($success === true)
        {
            $output = ['uploaded' => $paths];
        } elseif ($success === false) {
            $output = ['error'=>'Error while uploading images. Contact the system administrator'];
            foreach ($paths as $file) {
                unlink($file);
            }
        } else {
            $output = ['error'=>'No files were processed.'];
        }
        echo json_encode($output);
    }


    public function libro_ediq() // Arma Páginas del Breviario
    {
        if (empty($_FILES['ediq_photo']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['ediq_photo'];
        $success = null;
        $paths= [];
        $filenames = $images['name'];
        $total_files = count($filenames);
        $target_dir = ROOT."public/uploads/enterprise/breviario/";
        $target_dir_new = ROOT."public/uploads/enterprise/breviario/paginas/bachillerato-1t/";

        $xi = explode(".", $filenames[0]);
        $i = intval($xi[0]);

        if ($i == 1) {
            $target = $target_dir_new . basename('1.jpg');
            $tmp  = $_FILES['ediq_photo']['tmp_name'][0];
            move_uploaded_file($tmp, $target);
            copy($target_dir.'blank.jpg', $target_dir_new.'2.jpg');
            chmod($target_dir_new.'1.jpg',0777);
            chmod($target_dir_new.'2.jpg',0777);
        }

        if ($i >= 2) {
            $target = $target_dir_new . basename(($i+1).'.jpg');

            $tmp  = $_FILES['ediq_photo']['tmp_name'][0];
            if (move_uploaded_file($tmp, $target)) {
                chmod($target_dir_new.basename(($i+1)).'.jpg',0777);
                $success = true;
                $paths[] = $target;
            }
        }

        if($success === true) {
            $output = ['uploaded' => $paths];
        } elseif ($success === false) {
            $output = ['error'=>'Error while uploading images. Contact the system administrator'];
        } else {
            $output = ['success'=>'Breviario paginado...'];
        }
        echo json_encode($output);
    }

    public function delete_docs()
    {
        $u = $_POST['user_id'];
        $f = $_POST['name'];
        $d = $_POST['dir'];

        $rm = ROOT.'public/uploads/'.$d.'/'.$u.'/'.$f;
        if(unlink($rm)){
            $result = true;
            $message = 'File deleted successfully';
        }else{
            $result=false;
            $message = 'There was an error to try delete "'.$f.'" file...';
        }

        $response = array('result' => $result, 'message' => $message);
        echo json_encode($response);
    }

}
