<?php if ($query): ?>

 <?php slot('title', __('Search results for $1', array('$1' => $query))) ?>

 <?php if ( count($lists) == 0 ): ?>

  <p class="no-items"><?php echo __('No words were found.') ?></p>

 <?php else: ?>

  <?php foreach ($lists as $list): ?>
   <h2><?php echo get_dictionary_title($list['first_lang'], $list['second_lang']) ?></h2>
   <?php include_partial('list_table', array(
    'first_lang'  => $list['first_lang'],
    'second_lang' => $list['second_lang'],
    'words'       => $list['words'],
    'hilite'      => $query,
   )) ?>
   <?php endforeach ?>

 <?php endif ?>

<?php else: ?>

 <?php slot('title', __('Search results for $1', array('$1' => '...'))) ?>

 <p class="error"><?php echo __('Search query should not be empty.') ?></p>

<?php endif ?>
