<?php
namespace App\Models\Admin;

use Mai\Model;

class voucher extends Model{

    public $Id;
    public $VoucherId;
    public $VoucherName;
    public $VoucherCode;
    public $Status;
    public $timeCreated;
    
}