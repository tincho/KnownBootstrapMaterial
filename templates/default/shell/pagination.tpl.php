<?php

    /* @var $this \Idno\Core\Template */
    $xhr = false;
//echo $vars['count'];
if (isset($vars['offset']) && !empty($vars['count'])) {

    if (empty($vars['items_per_page'])) {
        $items_per_page = \Idno\Core\Idno::site()->config()->items_per_page;
    } else {
        $items_per_page = $vars['items_per_page'];
    }
    $prev_offset = $vars['offset'] - $items_per_page;
    if ($prev_offset < 0) $prev_offset = 0;
    $next_offset = $vars['offset'] + $items_per_page;
    if ($next_offset > ($vars['count'] - 1)) $next_offset = $vars['count'] - 1;

    $disableNewer = ($vars['offset'] == 0);
    $disableOlder = ($vars['offset'] > $vars['count'] - $items_per_page);
    ?>


<nav aria-label="..." class="row pager">
 <div class="btn-group  mx-auto" role="group" aria-label="...">
<!-- 
  <ul class="pagination mx-auto text-center">
    <li class="page-item <?php if ($disableNewer) echo 'disabled'; ?>">
 --> 
      <a class="btn btn-info newer <?= ($disableNewer) ? 'disabled' : ''; ?>" href="<?php echo (!$disableNewer) ? $this->getURLWithVar('offset', $prev_offset) : '';?>">&laquo; <?php echo \Idno\Core\Idno::site()->language()->_('Newer'); ?></a>
<!--     </li>
 -->    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li> -->
 <!--    <li class="page-item <?php if ($disableOlder) echo "disabled"?>">
  -->     <a class="btn btn-info older <?= ($disableOlder) ? 'disabled' : ''; ?>" href="<?php echo (!$disableOlder) ? $this->getURLWithVar('offset', $next_offset) : ''; ?>"><?php echo \Idno\Core\Idno::site()->language()->_('Older'); ?> &raquo;</a>
 <!--    </li>
  </ul>
 -->
</div>
</nav>

<!--         <div class="pager <?php

        if (!empty($vars['control-id']) && (!empty($vars['source-url']))) {
            echo "pager-xhr";
            $xhr = true;
        }

        ?>" data-count="<?php echo $vars['count']; ?>" data-limit="<?php echo $items_per_page; ?>" data-offset="<?php echo $vars['offset']; ?>" data-control-id="<?php echo empty($vars['control-id']) ? '' : $vars['control-id'] ?>" data-source-url="<?php echo empty($vars['source-url']) ? '' : htmlspecialchars($vars['source-url']); ?>">
            <ul>
                <li class="newer <?php if ($vars['offset'] == 0) echo "pagination-disabled" ?>"><a href="<?php echo !$xhr ? $this->getURLWithVar('offset', $prev_offset) : '#';?>" title="Newer" rel="next"><span>&laquo; <?php echo \Idno\Core\Idno::site()->language()->_('Newer'); ?></span></a></li>
                <li class="older <?php if ($vars['offset'] > $vars['count'] - $items_per_page) echo "pagination-disabled"?>"><a href="<?php echo !$xhr ? $this->getURLWithVar('offset', $next_offset) : '#'; ?>" title="Older" rel="prev"><span><?php echo \Idno\Core\Idno::site()->language()->_('Older'); ?> &raquo;</span></a></li>
            </ul>
        </div>

 -->    <?php

}

