<?php slot('title', get_title_for_letter_list($letter, $first_lang, $second_lang)) ?>

<div class="pagination">
 <?php echo navi_alpha_links('@main_list', $letter, $first_lang, array('dict' => $dict)) ?>
</div>

<?php if ($letter): ?>
 <?php include_partial('list', compact('words', 'first_lang', 'second_lang')) ?>
<?php endif ?>
