<?php
require '../bootstrap.php';

use app\classes\Uri;


use core\Controller;

try{

    $controller = new Controller;
    $load_result = $controller->load();
    dd($load_result);
    
} catch (Exception$e){
    
dd($e->getMessage());


}


//$method = new Method;
//$method ->$getmethod();

//$parameters = new Parameters;
//$Parameters ->$getparameters();

//$controller -> $method($parameters);
