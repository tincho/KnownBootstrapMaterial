<?php
/**
 * adapted to bootstrap 4
 */
?>
    <a class="dropdown-item" href="<?php echo $vars['url'] ?>">
        <span class="dropdown-menu-icon"><?php
        if (!empty($vars['icon'])) {
            echo $vars['icon'];
        } else {
            echo '&nbsp;';
        }
        ?></span>
        <?php echo $vars['title'] ?>
    </a>
