<?php

/**
 * This is the model class for table "{{authors}}".
 *
 * The followings are the available columns in table '{{authors}}':
 * @property integer $id
 * @property string $name
 * @property integer $time_updated
 * @property integer $time_created
 *
 * The followings are the available model relations:
 * @property Book2author[] $book2authors
 */
class Author extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{authors}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 500),
            array('id, name, time_updated, time_created', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'book2authors' => array(self::HAS_MANY, 'Book2author', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Имя',
            'time_updated' => 'Дата изменения',
            'time_created' => 'Дата создания',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('time_updated', $this->time_updated);
        $criteria->compare('time_created', $this->time_created);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @return CArrayDataProvider
     */
    public function getAuthorsWithReaders()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('id IN
        (SELECT a.id FROM {{authors}} a
        WHERE (SELECT COUNT(br.id) FROM {{books}} b
        JOIN {{book2author}} ba ON ba.book_id = b.id
        JOIN {{book2reader}} br ON b.id = br.book_id
                      WHERE ba.author_id = a.id
        ) >= 3)');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Author the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return bool
     */
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->time_created = time();
            }
            $this->time_updated = time();
            return true;
        }
        return false;
    }
}
