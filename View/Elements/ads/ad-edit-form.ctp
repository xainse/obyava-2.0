<div class="block-title">
<div class="ltc"><div class="rtc">
<div class="block-content">
Додати об&rsquo;яву</div>
</div></div></div>
<div class="block">
<div class="lbc"><div class="rtc"><div class="rbc">
	<div class="left">
		<?php // check for validation error  ?>
		<?php if (!empty($validationErrors['rubrik_id'])) $error_class_rubrik_id = 'error'; else $error_class_rubrik_id = "";?>
		<?php if (!empty($validationErrors['text'])) $error_class_text = 'error'; else $error_class_text = "";?>
		<?php if (!empty($validationErrors['tags'])) $error_class_tags = 'error'; else $error_class_tags = "";?>
		
		<?php echo $this->Form->create("Ad", array("action"=>"save/", "class"=>"ads-add"))?>
		<label id="AdRubrikLabel" for="AdRubrikId">Рубрика:</label>
		<?php echo $this->Form->select("Ad.rubrik_id", $select_categoria, "first", array("label"=>"Рубрика:", "class"=>$error_class_rubrik_id), false)?>
		<br />
		<?php echo $this->Form->radio("Ad.subRubrik_id", array("sell"=>"Продати", "bay"=>"Купити", "change"=>"Обміняти", "service"=>"Послуги"),
						array("legend"=>" Підрубрика:", "value"=>"sell"))?>
		
		<?php echo $this->Form->textarea("Ad.text", array("label"=>"Текст об&rsquo;яви:" , "class"=>$error_class_text))?>
		<?php echo $this->Form->input("Ad.tags", array("label"=>"Теги:", "class"=>$error_class_tags))?>
		<?php echo $this->Form->end("Зберегти")?>
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
</div></div></div>	
</div>