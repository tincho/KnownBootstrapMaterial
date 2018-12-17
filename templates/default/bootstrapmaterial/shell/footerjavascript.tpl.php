<!-- @todo ship inside vendor ! -->
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { 
    //$('body').bootstrapMaterialDesign(); 
    $('.idno_pages_admin_home .col-md-4 input.col-md-4').removeClass('col-md-4');

    $('.page-body .nav-tabs li:not(.nav-item)').addClass('nav-item');
    $('.page-body .nav-tabs li a:not(.nav-link)').addClass('nav-link');
    $('.page-body .nav-tabs li.active a:not(.active)').addClass('active');

    $('.idno-content:not(.card)').addClass('card');

    // bootstrap 3->4
    $('[class*="col-md-offset"]').each(function(){
        var $el = $(this);
        var classes = $el.attr('class');
        $el.attr('class', classes.replace('col-md-offset', 'offset-md'));
    });

    var hiddenReplacements = {
        from: [
            'hidden-xs',
            'hidden-sm',
            'hidden-md',
            'hidden-lg'
        ],
        to: [
            'd-none',
            'd-sm-none',
            'd-md-none',
            'd-lg-none'
        ]
    };
    var visibleReplacements = {
        from: [
            'visible-xs',
            'visible-sm',
            'visible-md',
            'visible-lg'
        ],
        to: [
            'd-block d-sm-none',
            'd-none d-sm-block d-md-none',
            'd-none d-md-block d-lg-none',
            'd-none d-lg-block d-xl-none'
        ]
    };
    $('[class*="visible-"]').each(function() {
        migrateClasses($(this), visibleReplacements);
    });
    $('[class*="hidden-"]').each(function() {
        migrateClasses($(this), hiddenReplacements);
    });

    function migrateClasses($el, replacements) {
        var classes = $el.attr('class');
        replacements.from.forEach(function(b3class, i) {
            var b4class = replacements.to[i];
            classes = classes.replace(b3class, b4class);
        });
        $el.attr('class', classes);
    }

});</script>

