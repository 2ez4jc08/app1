<?php
namespace App\Home\Models;
use Mai\Model;

class client extends Model{
    public $Id;
    public $UserId;
    public $UserName;
    public $UserPassword;
    public $HashPass;
    public $Email;
}