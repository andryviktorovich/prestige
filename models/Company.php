<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;


class Company extends Model{

    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Yii::$app->db;
    }

    public function getInfoByUrl($param){
        if(empty($param)){
            $sql = "SELECT *
                    FROM company_info
                    WHERE active = 1
                    ORDER BY NUMBER";

        }
        else {
            $sql = "SELECT *
                    FROM company_info
                    WHERE url = '" . $param . "'";
        }
        return  $this->db->createCommand($sql)->queryOne();
    }

    public function getItemsForMenu() {
        $sql = "SELECT id, title_menu,title, url
                FROM company_info
                WHERE active = 1
                ORDER BY number
                ";
        return  $this->db->createCommand($sql)->queryAll();
    }

}