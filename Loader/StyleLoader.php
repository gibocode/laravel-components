<?php

/**
 * Style Loader Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelUiComponents\Loader;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use Exception;

class StyleLoader {

    /**
     * Gets styles in plain or HTML format by name
     * @param string $name
     * @param bool $html
     * @return string
     */
    public static function load($name, $html = true) {

        if (empty($name)) throw new Exception('Style [name] is required.');

        $content = @file_get_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . $name . '.css', true);

        if (!$html || empty($content)) return $content;

        $type = new Attribute('type', 'text/css');
        $rel = new Attribute('rel', 'stylesheet');
        
        $style = new Element('style', $content, [$type, $rel]);

        return $style->render();
    }
}