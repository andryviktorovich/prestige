<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 * @property string $url
 * @property string $image
 * @property string $short_description
 * @property string $description
 * @property integer $active
 * @property string $update
 * @property string $create
 *
 * @property ProjectsType $type
 *
 */
class ProjectsForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'short_description', 'description'], 'required'],
            [['type_id', 'active','number'], 'integer'],
            [['short_description', 'description'], 'string'],
            [['dupdate', 'dcreate'], 'safe'],
            [['name', 'url','image'], 'string', 'max' => 256],
            [['imageFile'],  'image', 'extensions' => ['png', 'jpg', 'gif' , 'jpeg'], 'maxSize' => 6144*1024,
                'minWidth' => 200, 'maxWidth' => 5000,
                'minHeight' => 100, 'maxHeight' => 5000,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название проекта',
            'type_id' => 'Тип проекта',
            'url' => 'Сылка',
            'image' => 'Изображение для главной страницы',
            'short_description' => 'Краткое описание',
            'description' => 'Описание',
            'active' => 'Активное',
            'number' => 'Номер вывода',
            'dupdate' => 'Дата обновления',
            'dcreate' => 'Дата создания',
            'imageFile' => 'Изображение для главной страницы',
            'type' => 'Тип',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ProjectsType::className(), ['id' => 'type_id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $new_name = substr(md5(uniqid(rand(),true)), 0,15);
            while(file_exists(Yii::getAlias("@project") . '/' .$new_name.'.'.$this->imageFile->extension)){
                $new_name = substr(md5(uniqid(rand(),true)), 0,15);
            }
            $this->imageFile->saveAs(Yii::getAlias('@project') . '/' . $new_name . '.' . $this->imageFile->extension);
            return $new_name . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }
}
