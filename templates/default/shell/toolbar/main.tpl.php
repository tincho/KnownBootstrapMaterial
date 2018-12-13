<?php
$isLogged = \Idno\Core\Idno::site()->session()->isLoggedIn();
$allowContent = (\Idno\Core\Idno::site()->config()->isPublicSite() || $isLogged);

$description = \Idno\Core\Idno::site()->config()->description;
?>

<a href="#maincontent" style="display:none"><?php echo \Idno\Core\Idno::site()->language()->_('Skip to main content'); ?></a>
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand mr-4" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>"><?php echo
      $this->draw('shell/toolbar/title')
    ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="<?php echo \Idno\Core\Idno::site()->language()->_('Toggle navigation'); ?>">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <?php if ($allowContent) { echo $this->draw('shell/toolbar/search'); } ?>
      <?php if ($allowContent) { echo $this->draw('shell/toolbar/content'); } ?>
      <?php echo $this->draw('shell/toolbar/links'); // content is actually at staticpages/toolbar.tpl.php ?>
      <?php if ($isLogged) { echo $this->draw('shell/toolbar/logged-in'); } ?>
      <?php if (!$isLogged) { echo $this->draw('shell/toolbar/logged-out'); } ?>
    </div>
  </nav>
</header>