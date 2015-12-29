<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "projects_main_image".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $image
 *
 * @property ProjectsForm $project
 */
class ProjectsMainImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects_main_image';
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
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            [['imageFile'],  'image', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'maxSize' => 6144*1024,
                'minWidth' => 1000, 'maxWidth' => 5000,
                'minHeight' => 200, 'maxHeight' => 5000,
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
            'project_id' => 'Проект',
            'image' => 'Изображение',
            'imageFile' => 'Изображение'
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(ProjectsForm::className(), ['id' => 'project_id']);
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
