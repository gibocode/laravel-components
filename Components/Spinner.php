<?php

/**
 * Spinner Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelUiComponents\Components;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelUiComponents\Component;

class Spinner extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'spinner';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * Spinner Component Class Constructor
     * 
     * @return void
     */
    public function __construct() {

        $this->addAttribute(new Attribute('class', $this->getClass()));
        $this->addComponent(new Element($this::ELEMENT_NAME));

        parent::__construct($this::NAME, $this::ELEMENT_NAME);
    }

    /**
     * Gets the class of the spinner
     * @return string
     */
    public function getClass() {

        return $this::NAME;
    }

    /**
     * Creates a spinner object
     * @return Spinner
     */
    public static function create() {

        return new self;
    }
}