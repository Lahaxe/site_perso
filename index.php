<?php
    require_once "header_begin.php";
    
    // Ajouter ici les feuilles de style spécifiques
    
    require_once "header_end.php";

    require_once "menu.php";
    
    require_once "PHP/ItemCompetence.php";
    require_once "PHP/ItemDiplome.php";
    require_once "PHP/ItemEmploi.php";
    require_once "PHP/ItemReseauSocial.php";
?>

    <div id="corps">

    <!-- _____________________________________________________________________ -->

    <div id="language">
        <form method="get" action="index.php">
            <input name="lang" type="hidden" value="<?php echo $lang; ?>">
            <a href="#" onclick="document.forms[0].lang.value='fr'; document.forms[0].submit();"><img src="images/fr.png" alt="fr" title="Français"></a>
            <a href="#" onclick="document.forms[0].lang.value='en'; document.forms[0].submit();"><img src="images/en.png" alt="en" title="English"></a>
        </form>
    </div>
    
    <div id="info_perso">
        <div id="content" class="information">
            <h1><?php echo constant("PERSONAL_SECTION"); ?></h1>
            <table class="table_info_perso">
                <tr>
                    <td class="image"><img src="images/personne.svg" title="Romain" /></td>
                    <td class="gauche"><b>LAHAXE Romain</b></td>
                    <td class="image"><img src="images/email.svg" title="Adresse E-mail" /></td>
                    <td class="droite"><a href="mailto:rom.lahaxe@gmail.com">rom.lahaxe[at]gmail.com</a></td>
                </tr>
                <tr>
                    <td class="image" rowspan=2><img src="images/carte.svg" title="Adresse" /></td>
                    <td class="gauche">42 rue des Pyramides</td>
                    <td class="image"><img src="images/telephone.svg" title="Téléphone" /></td>
                    <td class="droite"><b>+33(0)6 28 71 39 29</b></td>
                </tr>
                <tr>
                    <td>59 000 Lille</td>
                    <td class="image"><img src="images/site_web.svg" title="Mon site Web" /></td>
                    <td class="droite"><a href="http://rom.lahaxe.free.fr">rom.lahaxe.free.fr</a></td>
                </tr>
                <tr>
                    <td class="image"><img src="images/calendrier.svg" title="Date de naissance" /></td>
                    <td class="gauche"><?php echo constant("PERS_BIRTH"); ?></td>
                    <td class="image"></td>
                    <td class="droite"></td>
                </tr>
            </table>
            <table>
                <tr>
<?php
$item2 = new ItemReseauSocial("LinkedIn", "https://fr.linkedin.com/in/romain-lahaxe-18565a84", "images/linkedin.svg");
$item2->print_(4);

$item3 = new ItemReseauSocial("GitHub", "https://github.com/Lahaxe", "images/github.png");
$item3->print_(4);
?>
                </tr>
            </table>
        </div>
        <div id="content" class="photo">
            <img src="images/romain.jpg" alt="Ma Photo" title="Romain" />
            <p><?php echo constant("ROLE_SECTION"); ?></p>
        </div>
    </div>

    <div id="formation">
        <div id="content" class="formation">
<?php
$diplome4 = new ItemDiplome(constant("FORM_AGILE"), constant("FORM_AGIL_TITLE"), 
                            "",
                            "", "https://www.ensc.fr/",
                            "2019", "", "");
$diplome4->print_(2);

$diplome3 = new ItemDiplome(constant("FORM_INGENIEUR"), constant("FORM_INGE_TITLE"), 
                            "Ecole Nationale Supérieure de Cognitique<br/>Bordeaux (33)",
                            "Ecole Nationale Supérieure de Cognitique", "https://www.ensc.fr/",
                            "2010", "images/ingenieur.png", "images/ensc.png");
$diplome3->print_(2);

$diplome2 = new ItemDiplome(constant("FORM_PREPA"), constant("FORM_PREP_TITLE"), 
                            "Lycée Georges de la Tour<br/>Metz (57)",
                            "Lycée Georges de la Tour", "http://www4.ac-nancy-metz.fr/lyc-georges-de-la-tour-metz/",
                            "2007", "", "");
