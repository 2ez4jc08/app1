<?php
namespace App\Admin\Models;
use Mai\Model;

class submitted_leave extends Model{
    public $Id;
    public $RequestId;
    public $UserId;
    public $FromDate;
    public $ToDate;
    public $LeaveId;
    public $TotalDay;
    public $Status;
    public $TimeCreated;
}