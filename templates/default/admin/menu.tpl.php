<?php

$paths = array(
  '/admin/',
  '/admin/plugins/',
  '/admin/themes',
  '/admin/homepage/',
  '/admin/email/',
  '/admin/users/',
  '/admin/export/',
  '/admin/import/',
  '/admin/diagnostics/',
  '/admin/logs/',
  '/admin/about/'
);

$strings = array(
  \Idno\Core\Idno::site()->language()->_('Site configuration'),
  \Idno\Core\Idno::site()->language()->_('Plugins'),
  \Idno\Core\Idno::site()->language()->_('Themes'),
  \Idno\Core\Idno::site()->language()->_('Homepage'),
  \Idno\Core\Idno::site()->language()->_('Email'),
  \Idno\Core\Idno::site()->language()->_('Users'),
  \Idno\Core\Idno::site()->language()->_('Export'),
  \Idno\Core\Idno::site()->language()->_('Import'),
  \Idno\Core\Idno::site()->language()->_('Diagnostics'),
  \Idno\Core\Idno::site()->language()->_('Captured Logs'),
  \Idno\Core\Idno::site()->language()->_('About')
);
// CAREFUL! both arrays should respectively have the same order
$pathStrings = array_combine($paths, $strings);

function activeIfMatch($path) {
  return (\Idno\Core\Idno::site()->currentPage()->doesPathMatch($path)) ? 'active' : '';
}
$activeClasses = array_combine($paths, array_map('activeIfMatch', $paths));

function makeUrl($path) {
  return \Idno\Core\Idno::site()->config()->getDisplayURL() . preg_replace('/^\/+/', '', $path); 
}

$showOption = array_fill_keys($paths, true);
$capture_logs = (!empty(\Idno\Core\Idno::site()->config()->capture_logs) && \Idno\Core\Idno::site()->config()->capture_logs);
$showOption['/admin/logs/'] = $capture_logs;
?>

<ul class="nav nav-tabs" id="admin-menu">
  <?php
  foreach($pathStrings as $option => $text) {
    if (!$showOption[$option]) continue;

    ?><li class="nav-item <?php echo $activeClasses[$option]; ?>">
      <a href="<?php echo makeUrl($option); ?>" class="nav-link <?php echo $activeClasses[$option]; ?>">
        <?php echo $text; ?>
      </a>
    </li><?php
  }
  echo $this->draw('admin/menu/items'); ?>
</ul>
<script type="text/javascript">
$('#admin-menu li:not(.nav-item)').addClass('nav-item');
$('#admin-menu li a:not(.nav-link)').addClass('nav-link');
$('#admin-menu li.active a:not(.active)').addClass('active');
</script>