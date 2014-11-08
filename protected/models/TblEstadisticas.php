<?php

/**
 * This is the model class for table "tbl_Estadisticas".
 *
 * The followings are the available columns in table 'tbl_Estadisticas':
 * @property integer $IdEstadistica
 * @property integer $IdDependencia
 * @property string $Fecha
 * @property string $Hora
 */
class TblEstadisticas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_Estadisticas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdDependencia, Fecha, Hora', 'required'),
			array('IdDependencia', 'numerical', 'integerOnly'=>true),
			array('Fecha, Hora', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdEstadistica, IdDependencia, Fecha, Hora', 'safe', 'on'=>'search'),
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
			'IdEstadistica' => 'Id Estadistica',
			'IdDependencia' => 'Id Dependencia',
			'Fecha' => 'Fecha',
			'Hora' => 'Hora',
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

		$criteria->compare('IdEstadistica',$this->IdEstadistica);
		$criteria->compare('IdDependencia',$this->IdDependencia);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Hora',$this->Hora,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblEstadisticas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
