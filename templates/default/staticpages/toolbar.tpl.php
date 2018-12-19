
<?php
/**
 * adapted to bootstrap 4
 * 
 */

if ($staticpages = \Idno\Core\Idno::site()->plugins()->get('StaticPages')) {
    /* @var \IdnoPlugins\StaticPages\Main $staticpages */
    if ($pages_list = $staticpages->getPagesAndCategories()) {

        if (!function_exists(_route)) {
            function _route($url) {
                return str_replace(\Idno\Core\Idno::site()->config()->getDisplayURL(), '', $url);
            }
        }
        function getPath($page) {
            return _route($page->getURL());
        }
        if (!function_exists(isContent)) {
            function isContent() {
                $route = _route(\Idno\Core\Idno::site()->currentPage()->currentUrl());
                return !!preg_match('/^content/', $route);
            }
        }
?>
<ul class="navbar-nav mr-2 ml-2">
<?php
        foreach ($pages_list as $category => $pages) {
            if (!empty($pages) || substr($category, 0, 1) == '#') {
                if ($category == 'No Category') {
                    if (!empty($pages)) {
                        foreach ($pages as $page) {
                            if (!$page->isHomepage()) {
                                $activeClass = '';
                                if(\Idno\Core\Idno::site()->currentPage()->doesPathMatch('/'.getPath($page))) $activeClass .= 'active';

                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?=$activeClass; ?>" href="<?php echo $page->getURL() ?>"><?php echo htmlspecialchars($page->getTitle()) ?></a>
                                    </li>
                                    <?php
                            }
                        }
                    }
                } else { ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <?php echo $category ?>
                                <b class="caret"></b>
                            </a>
                            <div class="dropdown-menu">
                            <?php
                            if (substr($category, 0, 1) == '#') {
                            ?>
                                <a class="dropdown-item" href="<?php echo \Idno\Core\Idno::site()->config()->getURL() ?>content/all/?q=<?php echo urlencode($category) ?>">Stream</a>
                            <?php
                            }
                            if (!empty($pages)) {
                                foreach ($pages as $page) {
                                    if (!$page->isHomepage()) {
                                        $activeClass = '';
                                        if(\Idno\Core\Idno::site()->currentPage()->doesPathMatch('/'.getPath($page))) $activeClass .= 'active';
                            ?>
                                <a class="dropdown-item <?=$activeClass; ?>" href="<?php echo $page->getURL() ?>"><?php echo htmlspecialchars($page->getTitle()) ?></a>
                            <?php
                                    }
                                }
                            }
                            ?>
                            </div>
                        </li>
                    <?php

if (false && !empty(\Idno\Core\Idno::site()->config->staticPages['homepage'])) {
    // there is a homepage so link the stream
    ?>
    <li class="nav-item">
        <a class="nav-link <?php if(isContent()) echo 'active'; ?>" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL(); ?>content/default">
            <i class="fa fa-stream">
            </i>
            <abbr title="Timeline">TL</abbr>
        </a>
    </li><?php
}


                }

            }

        } ?>
</ul>
<?php 
    }
}
