<?php if ( count($words) == 0 ): ?>
 <p class="no-items"><?php echo __('No words were found.') ?></p>
<?php else: ?>
 <?php include_partial('list_table', compact('words', 'first_lang', 'second_lang')) ?>
<?php endif ?>
