<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["links"]);

$PATH='<a href="links.php">'.$_LANG[links].'</a>';
$TAB1='risorse';

$BODY ='';

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top"><td width="33%">';

$BODY.='<h3>Strumenti online</h3>';

/*
$BODY.='<a href="http://www.irony.com/webtools.html" class="en" target="_blank">iG\'s on-Web RPG Tools</a><br>';
$BODY.='Tantissimi tools online, tutti utilissimi.<br><br>';
$BODY.='<a href="http://rinkworks.com/namegen/" class="en" target="_blank">Fantasy Name Generator</a><br>';
$BODY.='Generatore di nomi fantasy casuali.<br><br>';
*/
$BODY.='<a href="http://www.heromachine.com/" class="en" target="_blank">Hero Machine</a><br>';
$BODY.='Crea il ritratto del tuo personaggio.<br><br>';
$BODY.='<a href="http://marvel.com/create_your_own_superhero" class="en" target="_blank">Marvel Super Hero</a><br>';
$BODY.='Crea il ritratto del tuo personaggio in stile Marvel Comics.<br><br>';
$BODY.='<a href="http://alex.ombra.net/charas/index.php?lang=it" class="it" target="_blank">Charas</a><br>';
$BODY.='Crea il ritratto del tuo personaggio in stile manga.<br><br>';
$BODY.='<a href="http://www.tektek.org/dream/" class="en" target="_blank">Gaia Dream Avatar</a><br>';
$BODY.='Crea un\'immagine del il tuo personaggio in stile pixel art.<br><br>';
$BODY.='<a href="http://www.ageofgames.net/it/fantasyavatar/fantasy-avatar.html" class="it" target="_blank">Fantasy Avatar Creator</a><br>';
$BODY.='Crea l\'avatar del tuo personaggio in stile computergrafica.<br><br>';


$BODY.='<a href="http://inkwellideas.com/?page_id=125" class="en" target="_blank">Random Dungeon Generators Review</a><br>';
$BODY.='Una recensione dei migliori generatori random di dungeon.<br><br>';
$BODY.='<a href="http://www.gozzys.com" class="en" target="_blank">Gozzys.com</a><br>';
$BODY.='Generatori di Dungeon, caverne, edifici, citt&agrave;, regni... anche casuali!<br><br>';
$BODY.='<a href="http://donjon.bin.sh/" class="en" target="_blank">donjon</a><br>';
$BODY.='Generatori di avventure, nomi, dungeon, tesori, meteo ed altro ancora!<br><br>';
$BODY.='<a href="http://donjon.bin.sh/" class="en" target="_blank">Random Dungeon Generator</a><br>';
$BODY.='Generatore di dungeon casuale che usa le Geomorph Maps create da Dyson Logos.<br><br>';
$BODY.='<a href="http://www.penpaperpixel.org/tools/" class="en" target="_blank">Pen, Paper & Pixel</a><br>';
$BODY.='Diceroller, calcolatore di incontri, ricerca avazata di Mostri ed Incantesimi.<br><br>';

/*
$BODY.='<a href="http://www.aarg.net/~minam/npc.cgi" class="en" target="_blank">Generators by Jamis Buck</a><br>';
$BODY.='Generatori di Tesori, Città, Dungeon e PNG.<br><br>';
$BODY.='<a href="http://spazioinwind.libero.it/mptita/mostromatic/mostromatic.htm" class="it" target="_blank">Mostr-O-Matic</a><br>';
$BODY.='Crea l\'avanzamento di qualsiasi tipo di mostro.<br><br>';
$BODY.='<a href="http://spazioinwind.libero.it/mptita/prezzomatic/prezzomatic.htm" class="it" target="_blank">Prezz-O-Matic</a><br>';
$BODY.='Calcola il valore in MO di qualsiasi oggetto magico.<br><br>';
*/

$BODY.='<a href="http://d20srd.org" class="en" target="_blank">The Hypertext d20 SRD</a><br>';
$BODY.='L\'SRD 3.5 in versione ipertesto: cercabile, bookmarkabile e linkata.<br><br>';

$BODY.='<h3>Divertimento</h3>';

$BODY.='<a href="http://www.giantitp.com/cgi-bin/GiantITP/ootscript?lang=it" class="it" target="_blank">The Order of the Stick</a><br>';
$BODY.='Traduizone italiana del famoso fumetto online basato su Dungeons &amp; Dragons.<br><br>';
$BODY.='<a href="http://www.giantitp.com/cgi-bin/GiantITP/ootscript" class="en" target="_blank">The Order of the Stick</a><br>';
$BODY.='La versione originale del famoso fumetto online basato su Dungeons &amp; Dragons. &Egrave; in inglese, ma ci sono molte pi&ugrave; vignette che nella versione italiana.<br><br>';

