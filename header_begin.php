<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<?php
    if (isset($_GET['lang'])) 
    {
        $lang = $_GET['lang'];
    } 
    else 
    {
        $lang = "fr";
    }
    
    switch ($lang) 
    {
        case 'fr':
            require_once 'lang_fr.php';
            break;
        case 'en':
            require_once 'lang_en.php';
            break;
    }
?>

<head>
    <title><?php echo constant("TITLE"); ?></title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?php echo constant("DESCRIPTION"); ?>" />  
    <meta name="robots" content="index" /> 
    <meta name="revisit-after" content="7 days" /> 
    <meta name="copyright" content="© Lahaxe Romain" /> 
    <meta name="keywords" content="Lahaxe, Romain, Ingénieur, Cognitique, Ergonomie, Développement, IHM, interface, C++, Qt, C#" /> 

    <link rel="stylesheet" media="screen" type="text/css" title="design" href="CSS/style_main.css" />
    <script src="JavaScript/lib/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    <link rel="canonical" href="http://rom.lahaxe.free.fr" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/gif" href="favicon.gif" />
    