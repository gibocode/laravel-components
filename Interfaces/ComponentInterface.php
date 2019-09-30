<?php

/**
 * Component Interface
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelUiComponents\Interfaces;

interface ComponentInterface {

    /**
     * Sets the name of the component
     * @param string $name
     */
    public function setName($name);

    /**
     * Adds a new child component to the component
     * @param \Gibocode\LaravelAdmin\Component $component
     */
    public function addComponent($component);

    /**
     * Overrides an existing childe component or adds a new child component to the component
     * @param \Gibocode\LaravelAdmin\Component $component
     */
    public function setComponent($component);

    /**
     * Sets an array of child components to the component
     * @param array $components
     */
    public function setComponents(array $components);

    /**
     * Sets the style loader of the component
     * @param object $styleLoader
     */
    public function setStyleLoader($styleLoader);

    /**
     * Gets the name of the component
     */
    public function getName();

    /**
     * Gets a specific child component from the component
     * @param string $name
     */
    public function getComponent($name);

    /**
     * Gets an array of child components from the component
     */
    public function getComponents();

    /**
     * Gets the style loader of the component
     * @return object
     */
    public function getStyleLoader();

    /**
     * Creates an HTML elements of all components
     */
    public function renderComponents();

    /**
     * Gets the CSS style of the component
     */
    public function getStyle();

    /**
     * Creates an HTML element of the component
     */
    public function render();
}