<?php
    /*  autoload.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        edited: Aug 17, 2013
        desc: autoload classes
    */
    
    function __autoload($class) {
        require("classes/".strtolower($class).".php");
    }
?>
