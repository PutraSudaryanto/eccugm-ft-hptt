<?php
	if($model->media != '')
		$images = Yii::app()->request->baseUrl.'/public/page/'.$model->media;
	else
		$images = Yii::app()->request->baseUrl.'/public/page/page_default.png';
		
?>
<div class="clearfix">
	<div class="sep">
		<img src="<?php echo Utility::getTimThumb($images, 300, 300, 1);?>" alt="<?php echo Phrase::trans($model->name, 2);?>">
		<?php echo Phrase::trans($model->quote, 2);?>
	</div>
	<div class="sep"><?php echo Phrase::trans($model->name, 2) != Utility::hardDecode(Phrase::trans($model->desc, 2)) ? Utility::cleanImageContent(Phrase::trans($model->desc, 2)) : '';?></div>
</div>