$diplome2->print_(2);

$diplome1 = new ItemDiplome(constant("FORM_BACS"), constant("FORM_BACS_TITLE"), 
                            "Lycée Louis de Cormontaigne<br/>Metz (57)",
                            "Lycée Cormontaigne", "http://www.lycee-cormontaigne-metz.fr/site/",
                            "2005", "images/baccalaureat_s.png", "");
$diplome1->print_(2);
?>
        </div>
    </div>

    <div id="experience">
        <div id="content" class="experience">
            <h1><?php echo constant("EXPERIENCE_SECTION"); ?></h1>
<?php
date_default_timezone_set('Europe/Paris');

$hrteam_mission1 = new ItemEmploi("Leroy Merlin", constant("EXPE_HRTEAM_LM"), "Lezennes (59)", 
                                  "http://www.leroymerlin.fr/", "images/leroymerlin.png", 
                                  "2017-10-01", null,
                                  constant("EXPE_HRTEAM_LM_MISSION"), 
                                  array(), true);
                                  
$hrteam_mission2 = new ItemEmploi("Piivo", constant("EXPE_HRTEAM_PIIVO"), "Tournai (Belgique)", 
                                  "http://www.piivo.com/", "images/piivo.png", 
                                  "2016-04-01", "2017-10-01", 
                                  constant("EXPE_HRTEAM_PIIVO_MISSION"), 
                                  array(), true);
                                  
$hrteam_mission3 = new ItemEmploi("Saint-Maclou", constant("EXPE_HRTEAM_STMACLOU"), "Wattrelos (59)", 
                                  "http://www.saint-maclou.com/", "images/stmaclou.png", 
                                  "2016-01-01", "2016-04-11", 
                                  constant("EXPE_HRTEAM_STMACLOU_MISSION"), 
                                  array(), true);
                                  
$hrteam = new ItemEmploi(constant("EXPE_HRTEAM"), constant("EXPE_HRTEAM_TITLE"), "Lille (59)", "http://www.hr-team.net/",
                         "images/hrteam.png", "2016-01-01", null,
                         "", array($hrteam_mission1, $hrteam_mission2, $hrteam_mission3));
$hrteam->print_(2, $lang);

$cnrs = new ItemEmploi(constant("EXPE_CNRS"), constant("EXPE_CNRS_TITLE"), "Strasbourg (67)", "http://www.cnrs.fr/",
                       "images/cnrs.png", "2014-05-01", "2016-01-01",
                       constant("EXPE_CNRS_MISSION"));
$cnrs->print_(2, $lang);

$akka_mission1 = new ItemEmploi("Nexter Systems", constant("EXPE_AKKA_NEXTER"), "Guyancourt (78)", 
                                "http://www.nexter-group.fr/", "images/nexter.png", 
                                "2011-11-01", "2014-05-11", 
                                constant("EXPE_AKKA_NEXTER_MISSION"), 
                                array(), true);
                                  
$akka_mission2 = new ItemEmploi("Thales Communications & Security", constant("EXPE_AKKA_THALES"), "Gennevilliers (92)", 
                                  "https://www.thalesgroup.com/fr", "images/thales.png", 
                                  "2011-10-01", "2011-11-01", 
                                  constant("EXPE_AKKA_THALES_MISSION"), 
                                  array(), true);
                                  
$akka = new ItemEmploi(constant("EXPE_AKKA"), constant("EXPE_AKKA_TITLE"), "Levallois-Perret (92)", "https://www.akka-technologies.com/",
                       "images/akka.png", "2011-10-01", "2014-05-01",
                       "", array($akka_mission1, $akka_mission2));
$akka->print_(2, $lang);

$incka_mission1 = new ItemEmploi("Safran Morpho", constant("EXPE_INCKA_MORPHO"), "Osny (95)", 
                                "http://www.morpho.com/", "images/morpho.png", 
                                "2010-08-01", "2011-10-01", 
                                constant("EXPE_INCKA_MORPHO_MISSION"), 
                                array(), true);
                                  
