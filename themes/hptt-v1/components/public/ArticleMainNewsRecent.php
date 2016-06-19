<?php

class ArticleMainNewsRecent extends CWidget
{
	public $category=null;
	public $hastag=null;

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
		
		//import model
		Yii::import('application.modules.article.models.ArticleCategory');
		Yii::import('application.modules.article.models.ArticleMedia');
		Yii::import('application.modules.article.models.Articles');
		Yii::import('application.modules.article.models.ArticleTag');
		
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
			$criteria->condition = 't.publish = :publish AND t.published_date <= curdate() AND b.body = :body';
			$criteria->params = array(
				':publish'=>1,
				':body'=>$this->hastag,
			);
		} else {
			$criteria->condition = 'publish = :publish AND published_date <= curdate()';
			$criteria->params = array(
				':publish'=>1,
			);
		}
		$criteria->order = 't.published_date DESC';
		if($this->category != null)
			$criteria->compare('cat_id',$this->category);
		$criteria->limit = 3;
			
		$model = Articles::model()->findAll($criteria);

		$this->render('article_main_news_recent',array(
			'model' => $model,
		));	
	}
}
