<?php

use Tygh\Registry;

/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_function_script($params, &$smarty)
{
    static $scripts = array();

    if (!isset($scripts[$params['src']])) {
        if (strpos($params['src'], '//') === false) {
            $src = Registry::get('config.current_location') . '/' . fn_link_attach($params['src'], 'ver=' . PRODUCT_VERSION);
        } else {
            $src = $params['src'];
        }

        $scripts[$params['src']] = '<script type="text/javascript"'
                                    . (!empty($params['class']) ? ' class="' . $params['class'] . '" ' : '')
                                    . ' src="' . $src . '" ' . (isset($params['charset']) ? ('charset="' . $params['charset'] . '"') : '') . '></script>';

        return $scripts[$params['src']];
    }
}
