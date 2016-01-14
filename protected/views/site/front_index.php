<?php
/**
 * @var $this SiteController
 * @var $dataProvider CActiveDataProvider
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2012 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Core
 * @contact (+62)856-299-4114
 *
 */
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');
?>

<div id="home" class="content">
	<div class="cell">
	<div class="container">
		<div class="">
			<a href="<?php echo Yii::app()->createUrl('site/index');?>" title="Hari Pendidikan Tinggi Teknik (HPTT) 70 UGM">
				<img src="<?php echo Yii::app()->request->baseUrl;?>/public/main/logo_hptt.png" alt="Hari Pendidikan Tinggi Teknik (HPTT) 70 UGM" />
			</a>
		</div>
		<?php $this->widget('BannerMain', array(
			'id'=>1,
		)); ?>
	</div>
	</div>
</div>

<div id="intro" class="content">
	<div class="cell">
	<div class="container">
		<?php $this->widget('PageMainIntroduction', array(
			'id'=>6,
		)); ?>
	</div>
	</div>
</div>

<div id="event" class="content">
	<div class="cell">
	<div class="container">
		<div class="sep">
			<a href="javascript:void(0);" title="">
				<span><span>
					1. Pekan Olahraga Teknik (PORTEK)
					<strong>Mulai 18 Januari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					2. Pembukaan Rangkaian Kegiatan HPTT ke-70
					<strong>Fakultas Teknik UGM, 24 Januari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					3. Lomba Kebersihan dan Keindahan Lingkungan
					<strong>Mulai 1 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					4. Ziarah ke Makam Karyawan dan Dosen FT UGM
					<strong>9 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					5. Anjang Kasih dengan Purnakarya FT UGM
					<strong>4 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					6. Seminar Energi: Utilisasi Gas untuk Kepentingan Nasional
					<strong>11 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					7. Gowes Teknik: Borobudur - Jogja
					<strong>12 - 13 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					8. Ketoprak Humor
					<strong>13 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					9. Sarasehan Warga Kampus
					<strong>5 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					10. Pemberian Penghargaan Purnakarya dan Kesetiaan 25 Tahun
					<strong>15 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					11. Pidato Dies (Puncak Peringatan 70 Tahun HPTT)
					<strong>Fakultas Teknik UGM, 16 Februari 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					12. Seminar Revolusi Mental
					<strong>April 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					13. Independent & Innovation Day
					<strong>April 2016</strong>
				</span></span>
			</a>
			<a href="javascript:void(0);" title="">
				<span><span>
					14. International Annual Engineering Seminar (InAES 2016)
					<strong>April 2016</strong>
				</span></span>
			</a>
		</div>
	</div>
	</div>
</div>

<div id="news" class="content">
	<div class="cell">
	<div class="container">
		<?php $this->widget('ArticleMainNewsRecent', array(
			'category'=>1,
			'hastag'=>'hptt70',
		)); ?>
	</div>
	</div>
</div>

<div id="gallery" class="content">
	<div class="cell">
	<div class="container">
		<?php $this->widget('AlbumMainRecents', array(
			'hastag'=>'hptt70',
		)); ?>
	</div>
	</div>
</div>

<div id="contact" class="content">
	<div class="cell">
	<div class="container">
		<?php $this->widget('ContactMetaInformation'); ?>
	</div>
	</div>
</div>