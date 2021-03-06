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
        var $_displayTime;  // boolean: indique si la durée est affichée
        
		// Constructeur
		function ItemEmploi ($name, $job, $location, $link, $picture, $from, $to, $description, $missions = array(), $ismission = false, $displayTime = true) 
		{
			$this->_name = $name;
			$this->_job = $job;
			$this->_location = $location;
			$this->_link = $link;
			$this->_picture = $picture;
			if ($from ==null) $this->_from = time(); else $this->_from = strtotime($from);
			if ($to ==null) $this->_to = time(); else $this->_to = strtotime($to);
			$this->_description = $description;
			$this->_missions = $missions;
            $this->_ismission = $ismission;
            $this->_displayTime = $displayTime;
		}
        
        function compute_time($lang = 'fr')
        {
            $month_str = 'mois';
            $year_str = 'an';
            $add_s = false;
            switch ($lang) 
            {
                case 'fr':
                    $month_str = 'mois';
                    $year_str = 'an';
                    break;
                case 'en':
                    $month_str = 'mth';
                    $year_str = 'yr';
                    $add_s = true;
                    break;
            }
            
            $years = floor(($this->_to-$this->_from)/31536000);
            $months = floor(($this->_to-$this->_from)/2628000);
            
            $months = $months - $years*12;
            
            $format = '';
            if ($years > 0)
            {
                $format .= $years.' '.$year_str;
                
                if ($years > 1)
                {
                    $format .= 's';
                }
                $format .= ' ';
            }
            $format .= $months.' '.$month_str;
            if ($months > 1 && $add_s)
            {
                $format .= 's';
            }
                
            return $format;
        }
        
        function print_($tab, $lang = 'fr')
        {
            $tabulation = get_tabulation($tab);
            
            $diffTimeStr = $this->compute_time($lang);
            
            if ($this->_ismission)
            {
                echo_line("<tr class=\"mission\">", add_tabulation($tabulation));
                echo_line("<td rowspan=2 class=\"mission_logo\"><img src=\"".$this->_picture."\" /></td>", add_tabulation($tabulation));
                echo_line("<td class=\"td_role\">".$this->_job." <a href=\"".$this->_link."\">".$this->_name."</a></td>", $tabulation);
                echo_line("<td class=\"td_lieux\"><img class=\"picto\" src=\"images/lieu.svg\" title=\"Ville\" />".$this->_location."</td>", $tabulation);
                echo_line("<td class=\"td_duree\"><img class=\"picto\" src=\"images/date.svg\" title=\"".date('F Y', $this->_from)." - ".date('F Y', $this->_to)."\" />".$diffTimeStr."</td>", $tabulation);
                echo_line("</tr>", remove_tabulation($tabulation));
                
                echo_line("<tr class=\"mission\">", $tabulation);
                echo_line("<td colspan=\"3\">".$this->_description."</td>", add_tabulation($tabulation));
                echo_line("</tr>", remove_tabulation($tabulation));
                
                echo_line("<tr class=\"mission_espace\">", $tabulation);
                echo_line("</tr>", $tabulation);
            }
            else
            {
                echo_line("<div id=\"emploi\">", add_tabulation($tabulation));
                echo_line("<table>", add_tabulation($tabulation));
                echo_line("<tbody>", add_tabulation($tabulation));
                
                echo_line("<tr class=\"principal\">", add_tabulation($tabulation));
                
                if (sizeof($this->_missions) > 0)
                {
                    echo_line("<td class=\"emploi_logo\"><img src=\"".$this->_picture."\" /></td>", add_tabulation($tabulation));
                }
                else
                {
                    echo_line("<td rowspan=2 class=\"emploi_logo\"><img src=\"".$this->_picture."\" /></td>", add_tabulation($tabulation));
                }
                
                echo_line("<td class=\"td_role\">".$this->_job." <a href=\"".$this->_link."\">".$this->_name."</a></td>", $tabulation);
                echo_line("<td class=\"td_lieux\"><img class=\"picto\" src=\"images/lieu.svg\" title=\"Ville\" />".$this->_location."</td>", $tabulation);
                if ($this->_displayTime)
                {
                    echo_line("<td class=\"td_duree\"><img class=\"picto\" src=\"images/date.svg\" title=\"".date('F Y', $this->_from)." - ".date('F Y', $this->_to)."\" />".$diffTimeStr."</td>", $tabulation);
                }
                else
                {
                    echo_line("<td class=\"td_duree\"></td>", $tabulation);
                }
                echo_line("</tr>", remove_tabulation($tabulation));
                
                if (sizeof($this->_missions) > 0)
                {
                    foreach ($this->_missions as $mission)
                    {
                        $mission->_ismission = true;
                        $mission->print_($tab+3, $lang);
                    }
                }
                else
                {
                    echo_line("<tr class=\"mission\">", $tabulation);
                    echo_line("<td colspan=\"3\">".$this->_description."</td>", add_tabulation($tabulation));
                    echo_line("</tr>", remove_tabulation($tabulation));
                    
                    echo_line("<tr class=\"mission_espace\">", add_tabulation($tabulation));
                    echo_line("</tr>", remove_tabulation($tabulation));
                }
                
                echo_line("</tbody>", remove_tabulation($tabulation));
                echo_line("</table>", remove_tabulation($tabulation));
                echo_line("</div>", remove_tabulation($tabulation));
            }
        }
    }
    
?>