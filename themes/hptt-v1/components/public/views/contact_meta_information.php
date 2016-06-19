<h2>Kontak Kami</h2>
<div class="clearfix">
	<div class="sep">
		<?php $this->widget('ContactMainForm'); ?>
	</div>
	
	<div class="sep">
		<div class="box">
			<strong><?php echo $model->office_name;?></strong>
			<?php echo $model->office_place.', '.$model->office_village.', '.$model->office_district.', '.$model->view_meta->city.', '.$model->view_meta->province.', '.$model->view_meta->country.', '.$model->office_zipcode;?>
			<div class="pb-5"></div>
			<?php if($model->office_phone != '')?>
				Phone : <?php echo $model->office_phone;?><br/>
			<?php if($model->office_fax != '')?>
				Fax : <?php echo $model->office_fax;?><br/>
			<?php if($model->office_email != '')?>
				Email : <a href="mailto:<?php echo $model->office_email;?>" title="<?php echo $model->office_email;?>"><?php echo $model->office_email;?></a>			
		</div>
		<div class="box">
			<strong>Contact Person</strong>
			Dedi Atunggal SP., ST., M.Sc.<br/>
			HP : 0813 - 2574 - 4814<br/>
			Email : <a href="mailto:dediatunggal@ugm.ac.id" title="dediatunggal@ugm.ac.id">dediatunggal@ugm.ac.id</a>
			<div class="pb-5"></div>
			Noor Indha Lesmanawati<br/>
			HP : 0815 - 7808 - 2241<br/>
			Email : <a href="mailto:indha.lesmanawati@ugm.ac.id" title="indha.lesmanawati@ugm.ac.id">indha.lesmanawati@ugm.ac.id</a>
		</div>
		<?php if($SosMed != null) {?>
			<div class="box social-media">
				<strong>Sosial Media</strong>
				<?php foreach($SosMed as $key => $val) {
					if($val->cat->icons == '')
						$images = Yii::app()->request->baseUrl.'/public/support/default.png';
					else
						$images = Yii::app()->request->baseUrl.'/public/support/'.$val->cat->icons;
					if($val->cat_id == '10') {
						$url = 'ymsgr:sendim?'.$val->value;
						$target = '';
					} else {
						$url = $val->value;
						$target = 'target="_blank"';
					}
					echo '<a href="'.$url.'" title="'.Phrase::trans($val->cat->name, 2).'" '.$target.'><img src="'.$images.'" alt="'.Phrase::trans($val->cat->name, 2).'"></a>';
				}?>
			</div>
		<?php }?>
	</div>
</div>