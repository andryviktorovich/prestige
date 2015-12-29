<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects_type".
 *
 * @property integer $id
 * @property string $type
 * @property string $short_type
 * @property string $description
 */
class ProjectsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'short_type', 'description'], 'required'],
            [['description'], 'string'],
            [['type'], 'string', 'max' => 256],
            [['short_type'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'short_type' => 'Кратко тип',
            'description' => 'Описание типа',
        ];
    }
}
