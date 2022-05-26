<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $id
 * @property int $userId
 * @property string $title
 *
 * @property Photo[] $photos
 * @property User $user
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'title'], 'required'],
            [['userId'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Photos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['albumId' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    public function extraFields() {
        $fields = parent::fields();

        $fields['photos'] = function (Album $model)
        {
            return $model->photos;
        };

        return $fields;
    }
}
