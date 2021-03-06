
<div class="actions">
<?php if(Yii::app()->user->checkAccess('op_create_forum')): ?>
	<?php echo CHtml::link('New forum', array('create')); ?> |
	<?php echo CHtml::link('Manage forum',array('admin')); ?>
<?php endif; ?>
</div>

<table border="0" cellspacing="0" cellpadding="0" class="wide forums">
<?php foreach($forums as $forum): ?>
	<tr>
		<td class="vat c1">
    		<img alt="Comment" class="icon grey" src="<?php echo Yii::app()->request->baseUrl; ?>/images/comment.gif" title="No recent activity" />
      	</td>
		<td class="c2 vat">
			<?php echo CHtml::link($forum->name, array('view', 'id' => $forum->id), array('class' => 'title')); ?>
      		<div class="posts">				
        		<?php echo CHtml::encode($forum->topics_count); ?> <?php echo Yii::t('messages', '1#topic|n>1#topics', array($forum->topics_count)); ?>, 
        		<?php echo CHtml::encode($forum->posts_count); ?> <?php echo Yii::t('messages', '1#post|n>1#posts', array($forum->posts_count)); ?>
      		</div>
      		<p class="desc">
      			<?php echo CHtml::encode($forum->description); ?>
      		</p>
		</td>
		<td class="lp">	
			<?php if($forum->last_post): ?>
			<?php echo Yii::t('messages', 'Latest post') ?> <?php echo CHtml::link(Yii::app()->dateFormatter->formatDateTime($forum->last_post->created_at, 'medium', 'short'), array('topic/view', 'id' => $forum->last_post->topic->id)) ?> 
			<br /><?php echo Yii::t('messages', 'by'); ?> <?php echo CHtml::link($forum->last_post->author->name, array('user/view', 'id' => $forum->last_post->author->id)) ?>
			<?php endif; ?>
		</td>
		<td class="c3">
		</td>
	</tr>

<?php endforeach; ?>

</table>

<br/>

<?php $this->widget('CLinkPager', array('pages'=>$pages)); ?>