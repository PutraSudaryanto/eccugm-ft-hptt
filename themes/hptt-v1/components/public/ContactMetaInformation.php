<?php
/**
 * ContactMetaInformation
 * 
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2015 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Core
 * @contect (+62)856-299-4114
 *
 */
class ContactMetaInformation extends CWidget
{

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		$module = strtolower(Yii::app()->controller->module->id);
		$controller = strtolower(Yii::app()->controller->id);
		$action = strtolower(Yii::app()->controller->action->id);
		$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
		$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		
		//import model
		Yii::import('application.modules.support.models.SupportContactCategory');
		Yii::import('application.modules.support.models.SupportContacts');
		
		$model = OmmuMeta::model()->findByPk(1);

		$criteriaSosMed=new CDbCriteria;
		$criteriaSosMed->condition = 't.publish = :publish';
		$criteriaSosMed->params = array(
			':publish'=>1,
		);
		$criteriaSosMed->order = 't.id DESC';
		$criteriaSosMed->group = 't.cat_id';
		$SosMed = SupportContacts::model()->findAll($criteriaSosMed);

		$this->render('contact_meta_information',array(
			'module'=>$module,
			'controller'=>$controller,
			'action'=>$action,
			'currentAction'=>$currentAction,
			'currentModule'=>$currentModule,
			'currentModuleAction'=>$currentModuleAction,
			'model' => $model,
			'SosMed' => $SosMed,
		));	
	}
}
