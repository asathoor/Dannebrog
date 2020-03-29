<?php
/** 
 * DANSKE FLAGDAGE
 * Af: Per Thykjaer Jensen, lektor
 * Beskrivelse: Printer danske flagdage til en webside via PHP.
 *
 * Udviklet til gavn for Danmarks-Samfundet.
 * Tak til Erik Dam for oplysninger om militære flagdage.
 *
 * Version: 2.0 Danske Flagdage.
 *
 * Changes
 * Version 2.0 - String literal errors fixed.
 * Version 1.0 - Militære flagdage tilføjet efter oplysninger fra Erik Dam.
 * Version 0.2 - denne version kan beregne kirkelige flagdage baseret på påskedag.
 * 0.11 - Dannebrog som .gif af hensyn til kompabilitet.
 * Version 0.1 - basal funktionalitet. På flagdage med fast dato vises et flag.
 *
 * Date: 20170216
 * Copyright: GPLv3 - se licensen her: http://www.gnu.org/copyleft/gpl.html
*/
class flagDag {

	public function dag($dato, $maaned, $hvad) {
				
				// Hoist the flag
				if (date('m') == $maaned && date('d') == $dato) {
					echo '<img id="Dannebrog" src="' . plugins_url( 'Flag_of_Denmark.svg', __FILE__ ) . '" > ';	
					echo "<p class='dannebrogBegivenhed'>" . $hvad . "</p>";
				}
			}

            /*
			// Easter Calculations
			function fePaaske($tid, $hvad) {

                //
                
                //
				$date = date("Y-m-d", easter_date(  )); // easter
				$newdate = strtotime ( $tid, strtotime ( $date ) ) ; // calculations
				$newdate = date ( 'd,m' , $newdate ); // date format
                //

			 	return $newdate . "," . $hvad; // returns the date and the occation
			}
            */
            
}

$ny = new flagDag(); // Instantiate the class.

/**
 * Official Danish Flag Days
 */
$ny->dag(1,1,"Nytårsdag");
$ny->dag(5,2,"H.K.H. Kronprinsesse Mary");
$ny->dag(6,2,"H.K.H. Prinsesse Marie");
$ny->dag(9,4,"Danmarks besættelse. Der flages på halv stang til kl. 12:00.");
$ny->dag(16,4,"H.K.H. Dronning Margrethe II.");
$ny->dag(29,4,"H.K.H. Prinsesse Benedikte.");
$ny->dag(5,5,"Danmarks befrielse 1945.");
$ny->dag(26,5,"H.K.H. Kronprins Frederik.");
$ny->dag(5,6,"Grundlovsdag (1849).");
$ny->dag(7,6,"H.K.H. Prins Joachim"); // protektor for Danmarks-Samfundet
$ny->dag(11,6,"H.K.H. Prinsgemal Henrik.");
$ny->dag(15,6,"Valdemarsdag og Genforeningen (1920)");
$ny->dag(5,9,"H.K.H. Prins Joachim");

/**
 * Navy and Army Flag Days
 */
$ny->dag(29,1,"Søværnet: Holmens Hæderstegn.");
$ny->dag(02,2,"Søværnet og hæren: Kampen ved Mysunde (1864).");
$ny->dag(11,2,"Søværnet og hæren: Stormen på København (1659).");
$ny->dag(11,3,"Søværnet, Hæren og Flyvevåbnet: Flyvevåbnets og forsvarets hæderstegns indstiftelsesdag 1953.");
$ny->dag(02,4,"Søværnet: Slaget på Rheden (1801).");
$ny->dag(9,4,"Danmarks besættelse (1940)");
$ny->dag(18,4,"Slaget ved Dybbøl (1864)");
$ny->dag(5,5,"Danmarks befrielse 1945");
$ny->dag(9,5,"Søværnet: Kampen ved Helgoland (1864)");
$ny->dag(27,5,"Flyvevåbnet: Underskrift af forsvarslovene herunder lov om flyvevåbnets oprettelse (1950).");
$ny->dag(1,6,"Søværnet: Slaget ved Øland og Møn (1676 og 1677).");
$ny->dag(5,6,"Grundlovsdag. Kampen ved Dybbøl (1848).");
$ny->dag(15,6,"Valdemarsdag. Slaget ved Reval (1219). Genforeningsdagen (1920)");
$ny->dag(1,7,"Søværnet: Slaget i Køge Bugt (1677).");
$ny->dag(6,7,"Hæren og Søværnet: Slaget ved Fredericia (1849).");
$ny->dag(8,7,"Søværnet: Slaget ved Dynekillen (1716).");
$ny->dag(25,7,"Hæren og Søværnet: Slaget ved Isted (1850).");
$ny->dag(26,7,"Søværnet: Erobringen af Marstrand (1719).");
$ny->dag(5,8,"Hæren, Søværnet og Luftvåbnet: Hædring af Danmarks Udsendte.");
$ny->dag(1,10,"Flyvevåbnets oprettelse (1950).");
$ny->dag(4,10,"Hæren og Søværnet: Stormen på Frederiksstad 1850. Kampen i Køge bugt 1710.");

