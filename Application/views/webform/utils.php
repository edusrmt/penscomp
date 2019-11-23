<?php
function wfSelectBox($name, $pairs, $class = null , $default = null){
    print "<select name=\"".$name."\"";
    if( !is_null( $class ) ) print " class=\"$class\" ";
    print">";
    foreach ( $pairs as $value=>$text ){
        print "<option value=\"".$value."\"";
        if( !is_null($default) ) if( $value == $default ) print " selected";
        print ">".$text."</option>";
    }
    print "</select>";
}

//NÃO ESTÁ SENDO MAIS UTILIZADA
function wfSubmitButton($name, $value ){
    print "<input type=\"submit\" name=\"".$name."\" value=\"".$value."\"/>";
}

function wfInput( $name, $type, $value = null , $class = null, bool $disabled = false ){
    print "<input name=\"$name\" type=\"$type\"";
    if( !is_null($value)) print " value=\"$value\"";
    if( !is_null($class) ) print " class=\"$class\"";
    if( $disabled ) print " disabled";
    print " >";
}

function wfTextArea($name, $value = null, $class=null, $rows= null, $cols =null ){
    print "<textarea name=\"$name\"";
    if( !is_null($class) ) print " class=\"$class\"";
    if( !is_null($rows) ) print " rows=$rows";
    if( !is_null($cols) ) print " cols=$cols";
    print " >";
    if( !is_null($value) ) print $value;
    print "</textarea>";
}
function wfButton( $name, $type = "button", $text = null, $value = null, $class = null, bool $disabled = false, $form = null, $formaction = null, $formmethod = null){
    print "<button name=\"$name\" type=\"$type\"";
    if( !is_null( $value ) ) print " value=\"$value\"";
    if( !is_null( $class ) ) print " class=\"$class\"";
    if( !is_null($form) ) print " form=\"$form\"";
    if( !is_null($formaction) ) print " formaction=\"$formaction\"";
    if( !is_null($formmethod) ) print " formmethod=\"$formmethod\"";
    if($disabled) print " disabled";
    print ">";
    if( !is_null($text) ) print $text;
    print "</button>";
}

function wfHyperLinkA($value, $link = null, $class = null){
    print "<a ";
    if( isset($link) || !is_null($link) ) print " href=\"$link\" ";
    if( !is_null($class)) print " class=\"$class\"";
    print ">$value</a>";
}

function wfInputText($name, $size = null, $maxLength = null)
{
    print "<input type=\"text\" name=\"$name\" size=$size maxlength=$maxLength/>";
}
