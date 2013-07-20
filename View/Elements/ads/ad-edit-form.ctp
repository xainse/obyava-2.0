
<div class="ad-edit-form">
<div class="left">
<h3 class="black-bg-title">Додати об*яву</h3>
<?php echo $this->Form->create('Ad');?>
<?php echo $this->Form->input('region_id', array('label' => false, 'type'=>'select', 'empty' => '-Виберіть регіон-', 'options' => $regions));?>
<?php echo $this->Form->input('category_id', array('label' => false, 'type'=>'select', 'empty' => '-Виберіть рубрику-', 'options' => $categories));?>
<?php echo $this->Form->input('text', array('label' => 'Текст об*яви:', ))?>
<?php echo $this->Form->input('contacts', array('label' => 'Ваша адреса або телефон:', ))?>

<?php echo $this->Form->input('confirm_rules', array('type'=>'checkbox', 'order' => '', 'label' => $this->Html->link('Погоджуюсь з правилами публікації', $this->webroot.'terms.html'))); ?>

<?php echo $this->Form->button('Зберегти', array('type'=>'submit'))?>
<?php echo $this->Form->end();?>
</div>
	<div class="right ads-add">
	<?php if(empty($is_error)) :?>
		<h3>Як правильно написати об&rsquo;яву?</h3>
		<ol class="description">
			<li>Виберіть рубрику, в яку ви хочите одати свою об&rsquo;яву. <span>(Ви можете, <a href="rubrik/add/">додати нову рубрику</a>, якщо намає потрібної.)</span></li>
			<li>Уточніть підрубрику. <span>(Що ви хочете, продати, купити чи інше.)</span></li>
			<li>Напишіть текст вашої об&rsquo;яви. <span></span></li>
			<li>Теги - це одне або декілька слів, через кому, що описують вашу об&rsquo;яву.<span>(Це допоможе легше знаходити вашу об&rsquo;яву)</span></li>
		</ol>
	<?php else :?>	
		<h3 class="error">Виникла помилка</h3>
		<div class="text-error">
			<?php if (!empty($validationErrors['text'])) echo $validationErrors['text']?>			
		</div>
		<div class="tags-error">
			<?php if (!empty($validationErrors['tags'])) echo $validationErrors['tags']?>
		</div>
	<?php endif?>	
	</div>
</div>


<style type="text/css">
.ad-edit-form {
	width: 600px;
	height: 500px;
	padding: 20px;
	position: relative;
	margin: 0 auto;
	border: 2px solid #3B3830;
	border-radius: 5px;
}
	.ad-edit-form .left {float: left; width:300px;}
	.ad-edit-form .right {float: left; width:280px; margin:28px 0 0 20px;}
.black-bg-title {
	height: 1em;
	margin: 0 0 15px;
	padding: 0;
	font-size: 31px;	
	color: #3B3830;
	text-shadow: 0 1px 1px #FFF;	
		
}
.ad-edit-form .input {
	float: left;
	width: 100%;
	margin:0 0 7px;	
}
	.ad-edit-form .input label { float: left; width: 200px; font-size: 13px;}
	.ad-edit-form .input.checkbox label {width: 240px;}
	.ad-edit-form .input select, .ad-edit-form .input input[type=text] { float: left; width: 295px; padding: 4px 3px;}
	textarea#AdText{
		font-size: 16px;
		width: 290px;
		height: 180px;
		margin: 0 0 10px 0;	
	}
		
</style>
