<?php
    require_once "tools.php";

	class ItemReseauSocial {
		// Membres
		var $_name;
		var $_link;
		var $_picture;
        
		// Constructeur
		function ItemReseauSocial ($name, $link, $picture) 
		{
			$this->_name = $name;
			$this->_link = $link;
			$this->_picture = $picture;
		}
        
        function print_($tab)
        {
            $tabulation = get_tabulation($tab);
            
            echo_line("<td class=\"social\">", add_tabulation($tabulation));
            echo_line("<a href=\"".$this->_link."\" title=\"".$this->_name."\">", add_tabulation($tabulation));
            echo_line("<div id=\"rsocial\">", add_tabulation($tabulation));
            echo_line("<img src=\"".$this->_picture."\" alt=\"".$this->_name."\" title=\"".$this->_name."\" />", add_tabulation($tabulation));
            echo_line("</div>", remove_tabulation($tabulation));
            echo_line("</a>", remove_tabulation($tabulation));
            echo_line("</td>", remove_tabulation($tabulation));
        }
    }
    
?>