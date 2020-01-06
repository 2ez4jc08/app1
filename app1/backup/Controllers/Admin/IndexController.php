<?php 
namespace App\Controllers\Admin;

use Mai\Controller;
use App\Models\Admin\admin;
use App\Models\Admin\gamecode;
use App\Models\Admin\voucher;

class IndexController extends Controller{

    public $adminDB = '';
    public $gamecodeDB = '';
    public $voucherDB = '';

    public function __construct()
    {
        parent::__construct($this->_module,$this->_controller,$this->_action);
        $this->adminDB = new admin();
        $this->gamecodeDB = new gamecode();
        $this->voucherDB = new voucher();
    }

    public function Index()
    {
        print_r($this->adminDB->Id);
        $getdata = $this->voucherDB->fields(" voucher.Id, voucher.VoucherName, voucher.Vouchercode, voucher.Status, voucherreference.VoucherId, voucherreference.TimeCreated, voucherreference.ReferenceName ")
                                    ->join(" JOIN `voucherreference` ON voucher.VoucherId = voucherreference.VoucherId ")
                                    ->select();
        echo $this->twig->render('admin/index.html', ['data'=>$getdata]);
    }
    
}