<div id="dictionaries" class="box">
<h2><?php echo __('Dictionaries') ?></h2>
<ul>
 <?php $dict = $sf_params->get('dict') ?>
 <?php foreach ($dict_relations as $first_lang => $second_langs): ?>
  <?php foreach ($second_langs as $second_lang): $this_dict = "$first_lang-$second_lang" ?>
   <li<?php echo $this_dict == $dict ? ' class="active"' : '' ?>><?php echo link_to_dict($first_lang, $second_lang) ?></li>
  <?php endforeach ?>
 <?php endforeach ?>
</ul>
</div>