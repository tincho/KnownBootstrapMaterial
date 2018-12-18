<ul class="navbar-nav ml-auto" id="content-filter">
<?php

    $content_types = \Idno\Common\ContentType::getRegistered();
if (!empty($content_types)) {

    if (!empty($vars['subject'])) {
        $search = '?q=' . urlencode($vars['subject']);
    } else {
        $search = '';
}

$filtered = !empty($vars['content']);
if ($filtered) {
    $friendly_name = \Idno\Common\ContentType::categoryTitleSlugsToFriendlyName($vars['content']);
}
?>

    <li class="nav-item <?php if ($filtered) echo 'active' ?> dropdown" tabindex="3">
        <a  href="#"
            class="nav-link dropdown-toggle dropdown-toggle-split " 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            title="<?php
                echo \Idno\Core\Idno::site()->language()->_('Filter content');
                if (!empty($friendly_name)) echo ' (' . $friendly_name . ')';
            ?>">
            <?php if (empty($friendly_name)): ?>
            <span class="d-inline-block d-sm-none mr-1"><?php
                echo \Idno\Core\Idno::site()->language()->_('Filter content');?></span>
            <?php endif; ?>
            <i class="fa fa-filter"></i>
        <?php
        if (!empty($friendly_name)) {
            echo $friendly_name;
        }
        ?>
        </a> 
        <div class="dropdown-menu content-type-filter" aria-labelledby="dropdown01" style="min-width: 14rem">
            <?php
            echo $this->__(array( 'search' => $search, 'icon' => '<i class="fa fa-home"></i>' ))->draw("shell/toolbar/content/default");
            echo $this->__(array( 'search' => $search, 'icon' => '<i class="fa fa-stream"></i>' ))->draw("shell/toolbar/content/all");
            foreach ($content_types as $content_type) {
                if (empty($content_type->hide)) {
                    /* @var Idno\Common\ContentType $content_type */
                    echo $this->__(array( 'content_type' => $content_type, 'search' => $search ))->draw("shell/toolbar/content/type");
                }
            }
            // this is used by CustomFilter plugin
            echo $this->__(array( 'search' => $search ))->draw("shell/toolbar/content/extra");
            ?>
        </div>
    </li>

    <?php

}

?>
</ul>
