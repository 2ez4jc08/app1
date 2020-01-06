<?php
namespace App\Admin\Models;
use Mai\Model;

class admin extends Model{
    public $Id;
    public $UserName;
    public $UserPassword;
    public $HashPass;
    public $Active;
}