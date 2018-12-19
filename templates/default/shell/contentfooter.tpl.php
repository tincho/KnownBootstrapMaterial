<?php
$copy = \Idno\Core\site()->config()->title;

// if nav is hidden, surely for the same reason the footer should be
if(!$hidenav):
?>
<footer class="site-footer">
  <div class="container">
    <span class="text-muted">&copy; <?= $copy; ?></span>
    <span class="text-muted small float-right ">Powered by <a href="http://known.co" title="a publishing platform for the IndieWeb">Known</a></span>
  </div>
</footer>
<?php
endif; 
