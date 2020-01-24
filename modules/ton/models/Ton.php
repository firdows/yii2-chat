<?php

namespace app\modules\ton\models;

use Yii;

/**
 * This is the model class for table "ton".
 *
 * @property int $id
 * @property string $title
 * @property string $detail
 * @property string $list
 */
class Ton extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ton';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'detail', 'list'], 'required'],
            [['detail', 'list'], 'string'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'detail' => 'Detail',
            'list' => 'List',
        ];
    }
}
