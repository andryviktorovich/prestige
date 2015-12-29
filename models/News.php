<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;


class News extends Model{

    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Yii::$app->db;
    }

    public function getInfoById($param){

        $sql = "SELECT *
                FROM news
                WHERE id = " . (int) $param;
        return  $this->db->createCommand($sql)->queryOne();
    }

    public function getNews(){

        $sql = "SELECT *
                FROM news
                WHERE active = 1
                ORDER BY dateup DESC";
        return  $this->db->createCommand($sql)->queryAll();
    }

}