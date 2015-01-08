<?php
class Twig_F3_Extension extends Twig_Extension {
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    function getName() {
        return "Twig and F3 Extension";
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
     */
    public function getFilters()
    {
        return array();
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array ();
    }

    /**
     * Returns a list of global variables to add to the existing list.
     *
     * @return array An array of global variables
     */
    public function getGlobals()
    {
        return Base::instance()->hive();
    }
}