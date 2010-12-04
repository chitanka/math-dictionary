<?php use_helper('JavascriptBase') ?>

<div id="search" title="<?php echo __('Search through the dictionaries') ?>">
 <h2><?php echo __('Search') ?></h2>
 <?php echo form_tag('@search', array('method' => 'get', 'onsubmit' => 'return redirect_search(this)')) ?>
  <?php echo $form ?>
  <input type="submit" value="»" />
 </form>
</div>
