<?php
/* DANSKE FLAGDAGE
Af: Per Thykjaer Jensen, lektor
Beskrivelse: Printer danske flagdage til en webside via PHP.

Udviklet til gavn for Danmarks-Samfundet.
Tak til Erik Dam for oplysninger om militære flagdage.

Version: 1.0 Danske Flagdage.

Ændringer:
Version 1.0 - Militære flagdage tilføjet efter oplysninger fra Erik Dam.
Version 0.2 - denne version kan beregne kirkelige flagdage baseret på påskedag.
0.11 - Dannebrog som .gif af hensyn til kompabilitet.
Version 0.1 - basal funktionalitet. På flagdage med fast dato vises et flag.

Date: 20120604
Copyright: GPLv3 - se licensen her: http://www.gnu.org/copyleft/gpl.html
*/
class flagDag
{
	// printer hvis dagen er en flagdag
	public function dag($dato, $maaned, $hvad) {
		// undersøger om det er en flagdag
		// $fil = plugin_dir_url(__FILE__) . "minFil.php";
		//$flagstang = "http://www.multimusen.dk/wp-content/plugins/dannebrog/dannebrog.gif"; // flag img path

		$flagstang = plugin_dir_url("dannebrog", __FILE__) . "dannebrog/dannebrog.gif"; // flag img path
		//echo $flagstang;
	
				if (date('m') == $maaned && date('d') == $dato) {
					echo "<img src='" . $flagstang . "' alt='Dannebrog' style='width:100%'>"; // kan skaleres efter behov
					echo "<p style='font-size:smaller'>" . $hvad . "</p>";
				}
			}

			// sådan: plusTid('+3 weeks +5 days');
			function fePaaske($tid, $hvad) {
				// Denne funktion beregner dato for skæve helligdage
				$date = date("Y-m-d", easter_date()); // påskedag
				$newdate = strtotime ( $tid, strtotime ( $date ) ) ; // her plus-minuses
				$newdate = date ( 'd,m' , $newdate ); // datoen formatteres

			 	return $newdate . "," . $hvad; // udskriver resultatet
			}
		}


$ny = new flagDag(); // instantierer klassen

// Official days
/*
$ny->dag(01,01,"Nytårsdag");
$ny->dag(05,02,"H.K.H. Kronprinsesse Mary");
$ny->dag(06,02,"H.K.H. Prinsesse Marie");
$ny->dag(09,04,"Danmarks besættelse. Der flages på halv stang til kl. 12:00.");
$ny->dag(16,04,"H.K.H. Dronning Margrethe II.");
$ny->dag(29,04,"H.K.H. Prinsesse Benedikte.");
$ny->dag(05,05,"Danmarks befrielse 1945.");
$ny->dag(26,05,"H.K.H. Kronprins Frederik.");
$ny->dag(05,06,"Grundlovsdag (1849).");
$ny->dag(07,06,"H.K.H. Prins Joachim"); // protektor for Danmarks-Samfundet
$ny->dag(11,06,"H.K.H. Prinsgemal Henrik.");
$ny->dag(15,06,"Valdemarsdag og Genforeningen (1920)");
$ny->dag(05,09,"H.K.H. Prins Joachim");

// Military Celebrations
$ny->dag(29,01,"Søværnet: Holmens Hæderstegn.");
$ny->dag(02,02,"Søværnet og hæren: Kampen ved Mysunde (1864).");
$ny->dag(11,02,"Søværnet og hæren: Stormen på København (1659).");
$ny->dag(11,03,"Søværnet, Hæren og Flyvevåbnet: Flyvevåbnets og forsvarets hæderstegns indstiftelsesdag 1953.");
$ny->dag(02,04,"Søværnet: Slaget på Rheden (1801).");
$ny->dag(09,04,"Danmarks besættelse (1940)");
$ny->dag(18,04,"Slaget ved Dybbøl (1864)");
$ny->dag(05,05,"Danmarks befrielse 1945");
$ny->dag(09,05,"Søværnet: Kampen ved Helgoland (1864)");
$ny->dag(27,05,"Flyvevåbnet: Underskrift af forsvarslovene herunder lov om flyvevåbnets oprettelse (1950).");
$ny->dag(01,06,"Søværnet: Slaget ved Øland og Møn (1676 og 1677).");
$ny->dag(05,06,"Grundlovsdag. Kampen ved Dybbøl (1848).");
$ny->dag(15,06,"Valdemarsdag. Slaget ved Reval (1219). Genforeningsdagen (1920)");
$ny->dag(01,07,"Søværnet: Slaget i Køge Bugt (1677).");
$ny->dag(06,07,"Hæren og Søværnet: Slaget ved Fredericia (1849).");
$ny->dag(08,07,"Søværnet: Slaget ved Dynekillen (1716).");
$ny->dag(25,07,"Hæren og Søværnet: Slaget ved Isted (1850).");
$ny->dag(26,07,"Søværnet: Erobringen af Marstrand (1719).");
$ny->dag(05,08,"Hæren, Søværnet og Luftvåbnet: Hædring af Danmarks Udsendte.");
$ny->dag(01,10,"Flyvevåbnets oprettelse (1950).");
$ny->dag(04,10,"Hæren og Søværnet: Stormen på Frederiksstad 1850. Kampen i Køge bugt 1710.");

*/

/* KIRKELIGE FLAGDAGE
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

while($i <= count($kadosh))
	{
	$ny->dag(
		(int)substr($kadosh[$i],0,2), // dag substring som integer
		(int)substr($kadosh[$i],3,4), // måned substring som integer
		substr($kadosh[$i],6) // hvad (pladrer strengen ud fra 6. karakter)
		);
	$i++;
	};

$ny->dag(25,12,"1. Juledag."); // helligdage med fast dato
$ny->dag(26,12,"2. Juledag.");
*/


/* PRIVATE FLAGDAGE
Indfør dine private flagdage herunder
Format: "dd,mm, begivenhed"
eksempel: $ny->dag(03,06,"test");

YOUR PERSONAL FLAG DAYS
In Denmark we celebrate birthdays and personal special days by hoisting the flag. 
From here you can use the class to enter private flag days
Format: "dd,mm, begivenhed"
Example: $ny->dag(03,06,"test");
You also might want to change the file and name referred to in $flagstang. Simply change the file to your flag en change $flagstang to the correct filename.
*/

/*
$ny->dag(27,02,"Pers fødselsdag");
$ny->dag(27,02,"Susannes fødselsdag");
$ny->dag(03,08,"Ruths fødselsdag");
*/

$ny->dag(16,02,'Test: Frodo came home.');
?>
