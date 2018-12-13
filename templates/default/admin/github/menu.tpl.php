<?php
$plugin = 'github';
$activeClass = \Idno\Core\Idno::site()->currentPage()->doesPathMatch('/admin/'.$plugin.'/') ? 'active' : '';
$url = \Idno\Core\Idno::site()->config()->url . 'admin/' . $plugin . '/';
?>
<li class="nav-item <?php echo $activeClass; ?>">
    <a class="nav-link <?php echo $activeClass; ?>" href="<?php echo $url;?>">
    Github
    </a>
</li>
