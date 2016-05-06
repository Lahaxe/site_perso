<?php

define("TABULATION", "    ");
define("END_LINE", "\r\n");

function get_tabulation($tab)
{
    $tabulation = "";
    for ($i = 0; $i < $tab; $i++)
    {
        $tabulation .= constant("TABULATION");
    }
    
    return $tabulation;
}

function add_tabulation(&$tabulation)
{
    $tabulation .= constant("TABULATION");
    return $tabulation;
}

function remove_tabulation(&$text)
{
    $text = substr($text, 0, -strlen(constant("TABULATION")));
    return $text;
}

function echo_line($line, $tabulation)
{
    echo $tabulation.$line.constant("END_LINE");
}

?>