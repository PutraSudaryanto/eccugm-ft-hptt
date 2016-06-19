<h2>Galeri</h2>
<div class="clearfix">
	<?php if($model != null) {
		$i = 0;
		//for($i=1;$i<=4;$i++) {
		foreach($model as $key => $val) {
			$i++;
			if($val->media_id != 0)
				$images = Yii::app()->request->baseUrl.'/public/album/'.$val->album_id.'/'.$val->cover->media;
			else					
				$images = Yii::app()->request->baseUrl.'/public/album/album_default.png';?>
			<div class="sep">
				<a class="photo" href="<?php echo Yii::app()->createUrl('album/site/view', array('id'=>$val->album_id, 't'=>Utility::getUrlTitle($val->title)))?>" title="<?php echo $val->title?>"><img src="<?php echo Utility::getTimThumb($images, 300, 180, 1)?>" alt="<?php echo $val->title?>" /></a>
				<a class="title" href="<?php echo Yii::app()->createUrl('album/site/view', array('id'=>$val->album_id, 't'=>Utility::getUrlTitle($val->title)))?>" title="<?php echo $val->title?>"><?php echo $val->title?></a>
			</div>
		<?php //if($i == 2)
			//echo '<div class="clear"></div>';
		}
		//}
	}?>
</div>