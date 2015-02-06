<?php
use Cake\Utility\Inflector;

?>
<?php if ($thread->thread_open == true): ?>
	<?php if ($this->Acl->check(['controller' => 'threads', 'action' => 'reply', 'id' => $thread->id, 'slug' => Inflector::slug($thread->title, '-'), 'prefix' => 'forum'])): ?>
		<div class="panel threadComment">
			<div class="panel-heading">
				<h4>
					<i class="fa fa-pencil"></i> <?= __("Leave a Comment") ?>
				</h4>
			</div>
			<div class="panel-body">
				<?= $this->Form->create($postForm, [
					'url' => ['controller' => 'threads', 'action' => 'reply', 'id' => $thread->id, 'slug' => Inflector::slug($thread->title, '-')]
				]) ?>
					<div class="form-group">
						<?=
						$this->Form->input(
							'message', [
								'label' => false,
								'class' => 'form-control postBox',
								'id' => 'postBox'
							]
						) ?>
					</div>
					<div class="form-group">
						<?= $this->Form->label('forum_thread.thread_open', __('Lock the Thread with the response ?'), ['class' => 'control-label']) ?>
						<div class="radio-check">
							<?= $this->Form->radio('forum_thread.thread_open', [
									'0' => __('Yes'),
									'1' => __('No')
								],
								[
									'value' => '1',
									'legend' => false,
									'class' => 'form-control'
								]
							) ?>
						</div>
					</div>
					<div class="form-group">
						<?= $this->Form->submit(__('Post Comment'), ['class' => 'btn btn-primary']); ?>
					</div>
				<?= $this->Form->end(); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
