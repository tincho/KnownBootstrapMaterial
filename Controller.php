<?php

namespace Themes\BootstrapMaterial {

    class Controller extends \Idno\Common\Theme
    {
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

