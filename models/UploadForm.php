<?php
namespace app\models;

use yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            print_r($this->imageFile);
            $this->imageFile->saveAs(Yii::getAlias('@news') . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $this->imageFile->baseName . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }
}