$incka = new ItemEmploi(constant("EXPE_INCKA"), constant("EXPE_INCKA_TITLE"), "Boulogne-Billancourt (92)", "http://www.groupeastek.com/fr",
                       "images/incka.png", "2010-08-01", "2011-10-01",
                       "", array($incka_mission1));
$incka->print_(2, $lang);

$ensc_mission1 = new ItemEmploi("Thales Optronique", constant("EXPE_ENSC_THALES"), "Elancourt (78)", 
                                "https://www.thalesgroup.com/fr", "images/thales.png", 
                                "2010-02-01", "2010-08-11", 
                                constant("EXPE_ENSC_THALES_MISSION"), 
                                array(), true);
                                  
$ensc_mission2 = new ItemEmploi("Laboratoire IMF", constant("EXPE_ENSC_LABO"), "Bordeaux (33)", 
                                "http://www.cnrs.fr/", "images/cnrs.png", 
                                "2009-04-01", "2009-07-11", 
                                constant("EXPE_ENSC_LABO_MISSION"), 
                                array(), true);
                                  
$ensc_mission3 = new ItemEmploi("Technic'Ortho", constant("EXPE_ENSC_TECH"), "Lay-Saint-Christophe (54)", 
                                "http://www.technic-ortho.com/", "images/technicortho.png", 
                                "2008-05-01", "2008-07-01", 
                                constant("EXPE_ENSC_TECH_MISSION"), 
                                array(), true);
                                  
$ensc = new ItemEmploi(constant("EXPE_ENSC"), constant("EXPE_ENSC_TITLE"), "Bordeaux (33)", "https://www.ensc.fr/",
                       "images/ensc.png", "2007-09-01", "2010-08-01",
                       "", array($ensc_mission1, $ensc_mission2, $ensc_mission3), false, false);
$ensc->print_(2, $lang);
?>
        </div>
        <div id="content" class="competence">
            <h1><?php echo constant("SKILLS_SECTION"); ?></h1>
            <table>
                <tr>
                    <th class="premier" colspan="6"><?php echo constant("SKIL_TECHNICAL"); ?></th>
                </tr>
<?php
$competence1 = new ItemCompetence("C++", 5);
$competence1->print_(3);

$competence1 = new ItemCompetence("Qt", 4);
$competence1->print_(3);

$competence1 = new ItemCompetence("C#", 4);
$competence1->print_(3);

$competence1 = new ItemCompetence("XAML", 3);
$competence1->print_(3);

$competence1 = new ItemCompetence("Pyhton", 3);
$competence1->print_(3);

$competence1 = new ItemCompetence("HTML - CSS", 3);
$competence1->print_(3);

$competence1 = new ItemCompetence("JavaScript", 3);
$competence1->print_(3);

$competence1 = new ItemCompetence("PHP", 2);
$competence1->print_(3);

$competence1 = new ItemCompetence("Java", 1);
$competence1->print_(3);
?>
                <tr>
                    <th class="nonpremier" colspan="6"><?php echo constant("SKIL_METHODS"); ?></th>
                </tr>
<?php
$competence1 = new ItemCompetence(constant("SKIL_METH_ERGO"), 5);
$competence1->print_(3);

$competence1 = new ItemCompetence(constant("SKIL_METH_AGILE"), 4);
$competence1->print_(3);

$competence1 = new ItemCompetence(constant("SKIL_METH_SCRUM"), 4);
$competence1->print_(3);
?>
                <tr>
                    <th class="nonpremier" colspan="6"><?php echo constant("SKIL_LANGUAGES"); ?></th>
                </tr>
<?php
$competence1 = new ItemCompetence(constant("SKIL_LANG_EN"), 3);
$competence1->print_(3);

$competence1 = new ItemCompetence(constant("SKIL_LANG_DE"), 1);
$competence1->print_(3);
?>
            </table>
        </div>
    </div>

    <!--div id="autres">
        <div id="content" class="loisirs">
        </div>
    </div-->
    
    <!-- _____________________________________________________________________ -->
   
    </div>
   
<?php
    require_once "footer.php";
?>
  