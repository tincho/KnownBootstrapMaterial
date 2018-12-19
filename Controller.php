<?php

namespace Themes\BootstrapMaterial {

    class Controller extends \Idno\Common\Theme
    {
        function registerPages() {
            \Idno\Core\Idno::site()->template()->prependTemplate('shell/toolbar/links', 'bootstrapmaterial/shell/toolbarlinks', true);
        }
        function registerTranslations()
        {

            \Idno\Core\Idno::site()->language()->register(
                new \Idno\Core\GetTextTranslation(
                    'bootstrapmaterial', dirname(__FILE__) . '/languages/'
                )
            );
        }
    }

}

