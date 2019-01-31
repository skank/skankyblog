<?php $this->setTitle('adresse'); ?>
<div class="layout-login">
<section id="Login">
	<header>
		<h1> </h1>
	</header>
	<?= $this->Form->start(null,['action'=>'addAdresse']); ?>
	<section>
		<?= $this->Form->fieldset([
			'fieldset'=> ['class'=>''],
			'legend'  => ['content'=>'','class'=>''],
			'input'   => [
				'name'  => ['label'=>'name','type'=>'text'],
				'add1'  => ['label'=>'adresse 1','type'=>'text'],
				'add2'  => ['label'=>'adresse 2','type'=>'text'],
				'add3'  => ['label'=>'adresse 3','type'=>'text'],
				'cp'    => ['label'=>'code postale','type'=>'number'],
				'ville' => ['label'=>'ville','type'=>'text'],
			]
		]); ?>
	</section>
	<footer>
		<?= $this->Form->submit('Envoyer'); ?>
	</footer>
	<?= $this->Form->end(); ?>
</section>
</div>
