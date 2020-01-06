<?php
namespace App\Admin\Models;
use Mai\Model;

class employee extends Model{
    public $Id;
    public $UserId;
    public $FullName;
    public $Email;
    public $ContactNumber;
    public $Address;
    public $DepartmentId;
    public $TimeCreated;
}