$BODY.='</td><td width="20" nowrap></td><td width="33%">';

$BODY.='<h3>Comunit&agrave;</h3>';

$BODY.='<a href="http://www.dndonline.it" class="it" target="_blank">DnD Online</a><br>';
$BODY.='Community italiana di Dungeons &amp; Dragons<br><br>';
$BODY.='<a href="http://www.dragonslair.it" class="it" target="_blank">Dragon\'s Lair</a><br>';
$BODY.='Community italiana di Dungeons &amp; Dragons<br><br>';
$BODY.='<a href="http://www.gdrplayers.it/" class="it" target="_blank">GDR Players</a><br>';
$BODY.='Giocatori cercano giocatori.<br><br>';
$BODY.='<a href="http://www.gdrblogs.it/" class="it" target="_blank">GDR Blogs</a><br>';
$BODY.='Unisciti il tuo blog a quelli di tantissimi altri giocatori.<br><br>';
$BODY.='<a href="http://www.5clone.it" class="it" target="_blank">Il 5&deg; Clone</a><br>';
$BODY.='Community italiana di Dungeons &amp; Dragons<br><br>';
$BODY.='<a href="http://www.settimatorre.com" class="it" target="_blank">La Settima Torre</a><br>';
$BODY.='Community italiana di Dungeons &amp; Dragons<br><br>';

$BODY.='<h3>Eventi e incontri</h3>';

$BODY.='<a href="http://www.gdrplayers.it" class="it" target="_blank">GDR Players</a><br>';
$BODY.='Trova i giocatori di ruolo pi&ugrave; vicini a te!<br><br>';
$BODY.='<a href="http://www.campionatogdr.it/" class="it" target="_blank">Campionato GDR</a><br>';
$BODY.='Rete di tornei non agonistici<br><br>';
$BODY.='<a href="http://www.gioconomicon.net/" class="it" target="_blank">Gioconomicon</a><br>';
$BODY.='Questo sito tiene un calendario di eventi ludici italiani<br><br>';

// $BODY.='<td><a href="eventi.php" title="'.$_LANG[events].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_gmaps.gif" width="48" height="48" border="0" alt="'.$_LANG[events].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG[events].'</a></td>';


$BODY.='</td><td width="20" nowrap></td><td width="33%">';

$BODY.='<h3>Riviste</h3>';

$BODY.='<a href="http://www.anonimagdr.com" class="it" target="_blank">Anonima Gidierre</a><br>';
$BODY.='Trimestrale gratuito il cui scopo consiste nella diffusione dei giochi di ruolo, della cultura ludica e del divertimento fantastico in generale.<br><br>';
$BODY.='<a href="http://www.grottadimerlino.com/dm_magazine.html" class="it" target="_blank">DM Magazine</a><br>';
$BODY.='Rivista gratuita riguardante tutti i giochi da collezione, inclusi i librigioco.<br><br>';
$BODY.='<a href="http://www.dragonisland.it/web/emegazine" class="it" target="_blank">DragonZine</a><br>';
$BODY.='Rivista gratuita sul gioco di ruolo.<br><br>';
$BODY.='<a href="http://www.ilsa-magazine.net/" class="it" target="_blank">ILSA</a><br>';
$BODY.='Testata gratuita dedicata solo ai giochi da tavolo.<br><br>';

$BODY.='<h3>Trasmissioni</h3>';
$BODY.='<a href="http://www.improntadigitale.org/Trasmissioni/Frequenza_ludica/frequenza.asp" class="it" target="_blank">Frequenza Ludica</a><br>';
$BODY.='Giochi di societ&agrave;<br><br>';
$BODY.='<a href="http://www.antrodeldrago.info/antroshow/" class="it" target="_blank">Antro Show</a><br>';
$BODY.='Cultura ludica.<br><br>';

$BODY.='<h3>Siti ufficiali</h3>';

$BODY.='<a href="http://www.25edition.it" class="it" target="_blank">25 Edition</a><br>';
$BODY.='I traduttori per l\'Italia di Dungeons &amp; Dragons.<br><br>';
/*
$BODY.='<a href="http://www.d20.it" class="it" target="_blank">d20.it</a><br>';
$BODY.='I traduttori per l\'Italia del sistema di gioco "d20".<br><br>';
*/
$BODY.='<a href="http://www.wizards.com/dnd" class="en" target="_blank">Wizards of the Coast - Dungeons &amp; Dragons</a><br>';
$BODY.='I distributori di Dungeons &amp; Dragons.<br><br>';
$BODY.='<a href="http://www.wizards.com/d20" class="en" target="_blank">Wizards of the Coast - d20</a><br>';
$BODY.='Il sito ufficiale del sistema di gioco d20.<br><br>';

$BODY.='</td></tr></table>';

require_once("include/dress_dynamic.php");
?>
