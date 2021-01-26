<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int $uuid
 * @property string $lastname
 * @property string $firstname
 * @property int $mobile
 * @property string $email
 *
 * @property DocMap[] $docMaps
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'mobile', 'email'], 'required'],
            [['id', 'mobile'], 'integer'],
            [['lastname', 'firstname', 'email'], 'string', 'max' => 120],
            [['uuid'], 'string', 'max' => 60],
            [['uuid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lastname' => Yii::t('app', 'Lastname'),
            'firstname' => Yii::t('app', 'Firstname'),
            'mobile' => Yii::t('app', 'Mobile'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * Gets query for [[DocMaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocMaps()
    {
        return $this->hasMany(DocMap::className(), ['cus_id' => 'uuid']);
    }

    public function beforeSave($insert) {

        if ($this->isNewRecord) {
            $this->uuid = \Yii::$app->db->createCommand("CALL getUuid()") 
                         ->queryScalar();
        }

        return parent::beforeSave($insert);
    }
}
