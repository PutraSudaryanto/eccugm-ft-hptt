<?php
/**
 * Articles (articles)
 * @var $this SiteController
 * @var $model Articles
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Articles'=>array('manage'),
		Phrase::trans($model->cat->name,2),
		$model->title,
	);
	
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/externals/article/plugin/jquery.jcarousellite.min.js', CClientScript::POS_END);
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
		$images = Yii::app()->request->baseUrl.'/public/article/'.$model->article_id.'/'.$model->cover->media;
	else {
		$mediaPhoto = ArticleMedia::model()->findByPk($_GET['photo']);
		$images = Yii::app()->request->baseUrl.'/public/article/'.$mediaPhoto->article_id.'/'.$mediaPhoto->media;
	}
?>

<div class="meta">
	<i class="fa fa-calendar-check-o"></i><?php echo Utility::dateFormat($model->published_date);?>
	<i class="fa fa-bookmark-o"></i><?php echo $model->user->displayname;?>
	<?php if($model->media_file != '') {?><i class="fa fa-download"></i><?php echo $model->download?><?php }?>
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
						$images = Yii::app()->request->baseUrl.'/public/article/'.$row->article_id.'/'.$row->media;
					?>
					<li <?php echo (!isset($_GET['photo']) && $row->cover == 1) ? 'class="active"' : ((isset($_GET['photo']) && $row->media_id == $_GET['photo']) ? 'class="active"' : '');?>><a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$row->article_id,'t'=>Utility::getUrlTitle($row->article->title.' Photo #'.$i),'photo'=>$row->media_id));?>" title="<?php echo $row->article->title;?> Photo #<?php echo $i;?>" title=""><img src="<?php echo Utility::getTimThumb($images, 120, 70, 1);?>" alt="<?php echo $row->article->title;?> Photo #<?php echo $i;?>"></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
	<?php }
}?>

<?php echo $model->body;?>

<?php if($model->media_file != '') {
	$extension = pathinfo($model->media_file, PATHINFO_EXTENSION);
	if($extension == 'pdf')
		$file = 'fa-file-pdf-o';
	else if(in_array($extension, array('doc','docx','opt')))
		$file = 'fa-file-word-o';
	else if(in_array($extension, array('xls','xlsx')))
		$file = 'fa-file-excel-o';
	else if(in_array($extension, array('ppt','pptx')))
		$file = 'fa-file-powerpoint-o';
	else if(in_array($extension, array('jpg','jpeg','gif','png','bmp')))
		$file = 'fa-file-photo-o';
	else if(in_array($extension, array('zip','rar','7z')))
		$file = 'fa-file-zip-o';
	else if(in_array($extension, array('mp3')))
		$file = 'fa-file-audio-o';
	else if(in_array($extension, array('mp4','flv')))
		$file = 'fa-file-movie-o';
	else
		$file = 'fa-file-pdf-o';
?>
	<div class="download">
		Download:&nbsp;<i class="fa <?php echo $file;?>"></i> <a href="<?php echo Yii::app()->controller->createUrl('download', array('id'=>$model->article_id,'t'=>Utility::getUrlTitle($model->title)));?>" title="<?php echo $model->title;?>"><?php echo $model->media_file;?></a>
	</div>
<?php }?>

<?php if($random != null) {?>
<div class="related">
	<h3>Artikel Terkait</h3>
	<div class="clearfix">
		<?php foreach($random as $key => $row) {
			if($row->media_id != 0)
				$images = Yii::app()->request->baseUrl.'/public/article/'.$row->article_id.'/'.$row->cover->media;
			else
				$images = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
			<div class="box">
				<a class="photo" href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$row->article_id,'t'=>Utility::getUrlTitle($row->title)));?>" title="<?php echo $row->title;?>"><img src="<?php echo Utility::getTimThumb($images, 200, 150, 3);?>" alt="<?php echo $row->title;?>" /></a>
				<div class="span">
					<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$row->article_id,'t'=>Utility::getUrlTitle($row->title)));?>" title="<?php echo $row->title;?>"><?php echo Utility::hardDecode($row->title);?></a>
					<div class="meta-date">
						<i class="fa fa-calendar-check-o"></i><?php echo Utility::dateFormat($row->published_date);?>
						<i class="fa fa-bookmark-o"></i><?php echo $row->user->displayname;?>
						<i class="fa fa-eye"></i><?php echo $row->view;?>
					</div>
					<p><?php echo Utility::shortText(Utility::hardDecode($row->body),100);?></p>
				</div>
			</div>
		<?php }?>
	</div>
</div>
<?php }?>