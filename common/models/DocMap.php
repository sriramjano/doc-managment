<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doc_map".
 *
 * @property int $id
 * @property int $cus_id
 * @property int $doc_id
 *
 * @property Customer $cus
 * @property Document $doc
 */
class DocMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doc_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cus_id', 'doc_id'], 'required'],
            [['cus_id', 'doc_id'], 'string', 'max' => 60],
            [['cus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['cus_id' => 'uuid']],
            [['doc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['doc_id' => 'uuid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cus_id' => Yii::t('app', 'Cus ID'),
            'doc_id' => Yii::t('app', 'Doc ID'),
        ];
    }

    /**
     * Gets query for [[Cus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCus()
    {
        return $this->hasOne(Customer::className(), ['uuid' => 'cus_id']);
    }

    /**
     * Gets query for [[Doc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoc()
    {
        return $this->hasOne(Document::className(), ['uuid' => 'doc_id']);
    }
}
