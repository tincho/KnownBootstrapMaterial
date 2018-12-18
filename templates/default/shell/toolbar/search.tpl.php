<?php

    $currentPage = \Idno\Core\Idno::site()->currentPage();
    $action = \Idno\Core\Idno::site()->config()->getDisplayURL();
if (!empty($vars['content'])) {
    if (!is_array($vars['content'])) {
        $vars['content'] = array($vars['content']);
    }
    $action .= 'content/' . implode('/', $vars['content']);
} else {
    $action .= 'content/all/';
}

$search = \Idno\Core\Idno::site()->language()->_('Search');

?>

<form class="form-inline my-2 my-lg-0 ml-2" action="<?php echo $action?>" method="get" role="search">
    <input class="form-control mr-sm-2 search-query" name="q" type="text" placeholder="<?= $search; ?>" aria-label="<?= $search; ?>" value="<?php

if (!empty($currentPage)) {
    if ($q = $currentPage->getInput('q')) {
        echo htmlspecialchars($q);
    }
}

?>">
    <button class="btn btn-outline-success my-2 my-sm-0 d-md-none" type="submit"><?= $search; ?></button>
</form>
