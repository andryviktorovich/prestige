<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_info".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_menu
 * @property string $url
 * @property string $text
 * @property integer $active
 * @property integer $number
 * @property string $dateup
 */
class CompanyInfoForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_menu', 'url', 'text', 'number'], 'required'],
            [['text'], 'string'],
            [['active', 'number'], 'integer'],
            [['dateup'], 'safe'],
            [['title', 'title_menu', 'url'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Загаловок',
            'title_menu' => 'Заголовок для меню',
            'url' => 'Ссылка',
            'text' => 'Текст',
            'active' => 'Активное',
            'number' => 'Порядковый номер',
            'dateup' => 'Дата изменений',
        ];
    }
}
