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
		<h1>
			<?php echo $this->localize('Coaching Preview'); ?>
		</h1>
		<div class="column">
			<fieldset>
				<legend>
					<?php echo $this->localize('Configuration'); ?>
				</legend>
				<form>
					<input id="properties" type="hidden" name="properties"/>
					<dl>
						<dt>
							<?php echo $this->localize('Type'); ?>
						</dt>
						<dd>
							<select id="type" name="type">
								<option value=""></option>
								<optgroup label="Visible types">
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
								<optgroup label="Invisible types">
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
						</dt>
						<dd>
							<input id="key" type="text" name="key" value=""/>
						</dd>
						<dt>
							<?php echo $this->localize('Title'); ?>
						</dt>
						<dd>
							<input id="title" type="text" name="title" value=""/>
						</dd>
						<dt>
							<?php echo $this->localize('Description'); ?>
						</dt>
						<dd>
							<textarea id="description" name="description"></textarea>
						</dd>
						<div class="separator"></div>
						<dt>
							<?php echo $this->localize('Properties'); ?>
						</dt>
						<dd id="configuration">
							<?php echo $this->localize('Please select the object type.'); ?>
						</dd>
						<div id="AddValue" style="display: none;">
							<ul class="list">
								<li rel='{"values":["%s"]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Value'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="BulletPoints" style="display: none;">
							<ul class="list">
								<li rel='{"elements":[{"element":"%s","second":%d}]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Element'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
										<dt>
											<?php echo $this->localize('Second'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="Buy" style="display: none;">
							<ul class="list">
								<li rel='{"key":"%s"}'>
									<dl>
										<dt>
											<?php echo $this->localize('Key'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
								</li>
							</ul>
						</div>
						<div id="Coaching" style="display: none;">
							<ul class="list">
								<li rel='{"key":"%s"}'>
									<dl>
										<dt>
											<?php echo $this->localize('Key'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
								</li>
							</ul>
						</div>
						<div id="Checkboxes" style="display: none;">
							<ul class="list">
								<li rel='{"items":["%s"]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Item'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="DieterCategory" style="display: none;">
							<p>
								<?php echo $this->localize('No further configuration necessary.'); ?>
							</p>
						</div>
						<div id="DocumentDownload" style="display: none;">
							<ul class="list">
								<li rel='{"documents":[{"name":"%s","file":"%s"}]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Name'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
										<dt>
											<?php echo $this->localize('File'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="Dropdown" style="display: none;">
							<ul class="list">
								<li rel='{"items":["%s"]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Item'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="EnergyDemand" style="display: none;">
							<ul class="list">
								<li rel='{"weight":"#%s","height":"#%s"}'>
									<dl>
										<dt>
											<?php echo $this->localize('Weight'); ?> <em><?php echo $this->localize('(reference)'); ?></em>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
										<dt>
											<?php echo $this->localize('Height'); ?> <em><?php echo $this->localize('(reference)'); ?></em>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="Evaluation" style="display: none;">
							<p>
								...
							</p>
						</div>
						<div id="Group" style="display: none;">
							<ul class="list">
								<li rel='{"count":%d}'>
									<dl>
										<dt>
											<?php echo $this->localize('Count'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
								</li>
							</ul>
						</div>
						<div id="ImageStack" style="display: none;">
							<ul class="list">
								<li rel='{"elements":[{"element":"%s","second":%d}]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Element'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
										<dt>
											<?php echo $this->localize('Second'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="Keywords" style="display: none;">
							<ul class="list">
								<li rel='{"elements":[{"element":"%s","second":%d}]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Element'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
										<dt>
											<?php echo $this->localize('Second'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="LinkGroup" style="display: none;">
							<ul class="list">
								<li rel='{"links":[{"name":"%s","link":"%s"}]}'>
									<dl>
										<dt>
											<?php echo $this->localize('Name'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
										<dt>
											<?php echo $this->localize('Link'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
									<p>
										<a class="remove" href="#" title="<?php echo $this->localize('Remove'); ?>"><?php echo $this->localize('Remove'); ?></a>
									</p>
								</li>
							</ul>
							<p>
								<a class="add" href="#" title="<?php echo $this->localize('Add another'); ?>"><?php echo $this->localize('Add'); ?></a>
							</p>
						</div>
						<div id="List" style="display: none;">
							<ul class="list">
								<li rel='{"count":%d}'>
									<dl>
										<dt>
											<?php echo $this->localize('Count'); ?>
										</dt>
										<dd>
											<input type="text" value=""/>
										</dd>
									</dl>
								</li>
							</ul>
						</div>
						<div id="ListView" style="display: none;">
							<p>
								...
							</p>
						</div>
						<div id="Options" style="display: none;">
							<p>
								<?php echo $this->localize('No further configuration necessary.'); ?>
							</p>
						</div>
						<div id="Register" style="display: none;">
							<p>
								<?php echo $this->localize('No further configuration necessary.'); ?>
							</p>
						</div>
						<div id="SetValue" style="display: none;">
							<p>
								...
							</p>
						</div>
						<div id="Text" style="display: none;">
							<p>
								<?php echo $this->localize('No further configuration necessary.'); ?>
							</p>
						</div>
						<div id="TextArea" style="display: none;">
							<p>
								<?php echo $this->localize('No further configuration necessary.'); ?>
							</p>
						</div>
						<div id="TextInput" style="display: none;">
							<ul class="list">
								<li rel='{"type":"%s"}'>
									<dl>
										<dt>
											<?php echo $this->localize('Type'); ?>
										</dt>
										<dd>
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
										</dd>
									</dl>
								</li>
							</ul>
						</div>
						<div id="Video" style="display: none;">
							<p>
								<?php echo $this->localize('No further configuration necessary.'); ?>
							</p>
						</div>
					</dl>
					<p>
						<input id="test" type="button" value="<?php echo $this->localize('Preview'); ?>"/>
					</p>
				</form>
			</fieldset>
		</div>
		<div class="column">
			<fieldset>
				<legend>
					<?php echo $this->localize('Preview'); ?>
				</legend>
				<div id="preview">
					<p>
						<?php echo $this->localize('Please press the preview button.'); ?>
					</p>
				</div>
			</fieldset>
			<fieldset>
				<legend>
					<?php echo $this->localize('Code'); ?>
				</legend>
				<form>
					<dl>
						<dt>
							<?php echo $this->localize('JSON'); ?>
						</dt>
						<dd>
							<textarea id="object" name="object"></textarea>
						</dd>
						<div class="separator"></div>
						<dt>
							<?php echo $this->localize('Modeling Tool'); ?>
						</dt>
						<dd>
							<textarea id="modelingDescription" name="modelingDescription"></textarea>
						</dd>
					</dl>
					<p>
						<input id="convert" type="button" value="<?php echo $this->localize('Convert'); ?>"/>
					</p>
				</form>
			</fieldset>
		</div>
	</body>
</html>