
<?php
/**
 * adapted to bootstrap 4
 * 
 */

if ($staticpages = \Idno\Core\Idno::site()->plugins()->get('StaticPages')) {
    /* @var \IdnoPlugins\StaticPages\Main $staticpages */
    if ($pages_list = $staticpages->getPagesAndCategories()) {
?>
<ul class="navbar-nav ml-auto mr-4">
<?php
        foreach ($pages_list as $category => $pages) {
            if (!empty($pages) || substr($category, 0, 1) == '#') {
                if ($category == 'No Category') {
                    if (!empty($pages)) {
                        foreach ($pages as $page) {
                            if (!$page->isHomepage()) {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $page->getURL() ?>"><?php echo htmlspecialchars($page->getTitle()) ?></a>
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
                            ?>
                                <a class="dropdown-item" href="<?php echo $page->getURL() ?>"><?php echo htmlspecialchars($page->getTitle()) ?></a>
                            <?php
                                    }
                                }
                            }
                            ?>
                            </div>
                        </li>
                    <?php
                }

            }

        } ?>
</ul>
<?php 
    }
}
