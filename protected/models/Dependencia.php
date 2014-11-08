<?php

/**
 * This is the model class for table "dependencia".
 *
 * The followings are the available columns in table 'dependencia':
 * @property integer $IdDependencia
 * @property integer $IdEmpresa
 * @property string $NombreDependencia
 * @property integer $NumeroTaquillas
 *
 * The followings are the available model relations:
 * @property Empresa $idEmpresa
 */
class Dependencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dependencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdEmpresa, NombreDependencia, NumeroTaquillas', 'required'),
			array('IdEmpresa, NumeroTaquillas', 'numerical', 'integerOnly'=>true),
			array('NombreDependencia', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdDependencia, IdEmpresa, NombreDependencia, NumeroTaquillas', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'IdEmpresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdDependencia' => 'Id Dependencia',
			'IdEmpresa' => 'Id Empresa',
			'NombreDependencia' => 'Nombre Dependencia',
			'NumeroTaquillas' => 'Numero Taquillas',
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

		$criteria=new CDbCriteria;

		$criteria->compare('IdDependencia',$this->IdDependencia);
		$criteria->compare('IdEmpresa',$this->IdEmpresa);
		$criteria->compare('NombreDependencia',$this->NombreDependencia,true);
		$criteria->compare('NumeroTaquillas',$this->NumeroTaquillas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dependencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
