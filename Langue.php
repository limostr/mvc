<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 29/12/2018
 * Time: 19:40
 */

namespace mvc;
use  Application;
use  Configuration;

abstract class Langue
{
    public static function getString($Name,$_Lang=""){
      //echo configuration::$_config['lang'];
        $lang= !empty($_Lang) ? $_Lang : configuration::$_config['lang'];
        if(file_exists(dirname(__FILE__)."/../blocapp/modules/".Application::$Module."/Lang/".$lang.".php")){
          include (dirname(__FILE__)."/../blocapp/modules/".Application::$Module."/Lang/".$lang.".php");
            return isset($_Lang[$Name]) ? $_Lang[$Name] : $Name;
        }else{
          //include (dirname(__FILE__)."/../../blocapp/modules/".Application::$Module."/Lang/".$lang.".php");
            return $Name;
        }
    }
}
