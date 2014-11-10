<?php

/**
 * This is the model class for table "test_turnos_pedidos".
 *
 * The followings are the available columns in table 'test_turnos_pedidos':
 * @property string $NombreDependencia
 * @property string $Cod
 * @property integer $NumeroAviso
 * @property integer $Turno
 * @property string $Empresa
 */
class TestTurnosPedidos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_turnos_pedidos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreDependencia, Cod, NumeroAviso, Turno, Empresa', 'required'),
			array('NumeroAviso, Turno', 'numerical', 'integerOnly'=>true),
			array('NombreDependencia, Empresa', 'length', 'max'=>30),
			array('Cod', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NombreDependencia, Cod, NumeroAviso, Turno, Empresa', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NombreDependencia' => 'Nombre Dependencia',
			'Cod' => 'Cod',
			'NumeroAviso' => 'Numero Aviso',
			'Turno' => 'Turno',
			'Empresa' => 'Empresa',
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

		$criteria->compare('NombreDependencia',$this->NombreDependencia,true);
		$criteria->compare('Cod',$this->Cod,true);
		$criteria->compare('NumeroAviso',$this->NumeroAviso);
		$criteria->compare('Turno',$this->Turno);
		$criteria->compare('Empresa',$this->Empresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestTurnosPedidos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
