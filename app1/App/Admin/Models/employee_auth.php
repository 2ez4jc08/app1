<?php
namespace App\Admin\Models;
use Mai\Model;

class employee_auth extends Model{
    public $Id;
    public $UserId;
    public $UserName;
    public $UserPassword;
    public $HashPass;
    public $Status;
}