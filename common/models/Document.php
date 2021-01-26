<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property int $uuid
 * @property string $doc_type
 * @property string $description
 * @property resource $document
 *
 * @property DocMap[] $docMaps
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_type', 'description', 'document'], 'required'],
            [['uuid'], 'string', 'max' => 60],
            [['document'], 'file'],
            [['doc_type'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 255],
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
            'doc_type' => Yii::t('app', 'Doc Type'),
            'description' => Yii::t('app', 'Description'),
            'document' => Yii::t('app', 'Document'),
        ];
    }

    /**
     * Gets query for [[DocMaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocMaps()
    {
        return $this->hasMany(DocMap::className(), ['doc_id' => 'uuid']);
    }

    public function beforeSave($insert) {

        if ($this->isNewRecord) {
            $this->uuid = \Yii::$app->db->createCommand("CALL getUuid()") 
                         ->queryScalar();
        }


        return parent::beforeSave($insert);
    }
}
