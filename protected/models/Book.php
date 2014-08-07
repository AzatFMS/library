<?php

/**
 * This is the model class for table "{{books}}".
 *
 * The followings are the available columns in table '{{books}}':
 * @property integer $id
 * @property string $name
 * @property integer $time_updated
 * @property integer $time_created
 * @property string $readersString
 * @property string $authorsString
 *
 * The followings are the available model relations:
 * @property Reader[] $readers
 * @property Author[] $authors
 */
class Book extends CActiveRecord
{
    public $readers_data;
    public $authors_data;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{books}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('name', 'length', 'max' => 500),
            array('name', 'required'),
            array('id, name, time_updated, time_created', 'safe', 'on' => 'search'),
            array('readers_data, authors_data', 'type', 'type' => 'array', 'allowEmpty' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'readers' => array(self::MANY_MANY, 'Reader', '{{book2reader}}(book_id,reader_id)'),
            'authors' => array(self::MANY_MANY, 'Author', '{{book2author}}(book_id,author_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название',
            'readers' => 'Читатели',
            'authors' => 'Авторы',
            'time_updated' => 'Дата изменения',
            'time_created' => 'Дата создания',
            'readersString' => 'Читатели',
            'authorsString' => 'Авторы',
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
        // @todo Please modify the following code to remove attributes that should not be searched.

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
     * @return CActiveDataProvider
     */
    public function getBooksWithReadersAndAuthors()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('id IN
        (SELECT b.id FROM {{books}} b
        JOIN {{book2author}} ba ON b.id = ba.book_id
        JOIN {{book2reader}} br ON b.id = br.book_id
        GROUP BY (b.id)
        HAVING COUNT(ba.id) >= 3)');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @return CActiveDataProvider
     */
    public function getRandom()
    {
        $criteria = new CDbCriteria();

        $criteria->order = 'RAND()';
        $criteria->limit = 5;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Book the static model class
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

    public function afterSave()
    {
        parent::afterSave();
        $this->saveReaders();
        $this->saveAuthors();
    }

    public function afterFind()
    {
        parent::afterFind();
        if ($this->scenario == 'update') {
            $this->readers_data = CHtml::listData($this->readers, 'id', 'id');
            $this->authors_data = CHtml::listData($this->authors, 'id', 'id');
        }
    }

    protected function saveReaders()
    {
        if (!$this->isNewRecord) {
            Book2reader::model()->deleteAllByAttributes([
                'book_id' => $this->id,
            ]);
        }
        if ($this->readers_data) {
            foreach ($this->readers_data as $reader_id) {
                $book2reader = new Book2reader();
                $book2reader->setAttributes([
                    'reader_id' => $reader_id,
                    'book_id' => $this->id,
                ]);
                $book2reader->save();
            }
        }
    }

    protected function saveAuthors()
    {
        if (!$this->isNewRecord) {
            Book2author::model()->deleteAllByAttributes([
                'book_id' => $this->id,
            ]);
        }
        if ($this->authors_data) {
            foreach ($this->authors_data as $author_id) {
                $book2author = new Book2author();
                $book2author->setAttributes([
                    'author_id' => $author_id,
                    'book_id' => $this->id,
                ]);
                $book2author->save();
            }
        }
    }

    /**
     * @param string $separator
     * @return string
     */
    public function getReadersString($separator = ', ')
    {
        return implode($separator, CHtml::listData($this->readers, 'id', 'name'));
    }

    /**
     * @param string $separator
     * @return string
     */
    public function getAuthorsString($separator = ', ')
    {
        return implode($separator, CHtml::listData($this->authors, 'id', 'name'));
    }
}
