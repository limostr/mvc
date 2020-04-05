<?php


namespace mvc;
 
abstract class Template
{

  public static function MenuBar($Menu,$role){
    $Menu=
      "<div class=\"collapse navbar-collapse pull-left\" id=\"navbar-collapse\">

          <ul class=\"nav navbar-nav\">";

          foreach ($Menu as $key => $m){

          }

    $Menu="
          </ul>

        </div>
     ";
  }
  public static function hasRole($Role,$r){
    if(empty($Role)){
      return true;
    }
    if(isset($Role[$r])){
      return true;
    }else{
      return false;
    }

  }

    public static function LI($Menu,$r=""){
      $HasRole=self::hasRole($Menu,$r);
      if(isset($Menu['dropdown']) && $Menu['dropdown']){


      }else{

      }
    }

    public static function UL($Menu){

    }
}
