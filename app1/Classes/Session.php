<?php
namespace Classes;

class Session {

    
    // public function loginSession($status, $user){
    //     if($status === 1 && $user === "admin"){
    //         $curtime = time();
    //         if(!empty($_SESSION['myhradminexpire'])){
    //             if($curtime < $_SESSION['mycmsexpire']){
    //                 header("Location: /Admin/Index");
    //             }
    //         }
    //     }
    // }

    public function checkSession($status, $user){
        if($status === 1 && $user === "admin"){
            $curtime = time();
            if($curtime > $_SESSION['myhradminexpire']){
                header("Location: /admin");
                session_destroy();
            }
        }else if($status === 1 && $user === "client"){
            $curtime = time();
            if($curtime > $_SESSION['myhrclientexpire']){
                header("Location: /");
                session_destroy();
            }
        }
    }

    public function setSession($user = null, $username = null, $expirationtime = null){
        if($user === "admin"){
            $_SESSION['myhradminuserid'] = $username;
            $_SESSION['myhradminexpire'] = time() + $expirationtime;
        }else if($user === "client"){
            $_SESSION['myhrclientuserid'] = $username;
            $_SESSION['myhrclientexpire'] = time() + $expirationtime;
        }
       
    }

}