/* Easter Calculations

KIRKELIGE FLAGDAGE
De "skæve" kirkelige helligdage følger en månekaldender og falder et antal dage efter en bestemt fuldmåne.
Udgangspunktet for beregningerne er påskedag.

Systemet ser sådan ud:

	Palmesøndag - søndagen før påske (påske minus en uge)
	Skærtorsdag - påske søndag minus 3 dage (Halv stang t. kl. 12:00)
	1. påskedag - påskesøndagen
	2. påskedag -  påske søndag + en dag
	Store Bededag - 4. fredag efter påske
	1. pinsedag -  7. søndag efter påske
	2. pinsedag - pinsedag + 1dag
	1. juledag - fast dato 25.12.
	2. juledag - fast dato 26.12.

Eftersom de skæve helligdage afhænger af påsken og månen så er PHPs påskeberegning et udgangspunkt for tidsberegningerne

Substrings fra datoformatteringen, ide til:
//$dag = substr($newdate, 0, 2); // returnerer 01 --> 31
//$maaned = substr($newdate, 3, 4); // returnerer 01 --> 12
*/

/*
$kadosh = array(
	$ny->fePaaske("-1 weeks", "Palmesøndag"), // Palmesøndag
	$ny->fePaaske("-3 days", "Skærtorsdag"), // Skærtorsdag
	$ny->fePaaske("+0 days", "1. Påskedag"), // 1. Påskedag (fuldmåne efter equinox)
	$ny->fePaaske("+1 days", "2. Påskedag"), // 2. Påskedag
	$ny->fePaaske("+5 days +3 weeks", "Store Bededag"), // Store Bededag
	$ny->fePaaske("-3 days +6 weeks","Kristi Himmelfart"), // Kristi Himmelfart
	$ny->fePaaske("+7 weeks", "1. Pinsedag"), // 1. Pinsedag
	$ny->fePaaske("+7 weeks +1 days", "2. Pinsedag") // 2. Pinsedag
	);

$i = 0; // looper derefter gennem kadosh-arrayet og kombinerer ny->dag med ny->fePaaske
*/

/*
while($i < count($kadosh))
	{
	$ny->dag(
		(int)substr($kadosh[$i],0,2), // dag substring som integer
		(int)substr($kadosh[$i],3,4), // måned substring som integer
		substr($kadosh[$i],6) // hvad (pladrer strengen ud fra 6. karakter)
		);
	$i++;
	};
*/

$ny->dag(25,12,"1. Juledag."); // helligdage med fast dato
$ny->dag(26,12,"2. Juledag.");

/**
 * YOUR PERSONAL FLAG DAYS
 * In Denmark we celebrate birthdays and personal special days by hoisting the flag. 
 * From here you can use the class to enter private flag days
 * Format: "dd,mm, begivenhed"
 * Example: $ny->dag(3,6,"test");
 * You also might want to change the file and name referred to in $flagstang. 
 * Simply change the file  name Flag_of_Denmark.svg to something better.
*/

//$ny->dag(27,2,"Per's birthday");
//$ny->dag(27,2,"Susanne's birthday");
//$ny->dag(3,8,"Ruths fødselsdag");

$ny->dag(29,3,"<p>Nu med Dannebrog</p>");

/**
 * Test or Debug
 */
//$ny->dag(17,2,'Frodo went back to the shire.'); // use today ;-)
?>
