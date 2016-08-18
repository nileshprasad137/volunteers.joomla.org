<?php
/**
 * @package    Joomla! Volunteers
 * @copyright  Copyright (C) 2016 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
?>
<?php if ($this->item->new): ?>
	<div class="alert alert-success">
		<h1>
			<?php echo JText::_('COM_VOLUNTEERS_PROFILE_NEW_COMPLETED') ?>
		</h1>

		<p class="lead">
			<?php echo JText::_('COM_VOLUNTEERS_WELCOME') ?>
		</p>
	</div>
<?php endif; ?>

<div class="row-fluid profile">
	<div class="span3 volunteer-image">
		<?php echo VolunteersHelper::image($this->item->image, 'large'); ?>
	</div>
	<div class="span9">
		<div class="filter-bar">
			<?php if (($this->user->id == $this->item->user_id) && $this->item->user_id): ?>
				<a class="btn pull-right" href="<?php echo JRoute::_('index.php?option=com_volunteers&task=volunteer.edit&id=' . $this->item->id) ?>">
					<span class="icon-edit"></span> <?php echo JText::_('COM_VOLUNTEERS_TITLE_VOLUNTEERS_EDIT_MY') ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="page-header">
			<h1><?php echo $this->item->firstname . ' ' . $this->item->lastname ?></h1>
		</div>
		<?php if ($this->item->city || $this->item->country): ?>
			<p class="muted">
				<span class="icon-location"></span> <?php echo VolunteersHelper::location($this->item->city, $this->item->country); ?>
			</p>
		<?php endif; ?>
		<p class="lead"><?php echo($this->item->intro) ?></p>
	</div>
</div>

<br>

<div class="row-fluid">
	<div class="span12">

		<ul class="nav nav-tabs">
			<?php if ($this->item->teams->active): ?>
				<li class="active">
					<a href="#teams" data-toggle="tab"><?php echo JText::_('COM_VOLUNTEERS_TAB_TEAMSINVOLVED') ?></a>
				</li>
			<?php endif; ?>
			<?php if ($this->item->teams->honorroll): ?>
				<li><a href="#honorroll" data-toggle="tab"><?php echo JText::_('COM_VOLUNTEERS_TAB_HONORROLL') ?></a>
				</li>
			<?php endif; ?>
			<?php if ($this->item->joomlastory): ?>
				<li>
					<a href="#joomlastory" data-toggle="tab"><?php echo JText::_('COM_VOLUNTEERS_TAB_JOOMLASTORY') ?></a>
				</li>
			<?php endif; ?>
			<li><a href="#contact" data-toggle="tab"><?php echo JText::_('COM_VOLUNTEERS_TAB_CONTACT') ?></a></li>
		</ul>

		<div class="tab-content">
			<?php if ($this->item->teams->active): ?>
				<div class="tab-pane fade in active" id="teams">
					<table class="table table-striped table-hover table-vertical-align">
						<thead>
						<th width="30%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_TEAM') ?></th>
						<th width="20%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_POSITION') ?></th>
						<th><?php echo JText::_('COM_VOLUNTEERS_FIELD_ROLE') ?></th>
						<th width="12%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_DATE_STARTED') ?></th>
						</thead>
						<tbody>
						<?php foreach ($this->item->teams->active as $team): ?>
							<tr>
								<td>
									<?php if ($team->team): ?>
										<a href="<?php echo JRoute::_('index.php?option=com_volunteers&view=team&id=' . $team->team) ?>">
											<?php echo($team->team_title) ?>
										</a>
									<?php else: ?>
										<a href="<?php echo JRoute::_('index.php?option=com_volunteers&view=department&id=' . $team->department) ?>">
											<?php echo($team->department_title) ?>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php echo($team->position_title) ?>
								</td>
								<td>
									<?php echo($team->role_title) ?>
								</td>
								<td>
									<?php echo VolunteersHelper::date($team->date_started, 'M Y'); ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endif; ?>

			<?php if ($this->item->teams->honorroll): ?>
				<div class="tab-pane fade" id="honorroll">
					<table class="table table-striped table-hover table-vertical-align">
						<thead>
						<th width="30%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_TEAM') ?></th>
						<th width="20%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_POSITION') ?></th>
						<th><?php echo JText::_('COM_VOLUNTEERS_FIELD_ROLE') ?></th>
						<th width="12%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_DATE_STARTED') ?></th>
						<th width="12%"><?php echo JText::_('COM_VOLUNTEERS_FIELD_DATE_ENDED') ?></th>
						</thead>
						<tbody>
						<?php foreach ($this->item->teams->honorroll as $team): ?>
							<tr>
								<td>
									<?php if ($team->team): ?>
										<a href="<?php echo JRoute::_('index.php?option=com_volunteers&view=team&id=' . $team->team) ?>">
											<?php echo($team->team_title) ?>
										</a>
									<?php else: ?>
										<a href="<?php echo JRoute::_('index.php?option=com_volunteers&view=department&id=' . $team->department) ?>">
											<?php echo($team->department_title) ?>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php echo($team->position_title) ?>
								</td>
								<td>
									<?php echo($team->role_title) ?>
								</td>
								<td>
									<?php echo VolunteersHelper::date($team->date_started, 'M Y'); ?>
								</td>
								<td>
									<?php echo VolunteersHelper::date($team->date_ended, 'M Y'); ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endif; ?>

			<?php if ($this->item->joomlastory): ?>
				<div class="tab-pane fade" id="joomlastory">
					<?php echo(nl2br($this->item->joomlastory)) ?>
				</div>
			<?php endif; ?>

			<div class="tab-pane fade" id="contact">
				<?php if ($this->user->guest) : ?>
					<p class="alert alert-info">
						<?php echo JText::_('COM_VOLUNTEERS_NOTE_LOGIN_CONTACT_VOLUNTEER') ?>
					</p>
				<?php else : ?>
					<div class="row-fluid">
						<div class="span8">
							<form class="form form-horizontal" name="sendmail" action="<?php echo JRoute::_('index.php?option=com_volunteers&task=volunteer.sendmail') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="volunteer" value="<?php echo $this->item->id ?>"/>

								<div class="control-group">
									<label class="control-label span2" for="to_name"><?php echo JText::_('COM_VOLUNTEERS_MESSAGE_TO') ?></label>
									<div class="controls span10">
										<input type="text" name="to_name" id="to_name" value="<?php echo $this->item->firstname ?> <?php echo $this->item->lastname ?>" class="input-block-level" disabled="disabled"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label span2" for="from_name"><?php echo JText::_('COM_VOLUNTEERS_MESSAGE_FROM') ?></label>
									<div class="controls span10">
										<input type="text" name="from_name" id="from_name" value="<?php echo($this->user->name); ?> <<?php echo($this->user->email); ?>>" class="input-block-level" disabled="disabled"/>
									</div>
								</div>
								<div class="control-group">
									<div class="controls span12">
										<input type="text" name="subject" id="subject" class="input-block-level" placeholder="<?php echo JText::_('COM_VOLUNTEERS_MESSAGE_SUBJECT') ?>" required/>
									</div>
								</div>
								<div class="control-group">
									<textarea rows="10" name="message" id="message" class="input-block-level" placeholder="<?php echo JText::sprintf('COM_VOLUNTEERS_MESSAGE_BODY', $this->item->firstname . ' ' . $this->item->lastname) ?>" required></textarea>
								</div>
								<div class="alert alert-info">
									<?php echo JText::sprintf('COM_VOLUNTEERS_MESSAGE_NOTICE', $this->item->firstname . ' ' . $this->item->lastname) ?>
								</div>
								<div class="control-group">
									<input type="submit" value="<?php echo JText::_('COM_VOLUNTEERS_MESSAGE_SUBMIT') ?>" name="submit" id="submitButton" class="btn btn-success pull-right"/>
								</div>
							</form>
						</div>
						<div class="span4 social">
							<?php if ($this->item->website): ?>
								<a class="btn btn-block" target="_blank" href="http://<?php echo($this->item->website) ?>">
									<span class="icon-link"></span> <?php echo($this->item->website) ?>
								</a>
							<?php endif; ?>
							<?php if ($this->item->twitter): ?>
								<a class="btn btn-block btn-twitter" target="_blank" href="http://twitter.com/<?php echo($this->item->twitter) ?>">
									<span class="icon-twitter"></span> <?php echo JText::_('COM_VOLUNTEERS_CONNECT_TWITTER') ?>
								</a>
							<?php endif; ?>
							<?php if ($this->item->facebook): ?>
								<a class="btn btn-block btn-facebook" target="_blank" href="http://facebook.com/<?php echo($this->item->facebook) ?>">
									<span class="icon-facebook"></span> <?php echo JText::_('COM_VOLUNTEERS_CONNECT_FACEBOOK') ?>
								</a>
							<?php endif; ?>
							<?php if ($this->item->googleplus): ?>
								<a class="btn btn-block btn-google-plus" target="_blank" href="http://plus.google.com/<?php echo($this->item->googleplus) ?>">
									<span class="icon-google-plus"></span> <?php echo JText::_('COM_VOLUNTEERS_CONNECT_GOOGLEPLUS') ?>
								</a>
							<?php endif; ?>
							<?php if ($this->item->linkedin): ?>
								<a class="btn btn-block btn-linkedin" target="_blank" href="http://www.linkedin.com/in/<?php echo($this->item->linkedin) ?>">
									<span class="icon-linkedin"></span> <?php echo JText::_('COM_VOLUNTEERS_CONNECT_LINKEDIN') ?>
								</a>
							<?php endif; ?>
							<?php if ($this->item->github): ?>
								<a class="btn btn-block btn-gtihub" target="_blank" href="http://github.com/<?php echo($this->item->github) ?>">
									<span class="icon-github"></span> <?php echo JText::_('COM_VOLUNTEERS_CONNECT_GITHUB') ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="share">
	<?php echo $this->share; ?>
</div>

<script type="text/javascript">
	// Javascript to enable link to tab
	var url = document.location.toString();
	if (url.match('#')) {
		jQuery('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
	}

	// With HTML5 history API, we can easily prevent scrolling!
	jQuery('.nav-tabs a').on('shown.bs.tab', function (e) {
		if (history.pushState) {
			history.pushState(null, null, e.target.hash);
		} else {
			window.location.hash = e.target.hash; //Polyfill for old browsers
		}
	});

	jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		var target = this.href.split('#');
		jQuery('.nav a').filter('[href="#' + target[1] + '"]').tab('show');
	});
</script>