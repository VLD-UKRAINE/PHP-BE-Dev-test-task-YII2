<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property int $albumId
 * @property string $title
 * @property string $url
 *
 * @property Album $album
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['albumId', 'title', 'url'], 'required'],
            [['albumId'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            [['albumId'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['albumId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'albumId' => 'Album ID',
            'title' => 'Title',
            'url' => 'Url',
        ];
    }

    /**
     * Gets query for [[Album]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'albumId']);
    }
}
