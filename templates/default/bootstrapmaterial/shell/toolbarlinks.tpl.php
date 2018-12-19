<?php

if (!function_exists(_route)) {
    function _route($url) {
        return str_replace(\Idno\Core\Idno::site()->config()->getDisplayURL(), '', $url);
    }
}
if (!function_exists(isContent)) {
    function isContent() {
        $route = _route(\Idno\Core\Idno::site()->currentPage()->currentUrl());
        return !!preg_match('/^content/', $route);
    }
}
$staticpages = \Idno\Core\Idno::site()->plugins()->get('StaticPages');

if (!$staticpages) {
    $showTL = true;
} else {
    $showTL = !empty(\Idno\Core\Idno::site()->config->staticPages['homepage']);
}

if ($showTL) {
    // there is a homepage so link the stream
    ?>
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link <?php if(isContent()) echo 'active'; ?>" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL(); ?>content/default">
            <i class="fa fa-stream">
            </i>
            <abbr title="Timeline">TL</abbr>
        </a>
    </li>
</ul>
    <?php
}
