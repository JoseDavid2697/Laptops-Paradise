<?php
session_start();

if (!isset($_SESSION['items_list'])) {
    $_SESSION['items_list'] = array();
}

if (!isset($_SESSION['id_to_update'])) {
    $_SESSION['id_to_update'] = '';
}

class ItemsController
{
    public function __construct()
    {
        //si no existe en php se crea sola
        $this->view = new View();
    } //constructor

    /*--------------------CHANGE VIEW FUNCTIONS----------------------------------------*/
    public function insertItemView(){
        $this->view->show("adminview.php");
    }

    public function updateItemView(){
        $this->getItems();
        $this->view->show("updateItem.php");
    }

    
    public function openSelectedItemView(){
        require_once 'model/ItemsModel.php';
        $items = new ItemsModel();
        $id = $_GET['id'];
        $_SESSION['id_to_update'] = $id;
        $data['items'] = $items->getSelectedItem($id);
        
        foreach($data['items'] as $item){
            $data['item_name'] = $item[0];
            $data['price'] = $item[1];
            $data['description'] = $item[2];
            $data['image'] = $item[3];
        }
        $this->view->show("selectedItemView.php",$data);

    }




    /*--------------------CRUD FUNCTIONS--------------------------*/

    public function getNewCode(){
        echo 'Your code is: '.'CODE123';
        echo '<br>';
    }

    //Get all the items stored in the database
    public function getItems(){
        require_once 'model/ItemsModel.php';
        $item = new ItemsModel();
        $result = $item->getItems();
        if($result != 0){
            $_SESSION['items_list'] = $result;
        }
    }

    //Insert a new item into the database
    public function insertItem(){
        require_once 'model/ItemsModel.php';

        $item = new ItemsModel();
        $image = $_FILES['image']['name'];
        $image_r = strtolower($image);
        $cd = $_FILES['image']['tmp_name'];
        $route = "./public/img/" . $_FILES['image']['name'];
        $destiny = "./public/img/" . $image_r;


        $item_name = $_POST['item_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $result = @move_uploaded_file($_FILES['image']['tmp_name'], $route);
        echo $result;
        if (!empty($result)) {
            if($item_name != null && $price != null && $description != null && $image != null && $category != null){
                $res = $item->insertItem($item_name,$price,$description,$image,$category);
                if($res == 0){
                    echo 'Product succesfully inserted!';
                    $this->view->show("adminview.php");
                }else{
                    echo 'Error when inserting';
                }
            }else{
                echo 'Please fill all the blanks!';
            }
        }else {

            echo "Failed to load the image";
        }
    }//insert

    public function updateItem(){
        require_once 'model/ItemsModel.php';
        $items = new ItemsModel();
        $item_name = $_POST['item_name'];
        $price = $_POST['price'];
        $description = $_POST['description']; 
        $no_empty = (($item_name != '' && $price != '' && $description != '') ? $items->updateItem($_SESSION['id_to_update'],$item_name,$price,$description) : 'error');
        
        if($no_empty!='error'){
            $this->view->show("adminview.php");
        }
    }
}
