<link href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>Themes/BootstrapMaterial/css/default.css" rel="stylesheet">
<link href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>Themes/BootstrapMaterial/css/theme.css" rel="stylesheet">
<!--
<link href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>Themes/BootstrapMaterial/css/defaultb4.css" rel="stylesheet">
-->
<!--
<link href="<?php echo \Idno\Core\Idno::site()->config()->getStaticURL() ?>css/<?php echo $this->getModifiedTS('css/defaultb3.min.css'); ?>/defaultb3.min.css" rel="stylesheet">
-->
<!-- Syndication -->
<link
    href="<?php echo \Idno\Core\Idno::site()->config()->getStaticURL() ?>external/bootstrap-toggle/css/bootstrap-toggle.min.css"
    rel="stylesheet"/>

<!-- Mention styles -->
<link rel="stylesheet" type="text/css"
      href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>external/mention/recommended-styles.css">

<?php
    // Load style assets
if ((\Idno\Core\Idno::site()->currentPage()) && $style = \Idno\Core\Idno::site()->currentPage->getAssets('css')) {
    foreach ($style as $css) {
        ?>
            <link href="<?php echo $css; ?>" rel="stylesheet">
            <?php
    }
}