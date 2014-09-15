<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $IdEmpresa
 * @property integer $IdCliente
 * @property string $NombreEmpresa
 *
 * The followings are the available model relations:
 * @property Dependencia[] $dependencias
 * @property Clientes $idCliente
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdCliente, NombreEmpresa', 'required'),
			array('IdCliente', 'numerical', 'integerOnly'=>true),
			array('NombreEmpresa', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdEmpresa, IdCliente, NombreEmpresa', 'safe', 'on'=>'search'),
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
			'dependencias' => array(self::HAS_MANY, 'Dependencia', 'IdEmpresa'),
			'idCliente' => array(self::BELONGS_TO, 'Clientes', 'IdCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdEmpresa' => 'Id Empresa',
			'IdCliente' => 'Id Cliente',
			'NombreEmpresa' => 'Nombre Empresa',
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

		$criteria->compare('IdEmpresa',$this->IdEmpresa);
		$criteria->compare('IdCliente',$this->IdCliente);
		$criteria->compare('NombreEmpresa',$this->NombreEmpresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
