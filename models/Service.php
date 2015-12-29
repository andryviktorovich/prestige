<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;


class Service extends Model{

    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Yii::$app->db;
    }

    public function getInfoByUrl($param){

        $sql = "SELECT *
                FROM services
                WHERE url = '" . $param . "'";
        return  $this->db->createCommand($sql)->queryOne();
    }

    public function getServices(){

        $sql = "SELECT *
                FROM services
                WHERE active = 1";
        return  $this->db->createCommand($sql)->queryAll();
    }

}