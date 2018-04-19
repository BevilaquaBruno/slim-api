<?php
/**
 * validation functions
 */
class ValidationFunctions
{
  function remove_special_caracters($item)
  {
    $what = array('-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º','.',']','[','{','}','_','+','*','¬','¨','1','2','3','4','5','6','7','8','9','0','§','@');
    $by   = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
    $complete_item =  str_replace($what, $by, $item);
    return($complete_item);
  }

  function validate_email($item){
    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    $complete_email = preg_match($er, $item);
    return ($complete_email)? $complete_email : false;
  }
}
