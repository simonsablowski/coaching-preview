<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="Content-Language" content="en"/>
		<title><?php echo $this->localize('Coaching Preview'); ?></title>
		<script type="text/javascript" src="js/jquery.1.6.2.js"></script>
		<script type="text/javascript" src="js/jquery.json-2.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.swfobject.1-1-1.min.js"></script>
		<script type="text/javascript" src="js/jquery.sprintf.js"></script>
		<script type="text/javascript" src="js/player.js"></script>
		<script type="text/javascript" src="js/generator.js"></script>
		<link type="text/css" href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<div style="display: none;">
			<div id="AddValue" class="invisible">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Value'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"values":["%s"]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="BulletPoints">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Element'); ?>

							</th>
							<th>
								<?php echo $this->localize('Second'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"elements":[{"element":"%s","second":%d}]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="Buy" class="invisible">
				<table class="options">
					<tbody class="list">
						<tr class="list-item" rel='{"key":"%s"}'>
							<td>
								<?php echo $this->localize('Key'); ?>

							</td>
							<td>
								<input type="text" value=""/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="Coaching" class="invisible">
				<table class="options">
					<tbody class="list">
						<tr class="list-item" rel='{"key":"%s"}'>
							<td>
								<?php echo $this->localize('Key'); ?>

							</td>
							<td>
								<input type="text" value=""/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="Checkboxes">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Item'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"items":["%s"]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="DieterCategory">
				<p>
					<?php echo $this->localize('No further configuration necessary.'); ?>

				</p>
			</div>
			<div id="DocumentDownload">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Name'); ?>

							</th>
							<th>
								<?php echo $this->localize('File'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"documents":[{"name":"%s","file":"%s"}]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="Dropdown">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Item'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"items":["%s"]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="EnergyDemand">
				<table class="options">
					<tbody class="list">
						<tr class="list-item" rel='{"weight":"#%s","height":"#%s"}'>
							<td>
								<?php echo $this->localize('Weight'); ?> <em><?php echo $this->localize('(reference)'); ?></em>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
						</tr>
						<tr class="list-item" rel='{"weight":"#%s","height":"#%s"}'>
							<td>
								<?php echo $this->localize('Height'); ?> <em><?php echo $this->localize('(reference)'); ?></em>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- TODO -->
			<div id="Evaluation">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Criterion'); ?>


							</th>
							<th>
								<?php echo $this->localize('Weight'); ?>


							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"weightedcriteria":[{"name":"%s","weightFactor":%d}],"type":"%s","steps":%d}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- end: TODO -->
			<div id="Group" class="invisible">
				<table class="options">
					<tbody class="list">
						<tr class="list-item" rel='{"count":%d}'>
							<td>
								<?php echo $this->localize('Count'); ?>

							</td>
							<td>
								<input type="text" value=""/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="ImageStack">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Element'); ?>

							</th>
							<th>
								<?php echo $this->localize('Second'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"elements":[{"element":"%s","second":%d}]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="Keywords">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Element'); ?>

							</th>
							<th>
								<?php echo $this->localize('Second'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"elements":[{"element":"%s","second":%d}]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="LinkGroup">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Name'); ?>

							</th>
							<th>
								<?php echo $this->localize('Link'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"links":[{"name":"%s","link":"%s"}]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="List">
				<table class="options">
					<tbody class="list">
						<tr class="list-item" rel='{"items":%d}'>
							<td>
								<?php echo $this->localize('Items'); ?>

							</td>
							<td>
								<input type="text" value=""/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- TODO -->
			<div id="ListView">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Element'); ?>

							</th>
							<th>
								<?php echo $this->localize('Second'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"elements":[{"element":"%s","second":%d}]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- end: TODO -->
			<div id="Options">
				<p>
					<?php echo $this->localize('No further configuration necessary.'); ?>

				</p>
			</div>
			<div id="Register" class="invisible">
				<p>
					<?php echo $this->localize('No further configuration necessary.'); ?>

				</p>
			</div>
			<div id="SetValue" class="invisible">
				<table class="options">
					<thead>
						<tr>
							<th>
								<?php echo $this->localize('Value'); ?>

							</th>
							<th>
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody class="list">
						<tr class="list-item" rel='{"values":["%s"]}'>
							<td>
								<input type="text" value=""/>
							</td>
							<td>
								<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="Text">
				<p>
					<?php echo $this->localize('No further configuration necessary.'); ?>

				</p>
			</div>
			<div id="TextArea">
				<p>
					<?php echo $this->localize('No further configuration necessary.'); ?>

				</p>
			</div>
			<div id="TextInput">
				<table class="options">
					<tbody class="list">
						<tr class="list-item" rel='{"type":"%s"}'>
							<td>
								<?php echo $this->localize('Type'); ?>

							</td>
							<td>
								<select>
									<option value="none"><?php echo $this->localize('Any'); ?></option>
									<option value="height"><?php echo $this->localize('Height (130-210)'); ?></option>
									<option value="weight"><?php echo $this->localize('Weight (30-180)'); ?></option>
									<option value="amount"><?php echo $this->localize('Amount (0-~)'); ?></option>
									<option value="date"><?php echo $this->localize('Date (DD.MM.YYYY)'); ?></option>
									<option value="age"><?php echo $this->localize('Age (3-100)'); ?></option>
									<option value="userage"><?php echo $this->localize('User Age (18-100)'); ?></option>
									<option value="email"><?php echo $this->localize('E-Mail Address (?@?.?)'); ?></option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="Video">
				<p>
					<?php echo $this->localize('No further configuration necessary.'); ?>

				</p>
			</div>
		</div>
		<div class="preview" style="display: none;">
			<div id="preview"></div>
			<a class="close" href="#" title="<?php echo $this->localize('Close'); ?>"><?php echo $this->localize('Close'); ?></a>
		</div>
		<h1>
			<?php echo $this->localize('Coaching Preview'); ?>

			<input type="button" class="test" disabled="disabled" value="<?php echo $this->localize('Preview'); ?>"/>
		</h1>
		<div id="column1" class="column">
			<fieldset>
				<!--<legend>
					<?php echo $this->localize('Configuration'); ?>

				</legend>-->
				<form>
					<dl>
						<dt>
							<?php echo $this->localize('Type'); ?>

						</dt>
						<dd>
							<select class="type">
								<option value=""></option>
								<optgroup label="<?php echo $this->localize('Visible types'); ?>">
									<option value="BulletPoints"><?php echo $this->localize('BulletPoints'); ?></option>
									<option value="Checkboxes"><?php echo $this->localize('Checkboxes'); ?></option>
									<option value="DieterCategory"><?php echo $this->localize('DieterCategory'); ?></option>
									<option value="DocumentDownload"><?php echo $this->localize('DocumentDownload'); ?></option>
									<option value="Dropdown"><?php echo $this->localize('Dropdown'); ?></option>
									<option value="EnergyDemand"><?php echo $this->localize('EnergyDemand'); ?></option>
									<option value="Evaluation"><?php echo $this->localize('Evaluation'); ?></option>
									<option value="ImageStack"><?php echo $this->localize('ImageStack'); ?></option>
									<option value="Keywords"><?php echo $this->localize('Keywords'); ?></option>
									<!--<option value="LinkGroup"><?php echo $this->localize('LinkGroup'); ?></option>-->
									<option value="List"><?php echo $this->localize('List'); ?></option>
									<option value="ListView"><?php echo $this->localize('ListView'); ?></option>
									<option value="Options"><?php echo $this->localize('Options'); ?></option>
									<option value="Text"><?php echo $this->localize('Text'); ?></option>
									<option value="TextArea"><?php echo $this->localize('TextArea'); ?></option>
									<option value="TextInput"><?php echo $this->localize('TextInput'); ?></option>
									<option value="Video"><?php echo $this->localize('Video'); ?></option>
								</optgroup>
								<optgroup label="<?php echo $this->localize('Invisible types'); ?>">
									<option value="AddValue"><?php echo $this->localize('AddValue'); ?></option>
									<option value="Buy"><?php echo $this->localize('Buy'); ?></option>
									<option value="Coaching"><?php echo $this->localize('Coaching'); ?></option>
									<option value="Group"><?php echo $this->localize('Group'); ?></option>
									<option value="Register"><?php echo $this->localize('Register'); ?></option>
									<option value="SetValue"><?php echo $this->localize('SetValue'); ?></option>
								</optgroup>
							</select>
						</dd>
						<dt>
							<?php echo $this->localize('Key'); ?>

							<input type="checkbox" class="enable" disabled="disabled"/>
						</dt>
						<dd style="display: none;">
							<input type="text" class="key" value=""/>
						</dd>
						<dt>
							<?php echo $this->localize('Title'); ?>

							<input type="checkbox" class="enable" disabled="disabled"/>
						</dt>
						<dd style="display: none;">
							<input type="text" class="title" value=""/>
						</dd>
						<dt>
							<?php echo $this->localize('Description'); ?>

							<input type="checkbox" class="enable" disabled="disabled"/>
						</dt>
						<dd style="display: none;">
							<textarea class="description"></textarea>
						</dd>
					</dl>
					<dl class="configuration separate">
						<dt>
							<?php echo $this->localize('Video'); ?>

							<input type="checkbox" class="enable for-visible" disabled="disabled"/>
						</dt>
						<dd style="display: none;">
							<table class="options">
								<tbody class="list">
									<tr class="list-item" rel='{"video":{"url":"%s"}}'>
										<td>
											<?php echo $this->localize('URL'); ?>

										</td>
										<td>
											<input type="text" value=""/>
										</td>
									</tr>
								</tbody>
							</table>
						</dd>
						<dt class="separate">
							<?php echo $this->localize('Events'); ?>

							<input type="checkbox" class="enable for-visible" disabled="disabled"/>
						</dt>
						<dd style="display: none;">
							<table class="options">
								<thead>
									<tr>
										<th>
											<?php echo $this->localize('Element'); ?>

										</th>
										<th>
											<?php echo $this->localize('Second'); ?>

										</th>
										<th>
											<?php echo $this->localize('URL'); ?>

										</th>
										<th>
											&nbsp;
										</th>
									</tr>
								</thead>
								<tbody class="list">
									<tr class="list-item" rel='{"events":[{"type":"%s","second":%d,"url":"%s"}]}'>
										<td>
											<select>
												<option value="slide"><?php echo $this->localize('Slide'); ?></option>
												<option value="hide"><?php echo $this->localize('Hide'); ?></option>
												<option value="show"><?php echo $this->localize('Show'); ?></option>
												<option value="clearslide"><?php echo $this->localize('Clear slide'); ?></option>
											</select>
										</td>
										<td>
											<input type="text" value=""/>
										</td>
										<td>
											<input type="text" value=""/>
										</td>
										<td>
											<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td>
											<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
										</td>
									</tr>
								</tfoot>
							</table>
						</dd>
						<dt class="separate">
							<?php echo $this->localize('Properties'); ?>

						</dt>
						<dd class="prototype">
							<?php echo $this->localize('Please select the object type.'); ?>

						</dd>
					</dl>
					<p>
						<input type="button" class="generate" disabled="disabled" value="<?php echo $this->localize('Generate'); ?>"/>
					</p>
				</form>
				<dl class="separate">
					<dt>
						<?php echo $this->localize('Code output'); ?>

					</dt>
					<dd>
						<form>
							<textarea class="code" disabled="disabled" readonly="readonly"></textarea>
						</form>
					</dd>
				</dl>
				<a class="add-column" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
			</fieldset>
		</div>
		<script type="text/javascript">
		var host = '<?php echo $this->getConfiguration('host'); ?>';
		$(function() {
			objects = [];
			new Generator('column1');
		});
		</script>
	</body>
</html>