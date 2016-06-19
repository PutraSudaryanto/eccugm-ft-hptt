<?php

class PageMainIntroduction extends CWidget
{
	public $id=null;

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
		
		if($this->id != null) {
			$model = OmmuPages::model()->findByPk($this->id);
			
		} else {		
			$criteria=new CDbCriteria;
			$criteria->condition = 't.publish = :publish';
			$criteria->params = array(
				':publish'=>1,
			);
			$criteria->order = 't.published_date DESC';
			$model = OmmuPages::model()->find($criteria);
		}

		$this->render('page_main_introduction',array(
			'model' => $model,
		));	
	}
}
