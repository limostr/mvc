<?php
namespace  mvc;
use  View;

class Controller{

    protected $vue;


    public function __construct()
    {
        $this->vue = new View();
    }

    public function _getRequest($paramname,$default=""){

        return (isset($_REQUEST[$paramname]) && !empty($_REQUEST[$paramname]))  ? $_REQUEST[$paramname]: $default;

    }



}