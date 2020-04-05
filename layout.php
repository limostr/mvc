<?php

/**
 * Created by PhpStorm.
 * User:qq
 * Date:
 * Time:
 */
//include_once dirname(__FILE__) . "/Application.php";
namespace  mvc;
class layout
{
    protected $layoutname ;
    protected $view;
    public function __construct()
    {
        $this->layoutname="layout";
    }

    public function setlayout($layoutname="layout"){
        $this->layoutname=$layoutname;
    }
    public function generate(&$view)
    {
        $this->view=$view;
        if(!file_exists(dirname(__FILE__)."/../../blocapp/views/layout/".$this->layoutname.".phtml")){
            throw new \Exception("Le fichier ".$this->layoutname." de calque de sortie n'existe pas pour ");
            die();
        }
        include_once dirname(__FILE__)."/../../blocapp/views/layout/".$this->layoutname.".phtml";

    }
}