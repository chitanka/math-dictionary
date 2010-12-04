<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $culture = $sf_user->getCulture() ?>" lang="<?php echo $culture ?>">
<head>
 <?php include_http_metas() ?>
 <?php include_metas() ?>
 <title>
  <?php echo prepare_document_title(get_slot('title')) ?>
  <?php if ( ! include_slot('sitename') ): ?>
   —
   <?php echo __('Math dictionary') ?>
  <?php endif ?>
 </title>
 <link rel="icon" href="/favicon.png" type="image/png" />
 <link rel="copyright" href="http://creativecommons.org/publicdomain/zero/1.0/" />
 <?php include_stylesheets() ?>
</head>

<body>

 <h1 id="first-heading">
  <?php include_slot('title') ?>
 </h1>
 <div id="sitename">
  <?php if ( ! include_slot('sitename') ): ?>
   <p><?php echo link_to(__('Math dictionary'), '@homepage') ?></p>
  <?php endif ?>
 </div>

 <?php include_partial('global/flashes') ?>

 <div id="content">
  <?php echo $sf_content ?>
 </div>

 <?php if ( ! include_slot('search') ): ?>
  <?php include_component('main', 'search') ?>
 <?php endif ?>

 <?php include_component('main', 'dictList') ?>

 <?php include_component('sfLanguageSwitch', 'get') ?>

 <?php include_partial('feedback/link') ?>

 <?php if ( ! include_slot('footer') ): ?>
  <?php include_partial('global/footer') ?>
 <?php endif ?>

 <?php include_javascripts() ?>
</body>
</html>
