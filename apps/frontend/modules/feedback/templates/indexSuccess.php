<?php slot('title', __('Feedback')) ?>

<?php echo form_tag('@feedback') ?>
 <table>
  <?php echo $form['message']->renderRow() ?>
  <?php echo $form['name']->renderRow() ?>
  <?php echo $form['email']->renderRow() ?>
  <tr>
   <td></td>
   <td><input type="submit" value="<?php echo __('Send') ?>" /></td>
  </tr>
 </table>
</form>
