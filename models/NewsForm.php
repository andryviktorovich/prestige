<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property integer $active
 * @property string $dateup
 * @property string $image
 */
class NewsForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
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
            [['title', 'short_description', 'description'], 'required'],
            [['short_description', 'description'], 'string'],
            [['active'], 'integer'],
            [['dateup'], 'safe'],
            [['title'], 'string', 'max' => 256],
            [['imageFile'],  'image', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 4096*1024,
                'minWidth' => 100, 'maxWidth' => 5000,
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
            'title' => 'Заголовок',
            'short_description' => 'Краткое описание',
            'description' => 'Описание',
            'active' => 'Активное',
            'dateup' => 'Дата публикации',
            'image' => 'Изображение',
            'imageFile' => 'Изображение'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = $this->imageFile->baseName;
            $new_name = md5($name);
            $this->imageFile->saveAs(Yii::getAlias('@image') . '/' . $new_name . '.' . $this->imageFile->extension);
            return $new_name . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }
}
