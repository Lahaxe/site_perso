<?php

    class ItemDiplome {
		// Membres
        var $_name;
        var $_text1;
        var $_text2;
        var $_school;
        var $_school_url;
        var $_year;
        var $_picture1;
        var $_picture2;
        
		// Constructeur
		function ItemDiplome ($name, $text1, $text2, $school, $school_url, 
                              $year, $picture1, $picture2) 
		{
            $this->_name = $name;
            $this->_text1 = $text1;
            $this->_text2 = $text2;
            $this->_school = $school;
            $this->_school_url = $school_url;
            $this->_year = $year;
            $this->_picture1 = $picture1;
            $this->_picture2 = $picture2;
		}
        
        function print_($tab)
        {
            $tabulation = get_tabulation($tab);
            
            echo_line("<div id=\"diplome\">", add_tabulation($tabulation));
            echo_line("<table>", add_tabulation($tabulation));
            echo_line("<tr>", add_tabulation($tabulation));
            echo_line("<td class=\"annee\" colspan=\"3\">".$this->_year."</td>", add_tabulation($tabulation));
            echo_line("</tr>", remove_tabulation($tabulation));
            echo_line("<tr>", $tabulation);
            if ($this->_picture1 == "")
            {
                echo_line("<td class=\"image\"></td>", add_tabulation($tabulation));
            }
            else
            {
                echo_line("<td class=\"image\"><img src=\"".$this->_picture1."\" alt=\"".$this->_name."\" title=\"".$this->_name."\" /></td>", add_tabulation($tabulation));
            }
            echo_line("<td class=\"titre\">".$this->_text1."</td>", $tabulation);
            echo_line("<td class=\"image\"></td>", $tabulation);
            echo_line("</tr>", remove_tabulation($tabulation));
            echo_line("<tr>", $tabulation);
            echo_line("<td class=\"image\"></td>", add_tabulation($tabulation));
            echo_line("<td><a href=\"".$this->_school_url."\" title=\"".$this->_school."\">".$this->_text2."</a></td>", $tabulation);
            if ($this->_picture2 == "")
            {
                echo_line("<td class=\"image\"></td>", $tabulation);
            }
            else
            {
                echo_line("<td class=\"image\"><img src=\"".$this->_picture2."\" alt=\"".$this->_school."\" title=\"".$this->_school."\" /></td>", $tabulation);
            }
            echo_line("</tr>", remove_tabulation($tabulation));
            echo_line("</table>", remove_tabulation($tabulation));
            echo_line("</div>", remove_tabulation($tabulation));
        }
    }

?>