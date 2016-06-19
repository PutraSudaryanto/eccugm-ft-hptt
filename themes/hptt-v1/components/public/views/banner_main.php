<?php if($model != null) {
	$extension = pathinfo($model->media, PATHINFO_EXTENSION);
	if(in_array($extension, array('bmp','gif','jpg','png')))
		$images = Yii::app()->request->baseUrl.'/public/banner/'.$model->media; ?>
<div class="banner">
	<?php if($val->url != '-') {?>
		<a href="<?php echo Yii::app()->createUrl('banner/site/click', array('id'=>$model->banner_id, 't'=>Utility::getUrlTitle($model->title)))?>" title="<?php echo $model->title?>"><img src="<?php echo $images;?>" alt="<?php echo $model->title?>" /></a>
	<?php } else {?>
		<img src="<?php echo $images;?>" alt="<?php echo $model->title?>" />
	<?php }?>
</div>
<?php }?>