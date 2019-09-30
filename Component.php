<?php

/**
 * Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelUiComponents;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelUiComponents\Interfaces\ComponentInterface;
use \Gibocode\LaravelUiComponents\Loader\StyleLoader;
use Exception;

class Component extends Element implements ComponentInterface {

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var array $components
     */
    protected $components = [];

    /**
     * @var object $styleLoader
     */
    protected $styleLoader;

    /**
     * Component Class Constructor
     * 
     * @param string $name
     * @param string $elementName
     * @param array $components
     * @param object $styleLoader
     * @return void
     */
    public function __construct($name, $elementName, $components = [], $styleLoader = null) {

        $this->setName($name);
        $this->setComponents($components);
        $this->setStyleLoader($styleLoader);

        parent::__construct($elementName, $this->renderComponents());
    }

    /**
     * Sets the name of the component
     * @param string $name
     * @return object
     */
    public function setName($name) {

        if (empty($name)) throw new Exception('Component [name] must not be empty.');

        $this->name = $name;

        return $this;
    }

    /**
     * Adds a new child component to the component
     * @param Component $component
     * @return object
     */
    public function addComponent($component) {

        $this->components[] = $component;

        return $this;
    }

    /**
     * Overrides an existing childe component or adds a new child component to the component
     * @param Component $component
     * @return object
     */
    public function setComponent($component) {

        // Overrides existing component if existing
        foreach ($this->getComponents() as $index => $_component) {

            if ($_component == $component) {

                $this->components[$index] = $component;

                return $this;
            }
        }

        return $this->addComponent($component);
    }

    /**
     * Sets an array of child components to the component
     * @param array $components
     * @return object
     */
    public function setComponents(array $components) {

        foreach ($components as $component) {

            $this->addComponent($component);
        }

        return $this;
    }

    /**
     * Sets the style loader of the component
     * @param object $styleLoader
     * @return object
     */
    public function setStyleLoader($styleLoader) {

        if (!is_null($styleLoader)) {

            $this->styleLoader = $styleLoader;
        }

        return $this;
    }

    /**
     * Gets the name of the component
     * @return string
     */
    public function getName() {

        return $this->name;
    }

    /**
     * Gets a specific child component from the component
     * @param string $name
     * @return object
     */
    public function getComponent($name) {

        $component = null;

        foreach ($this->getComponents() as $_component) {

            if ($_component->getName() == $name) {

                $component = $_component;
                break;
            }
        }

        return $component;
    }

    /**
     * Gets an array of child components from the component
     * @return array
     */
    public function getComponents() {

        return $this->components;
    }

    /**
     * Gets the style loader of the component
     * @return object
     */
    public function getStyleLoader() {

        if (!($styleLoader = $this->styleLoader)) {

            $styleLoader = new StyleLoader;
        }

        return $styleLoader;
    }

    /**
     * Creates an HTML elements of all components
     * @return string
     */
    public function renderComponents() {

        $html = '';

        foreach ($this->getComponents() as $component) {

            $html .= $component->render();
        }

        return $html;
    }

    /**
     * Gets the CSS style of the component
     * @return string
     */
    public function getStyle() {

        $style = '';

        if ($loader = $this->getStyleLoader()) {

            $style = $loader::load($this->getName());
        }

        return $style;
    }

    /**
     * Creates an HTML element of the component
     * @return string
     */
    public function render() {

        return $this->getStyle() . parent::render();
    }
}