<?php

namespace MyApp;

class Controller
{
    private $_values;

    public function __construct()
    {
        $this->_values = new \stdClass();
    }

    protected function setValues($key, $value)
    {
        $this->_values->$key = $value;
    }

    public function getValues()
    {
        return $this->_values;
    }
}
