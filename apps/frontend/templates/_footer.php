<div id="footer">
 <h2><?php echo __('Footer') ?></h2>
 <ul>
  <li><?php echo __('This information is supplied in the hope that it will be useful, but WITHOUT ANY WARRANTY of accuracy or completeness.') ?></li>
  <li xmlns:dct="http://purl.org/dc/terms/">
   <a rel="license" href="http://creativecommons.org/publicdomain/zero/1.0/"><img src="http://i.creativecommons.org/l/zero/1.0/80x15.png" alt="CC0" title="Public domain" /></a>
   <?php echo __('Site license') ?>
  </li>
  <li><?php echo __('Built with %symfony% and %doctrine%', array(
   '%symfony%'  => link_to(image_tag('symfony.gif', 'alt=symfony'), 'http://www.symfony-project.org'),
   '%doctrine%' => link_to(image_tag('doctrine', 'alt=Doctrine'), 'http://www.doctrine-project.org'),
  )) ?></li>
</ul>
</div>
