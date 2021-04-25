<?php

function db($dato, $opc=''){
    
    if($opc === 'dump'){
        echo "<pre>--Dump--<br>";
         var_dump($dato);
        echo "</pre>";
    }
    elseif($opc === ''){
        echo "<pre>--Print--<br>";
        echo $dato;
        echo "</pre>";
    }
}

function dbx($dato, $opc=''){
    
    if($opc === 'dump'){
        echo "<pre>--Dump--<br>";
         var_dump($dato);
        echo "</pre>";
        exit(0);
    }
    elseif($opc === ''){
        echo "<pre>--Print--<br>";
        echo $dato;
        echo "</pre>";}
        exit(0);
}