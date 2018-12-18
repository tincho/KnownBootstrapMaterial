<?php 
// what are logged-in/items ?
//// echo $this->draw('shell/toolbar/logged-in/items');
?>
<ul class="navbar-nav logged-in float-right">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
        <i class="fa fa-user"></i>
        <?php echo htmlspecialchars(\Idno\Core\Idno::site()->session()->currentUser()->getTitle())?>
        <?php
            $notifs = \Idno\Core\Idno::site()->session()->currentUser()->countUnreadNotifications();
        if ($notifs > 0) {
            echo "<span class=\"unread-notification-count\">$notifs</span>";
        }
        ?>
        <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="<?php echo \Idno\Core\Idno::site()->session()->currentUser()->getDisplayURL()?>"><?php echo \Idno\Core\Idno::site()->language()->_('Profile'); ?></a>
        <a class="dropdown-item" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>account/notifications"><?php echo \Idno\Core\Idno::site()->language()->_('Notifications'); ?></a>
        <?php echo $this->draw('shell/toolbar/personal/items')?>
        <a class="dropdown-item" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>account/settings/"><?php echo \Idno\Core\Idno::site()->language()->_('Account Settings'); ?></a>
        <?php if (\Idno\Core\Idno::site()->session()->currentUser()->isAdmin()) { ?>
            <a class="dropdown-item" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>admin/"><?php echo \Idno\Core\Idno::site()->language()->_('Site Configuration'); ?></a>
        <?php } ?>
        <?php

                /*
                 * Alternative toolbar temporarily commented out
                 *

                <li><a href="<?=\Idno\Core\Idno::site()->session()->currentUser()->getDisplayURL()?>"><i class="fa fa-user" title="Your Profile"></i></a></li>

                <?=$this->draw('shell/toolbar/logged-in/items')?>

                <?php

                    if (\Idno\Core\Idno::site()->canWrite()) { ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog" title="Settings"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>profile/<?=\Idno\Core\Idno::site()->session()->currentUser()->getHandle()?>/edit">Edit Profile</a></li></li>
                            <li><a href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>account/settings/">Account Settings</a></li></li>
                            <?php if (\Idno\Core\Idno::site()->session()->currentUser()->isAdmin()) { ?>
                                <li><a href="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>admin/">Site Configuration</a></li>
                            <?php } ?>
                        </ul>
                <?php }
                    */
        ?>
        <a class="dropdown-item" href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL()?>account/settings/feedback/" ><i class="fa fa-heart" title="<?php echo \Idno\Core\Idno::site()->language()->_('Leave feedback'); ?>"></i> <?php echo \Idno\Core\Idno::site()->language()->_('Feedback'); ?></a>
        <?php // echo $this->draw('shell/toolbar/logout'); ?>
        <?php echo \Idno\Core\Idno::site()->actions()->createLink(\Idno\Core\Idno::site()->config()->getDisplayURL() . 'session/logout', \Idno\Core\Idno::site()->language()->_('Sign out'), null, array('class' => 'dropdown-item')); ?>
    </div>
  </li>
</ul>
