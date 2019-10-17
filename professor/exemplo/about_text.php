<?php
    function wfRadioButtons($name, $pairs, $default, $separator){
        foreach ( $pairs as $text=>$value){
            print "<input type=\"radio\" name=\"".$name."\"value=\"".$value."\"";
            if($text==$default) print " checked";
            print ">".$text.$separator;
        }
    }

    $pairs = array("a"=>2, "b"=>0, "c"=>1, "d"=>0);

    wfRadioButtons("question4",$pairs,"b"," ");