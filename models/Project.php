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

    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Yii::$app->db;
    }

    public function  getProjectByUrl($param){
        $sql = "SELECT p.*, pt.type, pt.short_type
                FROM projects p, projects_type pt
                WHERE p.type_id = pt.id
                  AND p.url = '" . $param . "'
                  AND p.active = 1
                ";
        return $this->db->createCommand($sql)->queryOne();
    }

    public function getProjects() {
        $sql = "SELECT p.*, pt.type, pt.short_type
                FROM projects p, projects_type pt
                WHERE p.type_id = pt.id
                    AND p.active = 1
                    AND p.image != ''
                ORDER BY p.number
                ";
        return $this->db->createCommand($sql)->queryAll();
    }

    public function getImagesByProjectUrl($param){
        $sql = "SELECT pi.*
                FROM projects p, projects_main_image pi
                WHERE pi.project_id = p.id
                  AND p.url = '" . $param . "'
                  AND pi.image != ''
                  AND p.active = 1
                ";
        return $this->db->createCommand($sql)->queryAll();
    }
    public function getImagesByProjectUrlAddit($param){
        $sql = "SELECT i.*
                FROM projects p, projects_images i
                WHERE i.project_id = p.id
                  AND p.url = '" . $param . "'
                  AND i.image != ''
                  AND p.active = 1
                ";
        return $this->db->createCommand($sql)->queryAll();
    }
    public function getNextProjects($id){
        $sql = "SELECT p.id, p.url
                FROM projects p
                WHERE  p.id > " . $id . "
                  AND p.active = 1
                ORDER BY p.id ASC
                ";
        $pr = $this->db->createCommand($sql)->queryOne();
        if(empty($pr)){
            $sql = "SELECT p.*
                FROM projects p
                WHERE  p.active = 1
                ORDER BY p.id ASC
                ";
            $pr = $this->db->createCommand($sql)->queryOne();
        }
        return $pr;
    }

    public function getPrevProjects($id){
        $sql = "SELECT p.*
                FROM projects p
                WHERE  p.id < " . $id . "
                  AND p.active = 1
                ORDER BY p.id DESC
                ";
        $pr = $this->db->createCommand($sql)->queryOne();
        if(empty($pr)){
            $sql = "SELECT p.*
                FROM projects p
                WHERE   p.active = 1
                ORDER BY p.id DESC
                ";
            $pr = $this->db->createCommand($sql)->queryOne();
        }
        return $pr;
    }
}