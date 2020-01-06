<?php
namespace App\Admin\Models;
use Mai\Model;

class attendance extends Model{

    public $Id;
    public $UserId;
    public $UserName;
    public $PunchDate;
    public $PunchTime;
    public $TimeCreated;
}