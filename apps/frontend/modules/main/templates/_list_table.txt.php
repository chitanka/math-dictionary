<?php echo strip_tags(get_formatted_language($first_lang)), " --- ", strip_tags(get_formatted_language($second_lang)), "\n", str_repeat('=', 60), "\n" ?>
<?php $i = 0; foreach ($words as $row): ?>
<?php echo $row['from_word'], " --- ", $row['to_word'], "\n" ?>
<?php endforeach ?>
