<?php
namespace App\Models\Ajax;
use Mai\Model;

class games extends Model {

    public $id;
    public $GameType;
    public $GameName;
    public $GameTime;
    public $UpperTeam;
    public $lowerTeam;
    public $Handicap;
    public $RecommendedTeam;
    public $GameScore;
    public $GameResult;
    public $ResultImage;

}