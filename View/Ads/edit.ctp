

<?php echo $this->element('ads/ad-edit-form', array('categories'=>$categories));?>
<div id="hiddenCategoryBlock" style="display:none;"><?php echo $this->element('ads/choose-category', array('categories'=>$categories))?></div>

<script type="text/javascript">$(function(){AdEdit.setup();});</script>