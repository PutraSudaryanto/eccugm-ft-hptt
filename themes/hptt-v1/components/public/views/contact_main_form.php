<div class="sep-form" name="post-on">
<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'support-contacts-form',
	'enableAjaxValidation'=>true,
	'action'=>Yii::app()->createUrl('support/contact/feedback'),
	'htmlOptions' => array(
		'class' => 'form',
		'enctype' => 'multipart/form-data',
	),
)); ?>
	<fieldset>
		<?php if(!Yii::app()->user->isGuest && $user != null) {
			$model->user_id = $user->user_id;
			$model->email = $user->email;
			$model->displayname = $user->displayname;
			echo $form->hiddenField($model,'email');
			echo $form->hiddenField($model,'displayname');
		} else {
			$model->user_id = 0;
		}
		echo $form->hiddenField($model,'user_id');
		?>
		
		<?php if(Yii::app()->user->isGuest) {?>	
			<div class="clearfix">
				<?php echo $form->textField($model,'displayname',array('maxlength'=>32, 'class'=>'span-6', 'placeholder'=>$model->getAttributeLabel('displayname'))); ?>
				<?php echo $form->error($model,'displayname'); ?>
			</div>
			
			<div class="clearfix">
				<?php echo $form->textField($model,'email',array('maxlength'=>32, 'class'=>'span-6', 'placeholder'=>$model->getAttributeLabel('email'))); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		<?php } else {
			if($user->photo_id == 0) {
				$images = Utility::getTimThumb(Yii::app()->request->baseUrl.'/public/users/default.png', 60, 60, 1);
			} else {
				$images = Utility::getTimThumb(Yii::app()->request->baseUrl.'/public/users/'.$user->user_id.'/'.$user->photo->photo, 60, 60, 1);
			}?>
			<div class="user-info clearfix">
				<div>
					<img src="<?php echo $images;?>" alt="<?php echo $user->photo_id != 0 ? $user->displayname: 'Ommu Platform';?>"/>
				</div>
				<div>
					<h3><?php echo $user->displayname;?></h3>
					<?php echo $user->email;?>
				</div>
			</div>
		<?php }?>
		
		<div class="clearfix">
			<?php echo $form->textField($model,'subject',array('maxlength'=>64, 'class'=>'span-6', 'placeholder'=>$model->getAttributeLabel('subject'))); ?>
			<?php echo $form->error($model,'subject'); ?>
		</div>

		<div class="clearfix">
			<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'span-9 medium', 'placeholder'=>$model->getAttributeLabel('message'))); ?>
			<?php echo $form->error($model,'message'); ?>
		</div>

		<div class="submit clearfix">
			<?php echo CHtml::submitButton($model->isNewRecord ? Phrase::trans(328,0) : Phrase::trans(328,0), array('onclick' => 'setEnableSave()')); ?>
		</div>

	</fieldset>
<?php $this->endWidget(); ?>
</div>