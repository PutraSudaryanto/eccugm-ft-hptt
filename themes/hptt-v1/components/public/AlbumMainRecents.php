<?php

class AlbumMainRecents extends CWidget
{
	public $hastag=null;

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		$controller = strtolower(Yii::app()->controller->id);
		
		//import model
		Yii::import('application.modules.album.models.AlbumPhoto');
		Yii::import('application.modules.album.models.Albums');
		Yii::import('application.modules.album.models.AlbumTag');
		
		$criteria=new CDbCriteria;
		if($this->hastag != null) {
			$criteria->with = array(
				'tag_ONE' => array(
					'alias'=>'a',
					//'select'=>'displayname'
				),
				'tag_ONE.tag_TO' => array(
					'alias'=>'b',
					//'select'=>'displayname'
				),
			);
			$criteria->condition = 't.publish = :publish AND b.body = :body';
			$criteria->params = array(
				':publish'=>1,
				':body'=>$this->hastag,
			);
		} else {
			$criteria->condition = 't.ublish = :publish';
			$criteria->params = array(
				':publish'=>1,
			);
		}
		$criteria->order = 't.creation_date DESC';
		$criteria->limit = 6;
			
		$model = Albums::model()->findAll($criteria);

		$this->render('album_main_recents',array(
			'model' => $model,
		));	
	}
}
