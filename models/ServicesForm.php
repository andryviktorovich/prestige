<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $text
 * @property integer $active
 * @property string $dateup
 */
class ServicesForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
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
            [['title', 'url', 'text'], 'required'],
            [['text'], 'string'],
            [['active'], 'integer'],
            [['dateup'], 'safe'],
            [['title', 'url'], 'string', 'max' => 256],
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
            'url' => 'Ссылка',
            'text' => 'Текст',
            'active' => 'Активное',
            'dateup' => 'Дата изменений',
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
