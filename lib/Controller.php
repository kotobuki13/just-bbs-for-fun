<?php

namespace MyApp;

class Controller
{
    private $_values;

    public function __construct()
    {
        $this->_values = new \stdClass();
    }

    protected function setValues($key, $value) // 全投稿をセット
    {
        $this->_values->$key = $value;
    }

    public function getValues() // 全投稿を返す
    {
        return $this->_values;
    }
}
