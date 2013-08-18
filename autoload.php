<?php
    /*  autoload.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        edited: Aug 17, 2013
        desc: autoload classes
    */
    
    //TODO 3 -o wawi -c transform: transform function so that it will be flexible in any folders
    
    include('inc/wawlib.php');
    
    function __autoload($class) {
        $path = "class/".strtolower($class).".php";
        
        if(is_file($path)) {
            require $path;
            return true;
        }
        return false;
    }
?>
