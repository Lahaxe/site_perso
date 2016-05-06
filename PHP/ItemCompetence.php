<?php
    require_once "tools.php";

	class ItemCompetence {
		// Membres
		var $_name;
		var $_level;
        var $_level_string;
        
		// Constructeur
		function ItemCompetence ($name, $level) 
		{
			$this->_name = $name;
			$this->_level = $level;
            
            switch ($level)
            {
                case 1:
                    $this->_level_string = "Débutant";
                    break;
                case 2:
                    $this->_level_string = "Fonctionnel";
                    break;
                case 3:
                    $this->_level_string = "Maîtrise";
                    break;
                case 4:
                    $this->_level_string = "Expertise";
                    break;
                case 5:
                    $this->_level_string = "Excellence";
                    break;
                default:
                    $this->_level_string = "Erreur";
            }
		}
        
        function print_($tab)
        {
            $tabulation = get_tabulation($tab);
            
            echo_line("<tr>", add_tabulation($tabulation));
            echo_line("<td>".$this->_name."</td>", add_tabulation($tabulation));
            for ($i = 1; $i <= 5; $i++)
            {
                if ($i <= $this->_level)
                {
                    echo_line("<td><img src=\"images/etoile.png\" alt=\"+\" title=\"".$this->_level_string."\" /></td>", $tabulation);
                }
                else
                {
                    echo_line("<td><img src=\"images/etoile_vide.png\" alt=\" \" title=\"".$this->_level_string."\" /></td>", $tabulation);
                }
            }
            echo_line("</tr>", remove_tabulation($tabulation));
        }
    }

?>