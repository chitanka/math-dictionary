 <table>
  <tr>
   <th><?php echo get_formatted_language($first_lang) ?></th>
   <th><?php echo get_formatted_language($second_lang) ?></th>
  </tr>
 <?php $i = 0; foreach ($words as $row): ?>
  <tr class="<?php echo ++$i % 2 ? 'odd' : 'even' ?>">
   <td>
    <?php if ($row['wp_article1']): ?>
     <?php echo link_to_wikipedia($first_lang, $row['wp_article1'], hilite($row['from_word'], @$hilite)) ?>
    <?php else: ?>
     <?php echo hilite($row['from_word'], @$hilite) ?>
    <?php endif ?>
   </td>
   <td>
    <?php if ($row['wp_article2']): ?>
     <?php echo link_to_wikipedia($second_lang, $row['wp_article2'], $row['to_word']) ?>
    <?php else: ?>
     <?php echo $row['to_word'] ?>
    <?php endif ?>
   </td>
  </tr>
 <?php endforeach ?>
 </table>
