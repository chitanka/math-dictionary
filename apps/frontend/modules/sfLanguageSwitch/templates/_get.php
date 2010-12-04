<div id="cultures" class="box">
 <h2><?php echo __('Change language') ?></h2>
 <ul>
  <?php foreach($sf_data->getRaw('languages') as $language => $information): ?>
   <li<?php echo $language == $sf_user->getCulture() ? ' class="active"' : '' ?>>
    <?php echo link_to($information['title'],
                      '@'.$routing->getCurrentRouteName() . $information['query']
                      ) ?>
   </li>
  <?php endforeach ?>
</ul>
</div>