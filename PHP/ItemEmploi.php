<?php
    require_once "tools.php";

	class ItemEmploi {
		// Membres
		var $_name;         // string: nom de la boite
        var $_job;          // string: poste occupé
        var $_location;     // string: ville
		var $_link;         // string: lien vers le site de la boite
		var $_picture;      // string: image/logo de la boite
        var $_from;         // string: début du job
        var $_to;           // string: fin du job
        var $_description;  // string: description du poste
        var $_missions;     // array of ItemEmploi: missions effectuées
        var $_ismission;    // boolean: indique si c'est une mission ou un emploi
        var $_isfirst;      // boolean: indique s'il s'agit de la première mission
        
		// Constructeur
		function ItemEmploi ($name, $job, $location, $link, $picture, $from, $to, $description, $missions = array(), $ismission = false) 
		{
			$this->_name = $name;
			$this->_job = $job;
			$this->_location = $location;
			$this->_link = $link;
			$this->_picture = $picture;
			$this->_from = $from;
			$this->_to = $to;
			$this->_description = $description;
			$this->_missions = $missions;
            $this->_ismission = $ismission;
            $this->_isfirst = true;
		}
        
        function print_($tab)
        {
            $tabulation = get_tabulation($tab);
            
            if ($this->_ismission)
            {
                $classe = "first";
                if (!$this->_isfirst)
                {
                    $classe = "notfirst";
                }
                echo_line("<div id=\"mission\" class=\"".$classe."\">", add_tabulation($tabulation));
            }
            else
            {
                echo_line("<div id=\"emploi\">", add_tabulation($tabulation));
            }
            echo_line("<div id=\"emploi_logo\">", add_tabulation($tabulation));
            echo_line("<img src=\"".$this->_picture."\" />", add_tabulation($tabulation));
            echo_line("</div>", remove_tabulation($tabulation));
            echo_line("<div id=\"emploi_description\">", $tabulation);
            echo_line("<div>", add_tabulation($tabulation));
            echo_line("<table>", add_tabulation($tabulation));
            echo_line("<tr>", add_tabulation($tabulation));
            echo_line("<td class=\"td_boite\"><a href=\"".$this->_link."\">".$this->_name."</a></td>", add_tabulation($tabulation));
            echo_line("<td class=\"td_lieux\">".$this->_location."</td>", $tabulation);
            echo_line("<td class=\"td_duree\">".$this->_from." - ".$this->_to."</td>", $tabulation);
            echo_line("</tr>", remove_tabulation($tabulation));
            echo_line("<tr>", $tabulation);
            echo_line("<td colspan=\"3\">".$this->_job." : ".$this->_description."</td>", add_tabulation($tabulation));
            echo_line("</tr>", remove_tabulation($tabulation));
            echo_line("</table>", remove_tabulation($tabulation));
            echo_line("</div>", remove_tabulation($tabulation));
            // Affichage des missions
            $firstmission = true;
            foreach ($this->_missions as $mission)
            {
                $mission->_isfirst = $firstmission;
                $mission->_ismission = true;
                $mission->print_($tab+2);
                
                $firstmission = false;
            }
            echo_line("</div>", remove_tabulation($tabulation));
            echo_line("</div>", remove_tabulation($tabulation));
        }
    }
    
?>