<ul class="navbar-nav border-left">
    <li class="nav-item"><a class="nav-link" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>session/login"><?php echo \Idno\Core\Idno::site()->language()->_('Sign in'); ?></a></li>
    <?php
    if (\Idno\Core\Idno::site()->config()->open_registration == true && \Idno\Core\Idno::site()->config()->canAddUsers()) {
        echo $this->draw('shell/toolbar/register');
    }
    ?>
</ul>
<?php
// I prefer using ApplyToJoin plugin so override it at applytojoin/toolbar.tpl.php
echo $this->draw('shell/toolbar/logged-out/items');
?>
    