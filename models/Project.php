<?php
/**
 * Created by PhpStorm.
 * User: andry
 * Date: 30.11.15
 * Time: 22:06
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;


class Project extends Model{

    public function getProjects() {
        $db = Yii::$app->db;
        $sql = "SELECT p.*, pt.type
                FROM projects p, projects_type pt
                WHERE p.type_id = pt.id
                ";
        $command=$db->createCommand($sql);
        return $command->queryAll();
    }
}