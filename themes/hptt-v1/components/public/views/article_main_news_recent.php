<h2>Berita</h2>
<div class="clearfix">
	<?php if($model != null) {
		$i = 0;
		foreach($model as $key => $val) {
			$i++;
			if($val->media_id != 0)
				$images = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$val->cover->media;
			else
				$images = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
			<div class="sep">
				<?php /*<div class="number"><?php echo '.0'.$i;?></div>*/?>
				<a class="photo" href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" title="<?php echo $val->title?>"><img src="<?php echo Utility::getTimThumb($images, 300, 200, 1)?>" alt="<?php echo $val->title?>" /></a>
				<a class="title" href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" title="<?php echo $val->title?>"><?php echo $val->title?></a>
				<p><?php echo Utility::shortText(Utility::hardDecode($val->body),100);?></p>
			</div>
		<?php //if($i == 1)
			//echo '<div class="clear"></div>';
		}
	}?>
</div>