<?php


$currentPage = \Idno\Core\Idno::site()->currentPage();
$isPermalink = (!empty($currentPage) && \Idno\Core\Idno::site()->currentPage()->isPermalink());

if (!empty($vars['rel'])) {
    $rel = $vars['rel'];
} else {
    $rel = '';
}

$content = $vars['value'];
$excerpt = $content;
if (!$isPermalink) {
    $limit = 420;
    $url = $vars['object']->getDisplayURL();
    $excerpt = substr($content, 0, $limit);
    if (strlen($content) > $limit) {
        $excerpt .= '...';
    }
}

    echo $this->autop($this->parseURLs($this->parseHashtags($excerpt), $rel));
    if (!$isPermalink && strlen($content) > strlen($excerpt)) {
        // @TODO extract to template
        echo '<a href="'.$url.'" class="btn float-right"> Read more &raquo;</a>';
    }

