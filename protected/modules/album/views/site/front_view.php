<?php
/**
 * Albums (albums)
 * @var $this SiteController * @var $model Albums *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Photo-Albums
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Albums'=>array('manage'),
		$model->title,
	);
	
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/externals/album/plugin/jquery.jcarousellite.min.js', CClientScript::POS_END);
	$js=<<<EOP
		$("#module .slider-box").jCarouselLite({
			btnNext: ".slider .next",
			btnPrev: ".slider .prev",
			speed: 800,
			visible: 4
		});
EOP;
	count($photo > 1) ? $cs->registerScript('jcarousellite', $js, CClientScript::POS_END) : '';
	
	if($model->media_id != 0 && !isset($_GET['photo']))
		$images = Yii::app()->request->baseUrl.'/public/album/'.$model->album_id.'/'.$model->cover->media;
	else {
		$mediaPhoto = AlbumPhoto::model()->findByPk($_GET['photo']);
		$images = Yii::app()->request->baseUrl.'/public/album/'.$mediaPhoto->album_id.'/'.$mediaPhoto->media;
	}
?>

<div class="meta">
	<i class="fa fa-calendar-check-o"></i><?php echo Utility::dateFormat($model->creation_date);?>
	<i class="fa fa-bookmark-o"></i><?php echo $model->user->displayname;?>
	<i class="fa fa-picture-o"></i><?php echo $model->photos?>
	<i class="fa fa-eye"></i><?php echo $model->view?>
</div>

<?php if($model->media_id != 0) {?>
	<img class="headline" src="<?php echo Utility::getTimThumb($images, 600, 1024, 3);?>" alt="<?php echo $model->title;?>" />
	<?php if(count($photo) > 1) {?>
		<div class="slider">
			<a class="prev" href="javascript:void(0);">prev</a>
			<a class="next" href="javascript:void(0);">next</a>
			<div class="slider-box">
				<ul>
					<?php 
					$i=0;
					foreach($photo as $key => $row) {
						$i++;
						$images = Yii::app()->request->baseUrl.'/public/album/'.$row->album_id.'/'.$row->media;
					?>
					<li <?php echo (!isset($_GET['photo']) && $row->cover == 1) ? 'class="active"' : ((isset($_GET['photo']) && $row->media_id == $_GET['photo']) ? 'class="active"' : '');?>><a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$row->album_id,'t'=>Utility::getUrlTitle($row->album->title.' Photo #'.$i),'photo'=>$row->media_id));?>" title="<?php echo $row->album->title;?> Photo #<?php echo $i;?>" title=""><img src="<?php echo Utility::getTimThumb($images, 120, 70, 1);?>" alt="<?php echo $row->album->title;?> Photo #<?php echo $i;?>"></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
	<?php }
}?>

<?php echo $model->body;?>

<?php if($random != null) {?>
<div class="related">
	<h3>Album Foto Lainya</h3>
	<div class="clearfix">
		<?php foreach($random as $key => $row) {
			if($row->media_id != 0)
				$images = Yii::app()->request->baseUrl.'/public/album/'.$row->album_id.'/'.$row->cover->media;
			else
				$images = Yii::app()->request->baseUrl.'/public/album/album_default.png';?>
			<div class="box">
				<a class="photo" href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$row->album_id,'t'=>Utility::getUrlTitle($row->title)));?>" title="<?php echo $row->title;?>"><img src="<?php echo Utility::getTimThumb($images, 200, 150, 3);?>" alt="<?php echo $row->title;?>" /></a>
				<div class="span">
					<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$row->album_id,'t'=>Utility::getUrlTitle($row->title)));?>" title="<?php echo $row->title;?>"><?php echo Utility::hardDecode($row->title);?></a>
					<div class="meta-date">
						<i class="fa fa-calendar-check-o"></i><?php echo Utility::dateFormat($row->creation_date);?>
						<i class="fa fa-bookmark-o"></i><?php echo $row->user->displayname;?>
						<i class="fa fa-picture-o"></i><?php echo $row->photos?>
						<i class="fa fa-eye"></i><?php echo $row->view;?>
					</div>
					<p><?php echo Utility::shortText(Utility::hardDecode($row->body),100);?></p>
				</div>
			</div>
		<?php }?>
	</div>
</div>
<?php }?>