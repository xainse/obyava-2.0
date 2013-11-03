
<div class="ad-edit-form">
<div class="left">
<h3 class="black-bg-title">Додати об*яву</h3>
<?php echo $this->Form->create('Ad', array('id' => 'addObyForm'));?>
<?php echo $this->Form->input('region_id', array('label' => false, 'type'=>'select', 'class'=>'input select', 'empty' => '-Виберіть регіон-', 'options' => $regions));?>
<?php // echo $this->Form->input('category_id', array('label' => false, 'type'=>'select', 'empty' => '-Виберіть рубрику-', 'options' => $categories));?>
<div class="input category-placeholder" id="category-placeholder">-<?php echo __('Виберіть категорію')?>-</div>
<?php echo $this->Form->hidden('category_id', array('id' => 'AdCategoryId'));?>
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
