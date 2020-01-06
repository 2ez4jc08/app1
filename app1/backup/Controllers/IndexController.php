<?php 
namespace App\Controllers;

use Mai\Controller;
use App\Models\admin;

class IndexController extends Controller{

    // public $adminDB = '';

    // public function __construct()
    // {
    //     parent::__construct($this->_module,$this->_controller,$this->_action);
    //     $this->adminDB = new admin();
    // }

    // public function index()
    // {   
        // $adminDB = new admin();
        // $getdata = $this->adminDB->order(" Id ASC ")->select();
        // print_r($getdata);
     
        // $this->assign('test', $getdata);
        // $this->render();
        // echo $this->twig->render('index/index.php.twig', ['data'=>$getdata]);
    // }

    // public function addTest()
    // {
    //     $adminDB = new admin();
    //     $add['a'] = 'qweqwe';
    //     $add['b'] = 'qwe123';
    //     $insert = $adminDB->insert($add);
    //     if($insert){
    //         echo "add";
    //     }else{
    //         echo "not";
    //     }
    // }

    // public function updateTest()
    // {
    //     $adminDB = new admin();
    //     $updateid = 1;
    //     $update['b'] = "asda";
    //     $update = $adminDB->where(" Id = $updateid ")->update($update);
    //     if($update){
    //         echo "inserted";
    //     }else{
    //         echo "not";
    //     }
    // }

    // public function deleteTest()
    // {
    //     $adminDB = new admin();
    //     $deleteid = 6;
    //     $delete = $adminDB->where(" Id = $deleteid ")->delete();
    //     if($delete){
    //         echo "deleted";
    //     }else{
    //         echo "not";
    //     }
    // }

    
    
}