<?php
//Carga la pagina por default
class AdminController
{
    private $view;
    public function __construct()
    {
        $this->view = new View();
    } //construct

    public function openAdminSignIn(){
        $this->view->show("loginAdmin.php");
    }

    public function signIn(){
        require 'model/AdminModel.php';

        $admin = new AdminModel();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $admin->signIn($username, $password);
        if($result != '0'){
            $this->view->show("adminview.php", null);
        }else{
            print_r("error");
        }
    }

    public function logOut(){
        $this->view->show("indexview.php");
    }
    

}//fin de clase