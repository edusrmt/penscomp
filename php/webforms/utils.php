<?php

function wfselectBox( $name, $pairs, $default){
    print "<select name=\"".$name."\" >";
    foreach ( $pairs as $value=>$text ){
        print "<option value=\"".$value."\"";
        if( $value == $default ) print " selected";
        print ">".$text."</option>";
    }
    print "</select>";
}

function wfsubmitButton($name, $value ){
    print "<input type=\"submit\" name=\"".$name."\" value=\"".$value."\"/>";
}