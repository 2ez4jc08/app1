<?php
namespace App\Controllers\Ajax;
use Mai\Controller;
use App\Models\Ajax\games;
use App\Models\Ajax\voucher;
use App\Models\Ajax\activeqr;

class GamesController extends Controller{

    public $gamesDB = '';
    public $voucherDB = '';
    public $activeqrDB = '';

    public function __construct()
    {
        parent::__construct($this->_module,$this->_controller,$this->_action);
        $this->gamesDB = new games();
        $this->voucherDB = new voucher();
        $this->activeqrDB = new activeqr();
    }

    public function getGames()
    {
        $games['fb'] = $this->gamesDB->fields(" GameName, GameTime, UpperTeam, LowerTeam, Handicap, RecommendedTeam, GameScore, GameResult, ResultImage ")->where(" GameType = 'GAME-1' ")->limit(30)->order(" GameTime DESC ")->select();
        $games['bb'] = $this->gamesDB->fields(" GameName, GameTime, UpperTeam, LowerTeam, Handicap, RecommendedTeam, GameScore, GameResult, ResultImage ")->where(" GameType = 'GAME-2' ")->limit(30)->order(" GameTime DESC ")->select();
        echo json_encode($games);
    }

    public function getVoucher(){
        $voucher['wc'] = $this->voucherDB->fields(" VoucherCode ")->where(" VoucherId = 'VOUCHER-1' and Status = '1' ")->select();
        $voucher['qq'] = $this->voucherDB->fields(" VoucherCode ")->where(" VoucherId = 'VOUCHER-2' and Status = '1' ")->select();
        echo json_encode($voucher);
    }

    public function getQr(){
        $qr['qqc'] = $this->activeqrDB->fields(" QrImage ")->where(" QrType = 'qqcode' and Status = '1' ")->select();
        $qr['wcc'] = $this->activeqrDB->fields(" QrImage ")->where(" QrType = 'wccode' and Status = '1' ")->select();
        $qr['ac'] = $this->activeqrDB->fields(" QrImage ")->where(" QrType = 'addcode' and Status = '1' ")->select();
        echo json_encode($qr);
    }

}