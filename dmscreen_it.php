<?php
session_start();
if(!$_SESSION[logged]){
	include_once("access_denied.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title>Schermo del Dungeon Master</title>
<style>TD,TH{font-size:8pt;font-family:Arial, Helvetica, sans-serif;}</style>

</head>

<body>

<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Special_Attacks"></a>Attacchi Speciali</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 135pt;  font-weight: bold; text-align: center;" x:str="Special Attack " height="20" width="180">Attacco
Speciale<span style=""></span></td>
<td colspan="2" class="xl24" style="width: 166pt;  font-weight: bold; text-align: center;" width="220">Breve
Descrizione</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Aid another " height="20" width="180">Aiutare
un altro<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  background-color: rgb(204, 204, 204); text-align: center;" width="220">Fornire ad un alleato un bonus di +2 agli
attacchi o alla&nbsp;CA</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  text-align: center;" x:str="Bull rush " height="20" width="180">Caricare<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  text-align: center;" width="220">Muoversi al doppio della propria velocità e
attaccare con un bonus di +2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Charge " height="20" width="180"><span style=""></span>Combattere con due armi<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  background-color: rgb(204, 204, 204); text-align: center;" width="220">Combattere con un arma in ciascuna mano</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  text-align: center;" x:str="Disarm " height="20" width="180">Disarmare<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  text-align: center;" width="220">Colpire un'arma nelle mani di un avversario</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Feint " height="20" width="180">Fintare<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  background-color: rgb(204, 204, 204); text-align: center;" width="220">Nega il bunus Destrezza alla CA dell'avversario</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  text-align: center;" x:str="Grapple " height="20" width="180">Lottare<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  text-align: center;" width="220">Lottare con un avversario</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Overrun " height="20" width="180">Oltrepassare<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  background-color: rgb(204, 204, 204); text-align: center;" width="220">Attraversare o passare sopra ad un avversario
come movimento</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  text-align: center;" x:str="Sunder " height="20" width="180"><span style=""></span>Sbilanciare</td>
<td colspan="2" class="xl25" style="width: 166pt;  text-align: center;" width="220">Sbilanciare un avversario</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Throw splash weapon " height="20" width="180">Scacciare
(intimorire) i non morti<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  background-color: rgb(204, 204, 204); text-align: center;" width="220">Incanalare energia positiva (o negativa) per
scacciare (o intimorire) i non morti</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  text-align: center;" x:str="Trip " height="20" width="180"><span style=""></span>Scaglaire un'arma a spargimento</td>
<td colspan="2" class="xl25" style="width: 166pt;  text-align: center;" width="220">Scagliare un contenitore di liquido pericoloso
su un bersaglio</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Turn (rebuke) undead " height="20" width="180">Spaccare
l'arma<span style=""></span></td>
<td colspan="2" class="xl25" style="width: 166pt;  background-color: rgb(204, 204, 204); text-align: center;" width="220">Colpire un'arma o uno scudo dell'avversario</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt;  text-align: center;" x:str="Two-weapon fighting " height="20" width="180"><span style="">&nbsp;</span>Spingere</td>
<td colspan="2" class="xl25" style="width: 166pt;  text-align: center;" width="220">Spingere un avversario di 1,5 m o più</td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 1777px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 98pt;" width="130"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="2" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Action_in_Combact"></a>Azioni
in Combattimento</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt;  font-weight: bold; text-align: center;" height="20" width="270">Azione Standard</td>
<td class="xl25" style="width: 98pt;  font-weight: bold; text-align: center;" width="130">Attacco di Opportunità<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Abbassare la resistenza agli
incantesimi</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Accendere una torcia con un
tizzone ardente</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Attacco (a distanza)</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 0px;" width="270">Attacco (in mischia)</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 0px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 11px;" width="270">Attacco (senz'armi)</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 11px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 10px;" width="270">Attivare un oggetto magico
che non sia una pozione o un olio</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 10px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="270">Aiutare ad un altro</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="130">Forse<font class="font6"><sup>2</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 17px;" width="270">Bere una pozione o applicare
un olio</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 17px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 9px;" width="270">Concentrarsi per mantenere
attivo un incantesimo</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 9px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 0px;" width="270">Difesa totale</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 0px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 13px;" width="270">Estrarre un'arma nascosta
(vedi l'abilità Rapidità di Mano)</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 13px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 8px;" width="270">Fintare</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 8px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 13px;" width="270">Interrompere un incantesimo</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 13px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 14px;" width="270">Lanciare un incnatesimi
(tempo di lancio 1 azione standard)</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 14px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 3px;" width="270">Leggere una pergamena</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 3px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 10px;" width="270">Liberarsi da una lotta</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 10px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="270">Oltrepassare</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 0px;" width="270">Preparare (attiva un'azione
standard)</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 0px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 19px;" width="270">Scacciare o intimorire i non
morti</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 19px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 17px;" width="270">Spezzare un'arma (attacco)</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 17px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="270">Spezzare un oggetto (attacco)</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="130">Forse<font class="font6"><sup>3</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 0px;" width="270">Spingere</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 0px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="270">Stabilizzare un alleato
morente
(vedi l'abilità Guarire)</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 16px;" width="270">Usare un'abilità che
richiede&nbsp;1 azione</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 16px;" width="130">Generalmente</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 16px;" width="270">Usare una capacità magica</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 16px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 9px;" width="270">Usare una capacità
soprannaturale</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 9px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 16px;" width="270">Usare una capacità
straordinria</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 16px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 203pt;  font-weight: bold; text-align: center; height: 19px;" width="270">Azione Movimento</td>
<td class="xl25" style="width: 98pt;  font-weight: bold; text-align: center; height: 19px;" width="130">Attacco di Opportunità<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 5px;" width="270">Alzarsi in piedi da proni</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 5px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 9px;" width="270">Aprire o chiudere una porta</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 9px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 9px;" width="270">Caricare una balestra a mano
o una balestra leggera</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 9px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 0px;" width="270">Controllare una cavalcatura
spaventata</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 0px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 16px;" width="270">Dirigere o ridirigere un
incantesimo attivo</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 16px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 1px;" width="270">Estrarre un'arma<font class="font6"><sup>4</sup></font></td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 1px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 10px;" width="270">Montare o smontare da cavallo</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 10px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 17px;" width="270">Movimento</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 17px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 10px;" width="270">Muovere un oggetto pesante</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 10px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 15px;" width="270">Preparare o lasciar cadere
uno scudo<font class="font6"><sup>4</sup></font></td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 15px;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="270">Raccogliere un oggetto</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 0px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 15px;" width="270">Recuperare un oggetto
custodito</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 15px;" width="270">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 10px;" width="270">Rinfoderare un'arma</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 10px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 203pt;  font-weight: bold; text-align: center; height: 18px;" width="270">Azione di Round Completo</td>
<td class="xl25" style="width: 98pt;  font-weight: bold; text-align: center; height: 18px;" width="130">Attacco di Opportunità<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  background-color: rgb(204, 204, 204); text-align: center; height: 17px;" width="270">Accendere una torcia</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center; height: 17px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 203pt;  text-align: center; height: 15px;" width="270">Agganciare o sganciare
un'arma al guanto d'arme con sicura</td>
<td class="xl27" style="width: 98pt;  text-align: center; height: 15px;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Attacco Completo</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Caricare<font class="font6"><sup>5</sup></font></td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Caricare una balestra pesante
o una balestra a ripetizione</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Correre</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Liberarsi da una rete</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Prepararsi
a scagliare un'arma a spargimento</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Ritirarsi<font class="font6"><sup>5</sup></font></td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Sferrare il colpo di grazia</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Spegnere delle fiamme</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="34" width="270">Usare un'abilità che righiede
1 round</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Usare
un incantesimo a contatto su al massimo sei alleati</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">Generalmente</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt;  font-weight: bold; text-align: center;" height="20" width="270">Azione Gratuita</td>
<td class="xl25" style="width: 98pt;  font-weight: bold; text-align: center;" width="130">Attacco di Opportunità<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Interrompere la
concentrazione su di un incantesimo</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Lanciare un incantesimo rapido</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Lasciar cadere un oggetto</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Lasciarsi cadere a terra</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Parlare</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Preparare le componenti
materiali per lanciare&nbsp;un incantesimo<font class="font6"><sup>6</sup></font></td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt;  font-weight: bold; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Non Azione</td>
<td class="xl25" style="width: 98pt;  font-weight: bold; background-color: rgb(204, 204, 204); text-align: center;" width="130">Attacco di Opportunità<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Passo di 1,5 metri</td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Ritardare</td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt;  text-align: center; font-weight: bold;" height="20" width="270">Azioni&nbsp;Varie</td>
<td class="xl28" style="width: 98pt;  text-align: center; font-weight: bold;" width="130">Attacco di Opportunità<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Disarmare<font class="font6"><sup>7</sup></font></td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Lottare<font class="font6"><sup>7</sup></font></td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Sbilanciare un'avversario<font class="font6"><sup>7</sup></font></td>
<td class="xl27" style="width: 98pt;  background-color: rgb(204, 204, 204); text-align: center;" width="130">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt;  text-align: center;" height="20" width="270">Usare un talento<font class="font6"><sup>8</sup></font></td>
<td class="xl27" style="width: 98pt;  text-align: center;" width="130">Variabile</td>
</tr>
<tr style="">
<td style="height: 29px;" colspan="2" rowspan="1"><font class="font6"><sup>1</sup></font><small>
Indipendentemente dall'azione, se si esce da un quadretto minacciato,
si provoca un attacco di opportunità. Questa colonna indica che, pur
non esendo di per sé movimento, provoca un attacco di opportunità.</small></td>
</tr>
<tr style="">
<td style="height: 23px;" colspan="2" rowspan="1"><font class="font6"><sup>2</sup></font><small>
Se si presta soccorso a qualcuno impiegando un'azione che normalmente
provocarebbe un attacco di opportunità, allora l'atto di prestar
soccorso provoca anch'esso un attacco di oppurtunità.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 15px;" width="400"><font class="font6"><sup>3</sup></font><small>
Se l'oggetto è impugnato, trasportato o indossato da una creatura, sì.
Altrimenti, no.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 22px;" width="400"><font class="font6"><sup>4</sup></font><small>
Se si ha un bonus di attacco base di +1 o superiore, si può fare una di
queste azioni insieme ad un normale movimento. Se si ha il talento
Combattere con Due Armi, si possono estrarre due armi leggero o due
armi a una mano nello stesso tempo che normalmente occorrerebbe per
estrarne una sola.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 23px;" width="400"><font class="font6"><sup>5</sup></font><small>
Può essere effettuata come azione standard se ci si limita ad
effettuare una sola azione in a round.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 19px;" width="400"><font class="font6"><sup>6</sup></font><small>
A meno che la componente non sia un oggetto estremamente grande o poco
maneggevole.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 9px;" width="400"><font class="font6"><sup>7</sup></font><small>
Queste forme di attacco equivalgono a un attacco in mischia, non a
un'azione. In quanto attacchi in mischia, possono essere usati una sola
volta in un'azione di attacco o di carica, uno o più volte in un'azione
di attacco completo o persino come attacco di opportunità.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 20px;" width="400"><font class="font6"><sup>8</sup></font><small>
La descrizione di un talento definisce i suoi effetti.</small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 409px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; text-align: center; background-color: black; width: 115px;" height="20"><a name="Common_Armor_Weapon_and_Shield_Hardness_and_Hit_Points"></a>Durezza
e Punti Ferita di Armature, Armi e Scudi Comuni</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  font-weight: bold; width: 267px; text-align: center;" height="20">Arma o Scudo</td>
<td class="xl25" style=" font-weight: bold; width: 115px; text-align: center;">Durezza</td>
<td class="xl25" style=" font-weight: bold; width: 115px; text-align: center;">PF<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" x:str="Light blade " height="20">Lama leggera<span style="">&nbsp;</span></td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 267px; text-align: center;" height="20">Lama a una mano</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">Lama a due mani</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 267px; text-align: center;" height="20">Arma leggera con impugnatura di metallo</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">Arma a una mano con impugnatura di metallo</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">20</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 267px; text-align: center;" x:str="Light hafted weapon " height="20">Arma leggera
con impugnatura<span style="">&nbsp;</span></td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">Arma a una mano con impugnatura</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 267px; text-align: center;" height="20">Arma&nbsp;a due mani con impugnatura di
metallo</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">Arma a munzioni</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 267px; text-align: center;" height="20">Armatura</td>
<td class="xl27" style=" width: 115px; text-align: center;">speciale<font class="font5"><sup>2</sup></font></td>
<td class="xl27" style=" width: 115px; text-align: center;">bonus
armatura x 5</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="17">Buckler</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" width: 115px; text-align: center; background-color: rgb(204, 204, 204);" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 267px; text-align: center;" height="20">Scudo leggero di legno</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">7</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="17">Scudo pesante di legno</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">15</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt;  width: 267px; text-align: center;" height="17">Scudo leggero di metallo</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt;  background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="17">Scudo pesante di metalo</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">20</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt;  width: 267px; text-align: center;" height="17">Scudo a Torre</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style=" width: 115px; text-align: center;" x:num="">20</td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="3" class="xl26" style="text-align: justify; width: 115px; height: 30px;"><font class="font5"><sup>1</sup></font><small>
Il valore dei pf dato è quello per armature, armi e scudi di taglia
Media. Si divide per 2 per ogni categoria di taglia di oggetto
inferiore alla Media, o si moltiplica per 2 per ogni categoria
superiore alla Media.</small></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="3" class="xl26" style="width: 115px; height: 15px;"><font class="font5"><sup>2</sup></font><small>
Varia in funzione del materiale.</small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; text-align: center; width: 301pt; background-color: black;"><a name="Armor_Class_Modifiers"></a>Modificatori alla
Classe Armatura</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  font-weight: bold; width: 135pt; text-align: center;" height="20" width="180">Il Difensore è . . .</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;" width="110">In Mischia</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;" width="110">A Distanza</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Accecato</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;" height="20" width="180">Dietro una copertura</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">+4</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">+4</td>
</tr>
<tr>
<td style=" text-align: center; height: 22px; background-color: rgb(204, 204, 204);">Colto
alla sprovvista (come sorpreso, in equilibrio o in scalata)</td>
<td style=" text-align: center; height: 22px; background-color: rgb(204, 204, 204);">+0<font class="font5"><sup>1</sup></font></td>
<td style=" text-align: center; height: 22px; background-color: rgb(204, 204, 204);">+0<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center;" height="20" width="180">Immobilizzato</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;4<font class="font5"><sup>4</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center;" x:num="" width="110">+0<font class="font5"><sup>4</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: rgb(204, 204, 204);" height="20" width="180">Indifeso (come paralizzato,
addormentato o legato)</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" width="110">&#8211;4<font class="font5"><sup>4</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="110">+0<font class="font5"><sup>4</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: white;" height="20" width="180">Inginocchiato o seduto</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" width="110">&#8211;2</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" x:num="" width="110">+2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: rgb(204, 204, 204);" height="20" width="180">In lotta (ma l'attaccante non
lo è)</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="110">+0<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" width="110">+0<font class="font5"><sup>1,
3</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: white;" height="20" width="180">Intralciato</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" x:num="" width="110">+0<font class="font5"><sup>2</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" x:num="" width="110">+0<font class="font5"><sup>2</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: rgb(204, 204, 204);" height="20" width="180">Occultato o invisibile</td>
<td colspan="2" class="xl27" style="width: 166pt;  text-align: center; background-color: rgb(204, 204, 204);" width="220">&#8212;
Vedi Occultamento &#8212;</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: white;" height="20" width="180">Prono</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" x:num="" width="110">+0<font class="font5"><sup>4</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: rgb(204, 204, 204);" height="20" width="180">Ristretto in uno spazio</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" width="110">&#8211;4</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: white;" height="20" width="180">Stordito</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: white;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  width: 135pt; text-align: center; background-color: rgb(204, 204, 204);" height="20" width="180">Tremante</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>1</sup></font><small>
Il difensore perde qualunque bonus alla CA derivante dalla Destrezza.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>2</sup></font><small>&nbsp;Un
personaggio intralciato subisce una penalità di &#8211;4 alla Destrezza.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>3</sup></font><small>
</small><small>Si effettua un tiro casuale per
determinare quale tra i
combattenti in lotta viene colpiti. Il difensore perde qualunque bonus
alla CA derivante dalla Destrezza.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>4</sup></font><small>
Si consideri la Destrezza del difenore uguale a 0 (modificatore &#8211;5). I
ladri possono sferrare attacchi furtivi contro difensori indifesi o
immobilizzati.</small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 282px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Attack_Roll_Modifiers"></a>Modificatori al Tiro
di Attacco</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 135pt;  font-weight: bold; text-align: center;" height="20" width="180">L'Attaccante è . . .</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;" width="110">In Mischia</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;" width="110">A Distanza</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Abbagliato</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;1</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;1</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;" height="20" width="180">Ai fianchi del difensore</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">+2</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8212;</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Intralciato</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;" height="20" width="180">Invisibile</td>
<td class="xl27" style="width: 83pt;  text-align: center;" x:num="" width="110">+2<font class="font5"><sup>2</sup></font></td>
<td class="xl27" style="width: 83pt;  text-align: center;" x:num="" width="110">+2<font class="font5"><sup>2</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">In posizione sopraelevata</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">1</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;" height="20" width="180">Prono</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8212;<font class="font5"><sup>3</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Ristretto in uno spazio</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;" height="20" width="180">Scosso o spaventato</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;2</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;2</td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>1</sup></font><small>
Un personaggio intralciato subisce inoltre una penalità di &#8211;4 alla
Destezza, che può influenzare il suo tiro per colpire.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="3" class="xl29" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>2</sup></font><small>&nbsp;</small><small>Il
difensore perde qualunque bonus alla CA derivante dalla Destrezza</small><small>.
Questo bonus non si applica se il bersaglio è accecato.</small></td>
</tr>
<tr style="height: 15pt; " align="justify" height="51">
<td colspan="3" class="xl26" style="width: 301pt; height: 16px;" width="400"><font class="font5"><sup>3</sup></font><small>
Molte armi a distanza non si possono usare finchè si è proni, ma si può
usare una balestra o le shuriken senza penalità mentre si è in una tale
posizione.</small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="3" class="xl24" style="height: 12.75pt; width: 301pt; text-align: center; background-color: black;"><a name="Two-Weapon_Fighting_Penalties"></a>Penalità nel
Combattere con Due Armi</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; width: 135pt;  font-weight: bold; text-align: center;" height="17" width="180">Circostanze</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;" width="110">Mano Primaria</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;" width="110">Mano Secondaria</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="17" width="180">Penalità normale</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;6</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;10</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; width: 135pt;  text-align: center;" height="17" width="180">L'arma nella mano secondaria
è leggera</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;8</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="17" width="180">Talento Combattere con Due
Armi</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
</tr>
<tr style="height: 25.5pt;" height="34">
<td class="xl26" style="height: 25.5pt; width: 135pt;  text-align: center;" height="34" width="180">L'arma nella mano secondaria
è leggera e Talento Combattere con Due Armi</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;2</td>
<td class="xl27" style="width: 83pt;  text-align: center;" width="110">&#8211;2</td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 98pt;" width="130"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="2" class="xl26" style="height: 15pt; text-align: center; width: 356px; background-color: black;"><a name="Turning_Undead"></a>Scacciare Non Morti</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  font-weight: bold; width: 142px; text-align: center;" height="20">Risultato della Prova di Scacciare</td>
<td style=" font-weight: bold; width: 356px; text-align: center;" colspan="1" rowspan="1">Più Potente Non Morto
Influenzato
( Dado Vita Massimo)</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 12.75pt;  width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="17">0 o meno</td>
<td style=" width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Livello del chierico &#8211; 4</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; text-align: center;" height="20">1&#8211;3</td>
<td style=" width: 356px; text-align: center;" colspan="1" rowspan="1">Livello del chierico &#8211; 3</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">4&#8211;6</td>
<td style=" width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Livello del
chierico&nbsp;&#8211;
2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; text-align: center;" height="20">7&#8211;9</td>
<td style=" width: 356px; text-align: center;" colspan="1" rowspan="1">Livello del chierico &#8211; 1</td>
</tr>
<tr style="height: 1pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">10&#8211;12</td>
<td style=" width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Livello del chierico</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; text-align: center;" height="20">13&#8211;15</td>
<td style=" width: 356px; text-align: center;" colspan="1" rowspan="1">Livello del
chierico&nbsp;+
1</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">16&#8211;18</td>
<td style=" width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Livello del
chierico&nbsp;+
2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; text-align: center;" height="20">19&#8211;21</td>
<td style=" width: 356px; text-align: center;" colspan="1" rowspan="1">Livello del
chierico&nbsp;+
3</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">22 o più</td>
<td style=" width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Livello del
chierico&nbsp;+
4</td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 316px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Creature_Size_and_Scale"></a>Taglia e Scala
delle Creature</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 135pt;  font-weight: bold; text-align: center;">Taglia
della Creatura</td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;">Spazio<font class="font5"><sup>1</sup></font></td>
<td class="xl25" style="width: 83pt;  font-weight: bold; text-align: center;">Portata
Naturale<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Piccolissima</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">15
cm</td>
<td class="xl27" x:num="" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;">Minuta</td>
<td class="xl27" style="width: 83pt;  text-align: center;">30
cm</td>
<td class="xl27" x:num="" style="width: 83pt;  text-align: center;">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Minuscola</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">75
cm</td>
<td class="xl27" x:num="" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;">Piccola</td>
<td class="xl27" style="width: 83pt;  text-align: center;">1,5
m</td>
<td class="xl27" style="width: 83pt;  text-align: center;">1,5
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Media</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">1,5
m</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">1,5
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;">Grande
(altezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center;">3
m</td>
<td class="xl27" style="width: 83pt;  text-align: center;">3
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Grande
(lunghezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">3
m</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">1,5
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;">Enorme
(altezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center;">4,5
m</td>
<td class="xl27" style="width: 83pt;  text-align: center;">4,5
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Enorme
(lunghezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">4,5
m</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">3
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;">Mastodontica
(altezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center;">6
m</td>
<td class="xl27" style="width: 83pt;  text-align: center;">6
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Mastodontica
(lunghezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">6
m</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">4,5
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center;">Colossale
(altezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center;">9
m</td>
<td class="xl27" style="width: 83pt;  text-align: center;">9
m</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt;  text-align: center; background-color: rgb(204, 204, 204);">Colossale
(lunghezza)</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">9
m</td>
<td class="xl27" style="width: 83pt;  text-align: center; background-color: rgb(204, 204, 204);">6
m</td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="3" rowspan="2" class="xl26" style="width: 301pt; height: 12px;"><font class="font5"><sup>1</sup></font><small>
Questi valori sono quelli tipici delle creature della taglia indicata.
Esistono alcune eccezioni.</small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; text-align: center; width: 169px; background-color: black;"><a name="Tactical_Speed"></a>Velocità Tattica</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  font-weight: bold; width: 161px; text-align: center;" x:str="Race " height="20">Razza<span style="">&nbsp;</span></td>
<td class="xl26" style=" font-weight: bold; width: 169px; text-align: center;">Senza
Armatura o Armatura Leggera</td>
<td class="xl26" style=" font-weight: bold; width: 167px; text-align: center;">Armatura
Media o Pesante</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 161px; background-color: rgb(204, 204, 204); text-align: center;" height="20">Elfo, mezzelfo, mezzorco, umano</td>
<td class="xl25" style=" width: 169px; background-color: rgb(204, 204, 204); text-align: center;">9
m (6 quadretti)</td>
<td class="xl25" style=" width: 167px; background-color: rgb(204, 204, 204); text-align: center;">6
m (4 quadretti)</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 161px; text-align: center;" height="20">Halfling, gnomo</td>
<td class="xl25" style=" width: 169px; text-align: center;">6
m (4&nbsp;quadretti)</td>
<td class="xl25" style=" width: 167px; text-align: center;">4,5
m (3 quadretti)</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 161px; background-color: rgb(204, 204, 204); text-align: center;" height="20">Nano</td>
<td class="xl25" style=" width: 169px; background-color: rgb(204, 204, 204); text-align: center;">6
m (4&nbsp;quadretti)</td>
<td class="xl25" style=" width: 167px; background-color: rgb(204, 204, 204); text-align: center;">6
m (4&nbsp;quadretti)</td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 87pt;" width="116"> <col style="width: 37pt;" width="49"> <col style="width: 68pt;" width="90"> <col style="width: 68pt;" width="91"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="4" style="height: 15pt; width: 151px; text-align: center; background-color: black;"><a name="Skills"></a>Abilità</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; font-weight: bold;" height="20">Abilità</td>
<td style="width: 151px;  text-align: center; font-weight: bold;">Caratteristica</td>
<td style="width: 151px;  text-align: center; font-weight: bold;">Solo
con Addestramento</td>
<td style="width: 151px;  text-align: center; font-weight: bold;">Penalità
da Armatura</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Acrobazia</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Des</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Addestrare&nbsp;Animali</td>
<td style="width: 151px;  text-align: center; background-color: white;">Car</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Artigianato</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Artista della Fuga</td>
<td style="width: 151px;  text-align: center; background-color: white;">Des</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Ascoltare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sag</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Camuffare</td>
<td style="width: 151px;  text-align: center; background-color: white;">Car</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Cavalcare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Des</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Cercare</td>
<td style="width: 151px;  text-align: center; background-color: white;">Int</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Concentrazione</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Cos</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Conoscenze</td>
<td style="width: 151px;  text-align: center; background-color: white;">Int</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Decifrare Scritture</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Diplomazia</td>
<td style="width: 151px;  text-align: center; background-color: white;">Car</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Disattivare Congegni</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Equilibrio</td>
<td style="width: 151px;  text-align: center; background-color: white;">Des</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Falsificare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Guarire</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sag</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Intimidire</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Car</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Intrattenere</td>
<td style="width: 151px;  text-align: center; background-color: white;">Car</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Muoversi Silenziosamente</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Des</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Nascondersi</td>
<td style="width: 151px;  text-align: center; background-color: white;">Des</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Nuotare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">For</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Osservare</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sag</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Parlare Linguaggi</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Nessuna</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Percepire Intenzioni</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sag</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Professione</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sag</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Raccogliere Informazioni</td>
<td style="width: 151px;  text-align: center; background-color: white;">Car</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Raggirare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Car</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Rapidità di Mano</td>
<td style="width: 151px;  text-align: center; background-color: white;">Des</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Saltare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">For</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Sapienza Magica</td>
<td style="width: 151px;  text-align: center; background-color: white;">Int</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Scalare</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">For</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sì</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Scassinare Serrature</td>
<td style="width: 151px;  text-align: center; background-color: white;">Des</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Sopravvivenza</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Sag</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Utilizzare Corde</td>
<td style="width: 151px;  text-align: center; background-color: white;">Des</td>
<td style="width: 151px;  text-align: center; background-color: white;">Sì</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: rgb(204, 204, 204);" height="20">Utilizzare Oggetti Magici</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">Car</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px;  text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px;  text-align: center; background-color: white;" height="20">Valutare</td>
<td style="width: 151px;  text-align: center; background-color: white;">Int</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
<td style="width: 151px;  text-align: center; background-color: white;">No</td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt;" height="17">
<td colspan="2" rowspan="1" style="height: 12.75pt; color: white; font-family: Scala Sans-Blk; text-align: center; background-color: black; width: 151px;" height="17"><a name="Tumble"></a>Acrobazia</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  text-align: center; font-weight: bold; width: 804px;" height="20"><span lang="EN-US">Azione</span></td>
<td class="xl24" style=" text-align: center; font-weight: bold; width: 151px;" x:str="Tumble DC "><span lang="EN-US">CD di
Acrobazia<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  text-align: center; background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Considerare una
caduta come se fosse di 3 metri più corta al momento della
determinazione dei danni.</span></td>
<td class="xl25" style=" text-align: center; background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  text-align: center; width: 804px;" height="20"><span lang="EN-US">Effettuare
un salto mortale a metà della velocità come parte del movimento
normale, senza provocare attacchi di opportunità mentre lo si esegue.
Un fallimento significa che il peersonaggio provoca i normali attacchi
di opportunità.&nbsp;</span></td>
<td rowspan="2" class="xl27" style="border-top: medium none;  text-align: center; width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt; " align="center" height="20">
<td class="xl25" style="height: 15pt; width: 804px;" height="20"><span lang="EN-US"></span><span lang="EN-US">Effettuare
una prova separata per ogni avversario
che si vuole superare, nell'ordine in cui li si supera (scelta
dell'ordine efettuata dal giocatore in caso di parità).&nbsp;</span><span lang="EN-US">Ogni nemico oltre il primo aggiunge un +2 alla
CD della prova di Acrobazia.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt;  text-align: center; background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Effettuare
un salto mortale a metà velocità attraverso un'area occupata da un
nemico (sopra, sotto o intorno all'avversario), come parte del nomrale
movimento, senza provocare attacchi di opportunità mentre lo si
esegue.&nbsp;</span></td>
<td rowspan="2" class="xl27" style="border-top: medium none;  text-align: center; background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt; " align="center" height="20">
<td class="xl26" style="height: 15pt; background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Un fallimento
significa che il personaggio si ferma
prima di entrare nell'area occupata dal nemico e provoca un attacco di
opportunità da parte sua. Effetturare una prova separata per ogni
avversario. Ogni nemico oltre il primo aggiunge un +2 alla CD della
prova di Acrobazia.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  text-align: center; font-weight: bold; width: 804px;" x:str="Surface Is . . . " height="20"><span lang="EN-US">La superficie è . . .<span style="">&nbsp;</span></span></td>
<td class="xl24" style=" text-align: center; font-weight: bold; width: 151px;"><span lang="EN-US">Modificatore alla&nbsp;CD</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  text-align: center; background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Leggermente
ostruita (sassolini, macerie sparse, acquitrino poco profondo<font class="font6"><sup>1</sup></font><font class="font5">, bassa vegetazione)<span style="">&nbsp;</span></font></span></td>
<td class="xl28" style=" text-align: center; background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  text-align: center; width: 804px;" x:str="Severely obstructed (natural cavern floor, dense rubble, dense undergrowth) " height="20"><span lang="EN-US">Pesantemente
ostruita (pavimento di una caverna naturale, abbondanti macerie, folta
vegetazione)<span style="">&nbsp;</span></span></td>
<td class="xl28" style=" text-align: center; width: 151px;" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  text-align: center; background-color: rgb(204, 204, 204); width: 804px;" x:str="Lightly slippery (wet floor) " height="20"><span lang="EN-US">Leggermente scivolosa (pavimento bagnato)<span style="">&nbsp;</span></span></td>
<td class="xl28" style=" text-align: center; background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  text-align: center; width: 804px;" x:str="Severely slippery (ice sheet) " height="20"><span lang="EN-US">Estremamente scivolosa (patina di ghiaccio)<span style="">&nbsp;</span></span></td>
<td class="xl28" style=" text-align: center; width: 151px;" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  text-align: center; background-color: rgb(204, 204, 204); width: 804px;" x:str="Sloped or angled " height="20"><span lang="EN-US">Pendente o angolata<span style="">&nbsp;</span></span></td>
<td class="xl28" style=" text-align: center; background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt; " align="center" height="20">
<td colspan="2" class="xl27" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: left; width: 151px;" height="20"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US"> È impossibile compiere acrobazie in acquitrino
profondo.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 168pt;" width="224"> <col style="width: 83pt;" width="111"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" class="xl26" style="height: 12.75pt; background-color: black; width: 301px;"><a name="Handle_Animal"></a>Addestrare
Animali</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; text-align: center;  font-weight: bold; width: 654px;" x:str="Task " height="17"><span lang="EN-US">Azione<span style=""></span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 301px;"><span lang="EN-US">CD di Addestrare Animali</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="Handle an animal " height="17"><span lang="EN-US">Addestrare un animale<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; text-align: center;  width: 654px;" x:str="&#8220;Push&#8221; an animal " height="17"><span lang="EN-US">&#8220;Spingere&#8221; un animal<span style="">e</span></span></td>
<td class="xl25" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl25" style="height: 15.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="Teach an animal a trick " height="21"><span lang="EN-US">Insegnare comandi ad un animale<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">15 o 20<font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl25" style="text-align: center;  height: 22px; width: 654px;" x:str="Train an animal for a general purpose "><span lang="EN-US">Addestare un animale per un compito generico<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  height: 22px; width: 301px;"><span lang="EN-US">15 or 20<font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center;  height: 24px; background-color: rgb(204, 204, 204); width: 654px;" x:str="Rear a wild animal "><span lang="EN-US">Allevare
un animale selvatico<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  height: 24px; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">15 +&nbsp;DVdell'animale</span></td>
</tr>
<tr style="height: 15.75pt; " align="center" height="21">
<td colspan="2" class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; text-align: justify; height: 17px; width: 301px;"><span lang="EN-US"><sup>1</sup><small><font class="font5"> See the specific trick or purpose below.</font></small></span></td>
</tr>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" align="center" height="17">
<td colspan="2" class="xl26" style="background-color: rgb(102, 102, 102); height: 22px; width: 301px;">Addestrare
un Animale</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="text-align: center; height: 26px; font-weight: bold;  width: 654px;" x:str="General Purpose "><span lang="EN-US">Compito
Generico<span style=""></span></span></td>
<td class="xl24" style="text-align: center; height: 26px; font-weight: bold;  width: 301px;" x:str="DC "><span lang="EN-US">CD<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 15px; background-color: rgb(204, 204, 204);  width: 654px;" x:str="Combat riding "><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Cacciare</span></td>
<td class="xl25" style="text-align: center; height: 15px; background-color: rgb(204, 204, 204);  width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 21px;  width: 654px;" x:str="Fighting "><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Cavalcare
in Combattimento</span></td>
<td class="xl25" style="text-align: center; height: 21px;  width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204);  width: 654px;" x:str="Guarding "><span lang="EN-US">Combattere</span><span lang="EN-US"></span></td>
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204);  width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 21px;  width: 654px;" x:str="Heavy labor "><span lang="EN-US">Fare la
guardia<span style=""></span></span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 21px;  width: 301px;" x:num=""><span lang="EN-US">20</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 21px; background-color: rgb(204, 204, 204);  width: 654px;" x:str="Hunting "><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Cavalcare</span><span lang="EN-US"></span></td>
<td class="xl25" style="text-align: center; height: 21px; background-color: rgb(204, 204, 204);  width: 301px;" x:num=""><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 19px;  width: 654px;" x:str="Performance "><span lang="EN-US">Intrattenere<span style=""></span></span></td>
<td class="xl25" style="text-align: center; height: 19px;  width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204);  width: 654px;" x:str="Riding "><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Lavori
pesanti</span></td>
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204);  width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="3" style="height: 12.75pt; width: 124px; text-align: center; background-color: black;"><a name="Craft"></a>Artigianato</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt;  width: 240px; font-weight: bold; text-align: center;" x:str="Item " height="17"><span lang="EN-US">Oggetto<span style="">&nbsp;</span></span></td>
<td class="xl24" style=" width: 124px; font-weight: bold; text-align: center;" x:str="Craft Skill "><span lang="EN-US">Abilità
di Artigianato<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 83pt;  font-weight: bold; text-align: center;" width="110"><span lang="EN-US">CD di Artigianato</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Acid " height="20"><span lang="EN-US">Acido<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Alchimia<font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" x:str="Alchemist&#8217;s fire, smokestick, or tindertwig " height="20"><span lang="EN-US">Bastone di fumo, fuoco alchemico o tizzone
ardente<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; text-align: center;"><span lang="EN-US">Alchimia</span><span lang="EN-US"><font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Antitoxin, sunrod, tanglefoot bag, or thunderstone " height="20"><span lang="EN-US">Antitossina,
borsadell'impedimento, pietra del tuono o verga del sole<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Alchimia</span><span lang="EN-US"><font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" x:str="Armor or shield " height="20"><span lang="EN-US">Armatura o scudo<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; text-align: center;" x:str="Armorsmithing "><span lang="EN-US">Fabbricare
Armature<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" width="110"><span lang="EN-US">10 +</span><span lang="EN-US"> bonus</span><span lang="EN-US">
alla&nbsp;C</span><span lang="EN-US">A</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" x:str="Longbow or shortbow " height="20"><span lang="EN-US">Arco lungo o arco corto<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; text-align: center;" x:str="Bowmaking "><span lang="EN-US">Fabbiracare
Archi<span style=""></span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">12</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" height="20"><span lang="EN-US">Arco lungo
composito o arco corto composito</span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Bowmaking "><span lang="EN-US">Fabbiracare
Archi</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" height="20"><span lang="EN-US">Arco lungo
composito o arco corto composito con alto valore di forza</span></td>
<td class="xl25" style=" width: 124px; text-align: center;" x:str="Bowmaking "><span lang="EN-US">Fabbiracare
Archi</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" width="110"><span lang="EN-US">15 + (2 x bonus
di For)</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Crossbow " height="20"><span lang="EN-US">Balestra<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Fabbricare
Armi<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" x:str="Simple melee or thrown weapon " height="20"><span lang="EN-US">Arma semplice da mischia o da lancio<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Fabbricare
Armi<span style=""></span></span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">12</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Martial melee or thrown weapon " height="20"><span lang="EN-US">Arma da guerra da mischia o da lancio</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Fabbricare
Armi<span style=""></span></span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" x:str="Exotic melee or thrown weapon " height="20"><span lang="EN-US">Arma esotica da mischia o da lancio</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style=" width: 124px; text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Fabbricare
Armi<span style=""></span></span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">18</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Mechanical trap " height="20"><span lang="EN-US">Trappola meccanica<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Trapmaking "><span lang="EN-US">Costruire
Trappole<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" width="110"><span lang="EN-US">Variabile<font class="font6"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" x:str="Very simple item (wooden spoon) " height="20"><span lang="EN-US">Oggetto molto semplice (cucchiaio di legno)<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; text-align: center;"><span lang="EN-US">Varie</span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Typical item (iron pot) " height="20"><span lang="EN-US">Oggetto tipico (pentola di ferro)<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Varies "><span lang="EN-US">Varie<span style=""></span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; text-align: center;" height="20"><span lang="EN-US">Oggetto di alta
qualità (campana)</span></td>
<td class="xl25" style=" width: 124px; text-align: center;" x:str="Varies "><span lang="EN-US">Varie<span style=""></span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Complex or superior item (lock) " height="20"><span lang="EN-US">Oggetto complesso o superiore (serratura)<span style=""></span></span></td>
<td class="xl25" style=" width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Varies "><span lang="EN-US">Varie<span style=""></span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt; page-break-inside: avoid; " height="17">
<td colspan="3" class="xl25" style="height: 12.75pt; width: 124px;" height="17"><span lang="EN-US"><font class="font6"><sup>1</sup></font><font class="font5"><span style=""></span></font></span><small><span lang="EN-US"> Bisonga essere un incantatore per costruire
uno di questi oggetti.</span></small></td>
</tr>
<tr style="height: 12.75pt; page-break-inside: avoid; " height="17">
<td colspan="3" class="xl25" style="height: 12.75pt; padding-bottom: 0pt; padding-top: 0pt; width: 124px;" height="17"><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"> Le trappole hanno&nbsp;specifiche regole
di costruzione.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 521pt;" width="694"> <col style="width: 135pt;" width="180"> <tbody>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" height="17">
<td colspan="2" style="height: 12.75pt; text-align: center; background-color: black; width: 302px;"><a name="Escape_Artist"></a>Artista della Fuga</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt;  font-weight: bold; text-align: center; width: 653px;" x:str="Restraint " height="17"><span lang="EN-US">Impedimento<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" font-weight: bold; text-align: center; width: 302px;"><span lang="EN-US"><st1:place w_x003a_st="on">CD di
Artista della Fuga</st1:place> </span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  text-align: center; background-color: rgb(204, 204, 204); width: 653px;" x:str="Ropes Binder&#8217;s " height="17"><span lang="EN-US">Legaccio di corda<span style="">&nbsp;</span></span></td>
<td class="xl27" style=" text-align: center; background-color: rgb(204, 204, 204); width: 302px;"><span lang="EN-US">Prova di Utilizzare Corde a +10</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  text-align: center; width: 653px;" height="17"><span lang="EN-US">I<font class="font6">ncantesimi <span style="font-style: italic;">animare corde</span></font><font class="font5">, </font><font style="font-style: italic;" class="font6">comandare
vegeteli</font>, <span style="font-style: italic;">controllare
vegetali</span> o i<span style="font-style: italic;">ntralciare</span>,
oppure una rete</span></td>
<td class="xl27" style=" text-align: center; width: 302px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  text-align: center; background-color: rgb(204, 204, 204); width: 653px;" x:str="Snare spell " height="17"><span lang="EN-US">Incantesimo
<span style="font-style: italic;">calappio&nbsp;</span></span></td>
<td class="xl27" style=" text-align: center; background-color: rgb(204, 204, 204); width: 302px;" x:num=""><span lang="EN-US">23</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  text-align: center; width: 653px;" x:str="Manacles " height="17"><span lang="EN-US">Manette<span style="">&nbsp;</span></span></td>
<td class="xl27" style=" text-align: center; width: 302px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  text-align: center; background-color: rgb(204, 204, 204); width: 653px;" x:str="Tight space " height="17"><span lang="EN-US">Spazio
ristretto<span style=""></span></span></td>
<td class="xl27" style=" text-align: center; background-color: rgb(204, 204, 204); width: 302px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt;  text-align: center; width: 653px;" x:str="Masterwork manacles " height="17"><span lang="EN-US">Manette perfette<span style=""></span></span></td>
<td class="xl27" style=" text-align: center; width: 302px;" x:num=""><span lang="EN-US">35</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; padding-bottom: 0pt; padding-top: 0pt;  text-align: center; background-color: rgb(204, 204, 204); width: 653px;" x:str="Grappler " height="17"><span lang="EN-US">Lottatore<span style=""></span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt;  text-align: center; background-color: rgb(204, 204, 204); width: 302px;"><span lang="EN-US">Risultato della prova di lottare del lottatore</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 95pt;" width="126"> <col style="width: 487pt;" width="649"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 301px;"><a name="Listen"></a>Ascoltare</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="text-align: center;  font-weight: bold; width: 654px;"><span lang="EN-US">Suono</span></td>
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 301px;" x:str="Listen DC " height="20"><span lang="EN-US">CD
di Ascoltare<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="&#8211;10 " height="20"><span lang="EN-US">Una
battaglia</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">&#8211;10<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 654px;" x:num="" height="20"><span lang="EN-US">Persone
che parlano<font class="font5"><sup>1</sup></font></span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  width: 301px;"><span lang="EN-US"></span><span lang="EN-US">0</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">Una
persona in armatura media che cammina con andatura lenta (3 m per
round) cercando di non fare rumore.</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Una persona senza armatura che cammina con
andatura lenta (4,5 m per round) cercando di non fare rumuore</span></td>
<td class="xl26" style="text-align: center;  width: 301px;"><span lang="EN-US"></span><span lang="EN-US">10</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">Un
ladro di 1° livello che utilizza Muoversi Silenziosamente per passare
oltre l'ascoltatore</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Persone che sussurrano<font class="font5"><sup>1</sup></font></span></td>
<td class="xl26" style="text-align: center;  width: 301px;"><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">Un
gatto che sta cacciando</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">19</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 654px;" x:num="" height="20"><span lang="EN-US">Un
gufo in planata per uccidere</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  width: 301px;"><span lang="EN-US"></span><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  font-weight: bold; background-color: rgb(204, 204, 204); width: 654px;" height="20"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">Condizione</span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">Modificatore alla CD di Ascoltare</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  width: 654px;" x:num="" height="20"><span lang="EN-US">Attraverso
una porta</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  width: 301px;"><span lang="EN-US"></span><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">Attraverso
una parete di roccia</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Per ogni 3 metri di distanza dall'ascoltatore</span></td>
<td class="xl26" style="text-align: center;  width: 301px;"><span lang="EN-US"></span><span lang="EN-US">1</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Ascoltatore distratto</span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">5</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="2" class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 301px;" height="20"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> Se si supera la CD di 10 o più, si può
comprendere ciò che viene detto, purché si capisca il linguaggio.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 96pt;" width="128"> <col style="width: 194pt;" width="258"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="width: 225px; height: 19px; background-color: black;"><a name="Disguise"></a>Camufare</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl28" style=" text-align: center; width: 273px; height: 19px; font-weight: bold;" x:str="Disguise "><span lang="EN-US">Camuffamento<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" text-align: center; width: 225px; height: 19px; font-weight: bold;"><span lang="EN-US">Modificatore alla Prova di Camuffare</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 19px; background-color: rgb(204, 204, 204);" x:str="Minor details only "><span lang="EN-US">Solo
dettagli minori<span style="">&nbsp;</span></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 19px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 21px;"><span lang="EN-US">camuffato di sesso diverso<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 21px;"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 1px; background-color: rgb(204, 204, 204);"><span lang="EN-US">camuffato di razza diversa<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 1px; background-color: rgb(204, 204, 204);"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 5px;"><span lang="EN-US">Camuffato di diversa categoria di età<font class="font7"><sup>1</sup></font></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 5px;"><span lang="EN-US">&#8211;2<font class="font7"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " height="20">
<td colspan="2" class="xl29" style="width: 225px; height: 23px;"><span lang="EN-US"><sup>1</sup><small><font class="font5"> Questi modificatori sono cumulativi;
utilizzare tutti quelli che si possono applicare.</font></small></span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " height="20">
<td colspan="2" class="xl29" style="padding-bottom: 0pt; padding-top: 0pt; width: 225px; height: 3px;"><span lang="EN-US"><sup>2</sup><small><font class="font5">
Per ogni grado di differenza tra la vera categoria di età del
personaggio e la categoria di età che si sta fingendo di avere. Le
categorie sono: giovane (più giovane della maturità), maturità,
mezz'età, vecchiaia, venerabile.</font></small></span></td>
</tr>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="width: 225px; height: 21px; background-color: rgb(102, 102, 102);">Impersonare
un Particolare Individuo</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl28" style=" text-align: center; width: 273px; height: 18px; font-weight: bold;"><span lang="EN-US">Familiarità</span></td>
<td class="xl24" style=" text-align: center; width: 225px; height: 18px; font-weight: bold;"><span lang="EN-US">Bonus alla Prova di Osservare</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 20px; background-color: rgb(204, 204, 204);" x:str="Recognizes on sight "><span lang="EN-US">Conoscenza
di vista<span style=""></span></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 20px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+4</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 16px;" x:str="Friends or associates "><span lang="EN-US">Amico
o socio<span style=""></span></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 16px;" x:num=""><span lang="EN-US">+6</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" text-align: center; width: 273px; height: 12px; background-color: rgb(204, 204, 204);" x:str="Close friends "><span lang="EN-US">Amico
del cuore<span style=""></span></span></td>
<td class="xl27" style=" text-align: center; width: 225px; height: 12px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+8</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt;  text-align: center; width: 273px; height: 22px;" x:str="Intimate "><span lang="EN-US">Intimo<span style=""></span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt;  text-align: center; width: 225px; height: 22px;" x:num=""><span lang="EN-US">+10</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 80pt;" width="106"> <col style="width: 47pt;" width="62"> <col style="width: 50pt;" width="67"> <col style="width: 28pt;" width="37"> <tbody>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" align="center" height="17">
<td colspan="4" style="height: 12.75pt; width: 205pt; background-color: black;"><a name="Ride"></a>Cavalcare</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 80pt;  text-align: center; font-weight: bold;" x:str="Task " height="20" width="106"><span lang="EN-US">Azione<span style=""></span></span></td>
<td class="xl24" style="width: 47pt;  text-align: center; font-weight: bold;" x:str="Ride DC " width="62"><span lang="EN-US">CD
di Cavalcare<span style=""></span></span></td>
<td class="xl24" style="width: 50pt;  text-align: center; font-weight: bold;" x:str="Task " width="67"><span lang="EN-US">Azione<span style=""></span></span></td>
<td class="xl24" style="width: 28pt;  text-align: center; font-weight: bold;" width="37"><span lang="EN-US"><st1:place w_x003a_st="on">CD di Cavalcare</st1:place> </span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt;  text-align: center; background-color: rgb(204, 204, 204);" x:str="Guide with knees " height="20" width="106"><span lang="EN-US">Guidare con le ginocchia<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 47pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="62"><span lang="EN-US">5</span></td>
<td class="xl25" style="width: 50pt;  text-align: center; background-color: rgb(204, 204, 204);" x:str="Leap " width="67"><span lang="EN-US">Salto<span style=""></span></span></td>
<td class="xl26" style="width: 28pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="37"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt;  text-align: center;" x:str="Stay in saddle " height="20" width="106"><span lang="EN-US">Rimanere in sella<span style=""></span></span></td>
<td class="xl26" style="width: 47pt;  text-align: center;" x:num="" width="62"><span lang="EN-US">5</span></td>
<td class="xl25" style="width: 50pt;  text-align: center;" x:str="Spur mount " width="67"><span lang="EN-US">Spronare
la cavalcatura<span style=""></span></span></td>
<td class="xl26" style="width: 28pt;  text-align: center;" x:num="" width="37"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt;  text-align: center; background-color: rgb(204, 204, 204);" x:str="Fight with warhorse " height="20" width="106"><span lang="EN-US">Combattere con un cavallo da guerra<span style=""></span></span></td>
<td class="xl26" style="width: 47pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="62"><span lang="EN-US">10</span></td>
<td class="xl25" style="width: 50pt;  text-align: center; background-color: rgb(204, 204, 204);" width="67"><span lang="EN-US"><span style="">&nbsp;</span>Controllare
una cavalcatura da battaglia</span></td>
<td class="xl26" style="width: 28pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="37"><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt;  text-align: center;" x:str="Cover " height="20" width="106"><span lang="EN-US">Copertura<span style=""></span></span></td>
<td class="xl26" style="width: 47pt;  text-align: center;" x:num="" width="62"><span lang="EN-US">15</span></td>
<td class="xl25" style="width: 50pt;  text-align: center;" width="67"><span lang="EN-US">Montare o
smontare velocemente</span></td>
<td class="xl26" style="width: 28pt;  text-align: center;" x:num="" width="37"><span lang="EN-US">20</span><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt;  text-align: center; background-color: rgb(204, 204, 204);" height="20" width="106"><span lang="EN-US">Caduta
morbida</span></td>
<td class="xl26" style="width: 47pt;  text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="62"><span lang="EN-US">15</span></td>
<td class="xl27" style="width: 50pt;  text-align: center; background-color: rgb(204, 204, 204);" width="67"></td>
<td class="xl28" style="width: 28pt;  text-align: center; background-color: rgb(204, 204, 204);" width="37"></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="4" class="xl25" style="height: 15pt; width: 205pt; padding-bottom: 0pt; padding-top: 0pt;" height="20" width="272"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> Alla prova si applica la penalita da armatura.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 341pt;" width="455"> <col style="width: 47pt;" width="62"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" class="xl24" style="height: 12.75pt; background-color: black; width: 351px;"><span lang="EN-US"><a name="Search"></a>Cercare</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 604px;" height="20"><span lang="EN-US">Azione</span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 351px;"><span lang="EN-US"><st1:place w_x003a_st="on">Search
DC</st1:place> </span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 604px;" height="20"><span lang="EN-US">Frugare in uno
scrigno pieno di ciarpame per trovare un oggetto particolare</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 351px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 604px;" x:str="Notice a typical secret door or a simple trap " height="20"><span lang="EN-US">Notare una
tipica porta segreta o una trappola semplice<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 351px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 604px;" height="20"><span lang="EN-US">Trovare una
trappola non magica difficile (solo ladro)<font class="font6"><sup>1</sup></font><font class="font5"><span style=""></span></font></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 351px;"><span lang="EN-US">21 o più</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 604px;" height="20"><span lang="EN-US">Trovare una
trappola magica (solo ladro)<font class="font6"><sup>1<span style=""></span></sup></font></span></td>
<td class="xl25" style="text-align: center;  width: 351px;"><span lang="EN-US">25 + livello dell'incantesimo utilizzato per
crearla</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 604px;" x:str="Notice a well-hidden secret door " height="20"><span lang="EN-US">Notare una porta segreta ben nascosta<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 351px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 604px;" x:str="Find a footprint " height="20"><span lang="EN-US">Trovare un'impronta<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 351px;"><span lang="EN-US">Variabile<font class="font6"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 351px;" height="20"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US">
I nani (anche se non sono ladri) possono utilizzare l'abilità Cercare
per scoprire trappole ricavate nella pietra o fatte di pietra.</span></small></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="2" class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 351px;" height="20"><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US">
Si può utilizzare l'abilità Cercare per rinvenire delle tracce o un
simile segno di passaggio, ma non si è in grado di seguirle. Vedi il
talento Seguire Tracce per la CD appropriata.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 521pt;" width="694"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk;" height="17">
<td colspan="2" style="height: 12.75pt; width: 306px; text-align: center; background-color: black;"><span style="color: white;"><a name="Concentration"></a>Concentrazione</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt;  width: 192px; font-weight: bold; text-align: center;" height="20"><span lang="EN-US">CD di
Concentrazione<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl24" style=" width: 306px; font-weight: bold; text-align: center;"><span lang="EN-US">Distrazione</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:str="10 + damage dealt " height="20"><span lang="EN-US">10 + danno subit<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Danno subito durante l'azione.<font class="font7"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; text-align: center;" x:str="10 + half of continuous " height="20"><span lang="EN-US">10 + metà del danno continuo<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" width: 306px; text-align: center;"><span lang="EN-US">Subire danno continuo durante l'azione.<font class="font7"><sup>3</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Distracting spell&#8217;s save DC " height="20"><span lang="EN-US">CD del tiro salvezza dell'incantesimo che
distrae<span style=""></span></span></td>
<td class="xl25" style=" width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Distratto da un incantesimo che non danneggia.<font class="font7"><sup>4</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">10</span></td>
<td class="xl25" style=" width: 306px; text-align: center;"><span lang="EN-US">Movimento
vigoroso (su una cavalcatura in movimento, un'agitata corsa su un
carro, una picola barca in acque agitate, sotto coperta in una nave in
mezzo alla tempesta).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:num="" height="20"><span lang="EN-US">15</span></td>
<td class="xl25" style=" width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Movimento violento (su un cavallo al
galoppo,&nbsp;un carro </span><span lang="EN-US">in
corsa</span><span lang="EN-US"> molto sballottato,
una piccola barca nelle rapide, un&nbsp;ponte di una nave in una
tempesta).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">20</span></td>
<td class="xl25" style=" width: 306px; text-align: center;"><span lang="EN-US">Movimento estremamente violento (terremoto<font class="font8">)</font><font class="font5">.</font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:num="" height="20"><span lang="EN-US">15</span></td>
<td class="xl25" style=" width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Intralciato.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">20</span></td>
<td class="xl25" style=" width: 306px; text-align: center;"><span lang="EN-US">In lotta o immobilizzato (si possono lanciare
solo incantesimi senza componenti somatiche e di cui</span><span lang="EN-US"> si hanno in mano</span><span lang="EN-US"> le componenti materiali).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:num="" height="20"><span lang="EN-US">5</span></td>
<td class="xl25" style=" width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">In condizioni di forte vento con pioggia
accecante o nevischio.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">10</span></td>
<td class="xl25" style=" width: 306px; text-align: center;"><span lang="EN-US">In condizioni di vento con grandine, polvere e
detriti.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt;  width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Distracting spell&#8217;s save DC " height="20"><span lang="EN-US">Distracting spell&#8217;s save DC<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">In condizioni di tempo atmosferico causato da
un incantesimo, come <span style="font-style: italic;">tempesta
di vendetta</span><font class="font8">.</font><font class="font7"><sup>4</sup></font></span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>1</sup></font></span><small><span lang="EN-US">
Se si prova a lanciare, concentrarsi su o dirigere un incantesimo
quando è avviene la distrazione, sommare il livello dell'incantesimo
alla CD indicata.</span></small></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>2</sup></font></span><small><span lang="EN-US">
SCome durante il lancio di un incantesimo con tempo di lancio di 1
round o più, o l'esecuzione di un'attività che richiede più di una
singola azione di round completo (come Disattivare Congegni). Anche il
danno provocato da un attacco di opportunità o da un attacco preparato
fatto in risposta ad un incantesimo lanciato (per gli incantesimi con
tempo di lancio di 1 azione) o l'azione intrapresa (per le attività
dche non richiedono più di un'azione di round&nbsp;completo).</span></small></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>2</sup></font></span><small><span lang="EN-US"> Come una <span style="font-style: italic;">freccia
acida</span>.</span></small></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>4</sup></font></span><small><span lang="EN-US"> Se l'incantesimo non concede un tiro salvezza,
utilizzare la CD che avrebbe avuto il tiro salveza se lo avesse
concesso.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <col span="3" style="width: 48pt;" width="64"> <tbody>
<tr style="color: white; font-family: Scala Sans-Blk;" align="center">
<td style="background-color: black;" colspan="6" rowspan="1"><a name="Diplomacy"></a>Diplomazia</td>
</tr>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="6" style="height: 12.75pt; text-align: center; width: 77px; background-color: rgb(102, 102, 102);" height="17">Influenzare gli Atteggiamenti dei&nbsp;PNG</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td colspan="1" rowspan="2" class="xl24" style="height: 12.75pt;  font-weight: bold; text-align: center; width: 110px;" height="17"><span lang="EN-US">Atteggiamento
Iniziale</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td colspan="5" class="xl24" style=" font-weight: bold; text-align: center; width: 77px;"><span lang="EN-US">&#8212;</span><span lang="EN-US">&#8212;&#8212;</span><span lang="EN-US"></span><span lang="EN-US">&#8212;
Nuovo Atteggiamento (CD da raggiungere)&#8212;&#8212;</span><span lang="EN-US">&#8212;</span><span lang="EN-US">&#8212;</span><span lang="EN-US">&#8212;</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 16px;  font-weight: bold; text-align: center; width: 90px;"><span lang="EN-US">Ostile</span></td>
<td class="xl25" style="height: 16px;  width: 79px; font-weight: bold; text-align: center;"><span lang="EN-US">Maldisposto</span></td>
<td class="xl25" style="height: 16px;  width: 77px; font-weight: bold; text-align: center;"><span lang="EN-US">Indifferente</span></td>
<td class="xl25" style="height: 16px;  width: 80px; font-weight: bold; text-align: center;"><span lang="EN-US">Amichevole</span></td>
<td class="xl25" style="height: 16px;  width: 55px; font-weight: bold; text-align: center;"><span lang="EN-US">Premuroso</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15px;  background-color: rgb(204, 204, 204); text-align: center; width: 110px;"><span lang="EN-US">Ostile</span></td>
<td class="xl27" style="height: 15px;  background-color: rgb(204, 204, 204); text-align: center; width: 90px;"><span lang="EN-US">Meno di 20</span></td>
<td class="xl27" style="height: 15px;  width: 79px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl27" style="height: 15px;  width: 77px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl27" style="height: 15px;  width: 80px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">35</span></td>
<td class="xl27" style="height: 15px;  width: 55px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">50</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt;  text-align: center; width: 110px;" height="20"><span lang="EN-US">Maldisposto</span></td>
<td class="xl27" style=" text-align: center; width: 90px;"><span lang="EN-US">Meno di 5</span></td>
<td class="xl27" style=" width: 79px; text-align: center;" x:num=""><span lang="EN-US">5</span></td>
<td class="xl27" style=" width: 77px; text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl27" style=" width: 80px; text-align: center;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl27" style=" width: 55px; text-align: center;" x:num=""><span lang="EN-US">40</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 11px;  background-color: rgb(204, 204, 204); text-align: center; width: 110px;"><span lang="EN-US">Indifferente</span></td>
<td class="xl27" style="height: 11px;  background-color: rgb(204, 204, 204); text-align: center; width: 90px;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="height: 11px;  width: 79px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Meno di 1</span></td>
<td class="xl27" style="height: 11px;  width: 77px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">1</span></td>
<td class="xl27" style="height: 11px;  width: 80px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl27" style="height: 11px;  width: 55px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 26px;  text-align: center; width: 110px;"><span lang="EN-US">Amichevole</span></td>
<td class="xl27" style="height: 26px;  text-align: center; width: 90px;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="height: 26px;  width: 79px; text-align: center;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="height: 26px;  width: 77px; text-align: center;"><span lang="EN-US">Meno di 1</span></td>
<td class="xl27" style="height: 26px;  width: 80px; text-align: center;" x:num=""><span lang="EN-US">1</span></td>
<td class="xl27" style="height: 26px;  width: 55px; text-align: center;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px;  background-color: rgb(204, 204, 204); text-align: center; width: 110px;"><span lang="EN-US">Premuroso</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px;  background-color: rgb(204, 204, 204); text-align: center; width: 90px;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px;  width: 79px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px;  width: 77px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px;  width: 80px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Meno di 1</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px;  width: 55px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">1</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="3" class="xl26" style="height: 12.75pt; width: 208px; background-color: rgb(102, 102, 102);">Atteggiamenti
dei PNG</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt;  font-weight: bold; text-align: center; width: 75px;" x:str="Attitude " height="17"><span lang="EN-US">Atteggiamento<span style="">&nbsp;</span></span></td>
<td class="xl24" style=" font-weight: bold; text-align: center; width: 211px;" x:str="Means "><span lang="EN-US">Significato<span style="">&nbsp;</span></span></td>
<td class="xl24" style=" font-weight: bold; text-align: center; width: 208px;"><span lang="EN-US">Azioni Possibili</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  background-color: rgb(204, 204, 204); text-align: center; width: 75px;" x:str="Hostile " height="17"><span lang="EN-US">Ostile<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; width: 211px;" x:str="Will take risks to hurt you "><span lang="EN-US">Correrà
dei rischi per nuocere al personaggio<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; width: 208px;"><span lang="EN-US">Attacca</span><span lang="EN-US">,
fugge</span><span lang="EN-US">, interferisce,
rimprovera</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 27px;  text-align: center; width: 75px;" x:str="Unfriendly "><span lang="EN-US">Maldisposto<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 27px;  text-align: center; width: 211px;" x:str="Wishes you ill "><span lang="EN-US">Si
augura il male del personaggio<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 27px;  text-align: center; width: 208px;"><span lang="EN-US">Evita, guarda con sospetto, </span><span lang="EN-US">inganna</span><span lang="EN-US">,
insulta</span><span lang="EN-US">, spettegola</span></td>
</tr>
<tr style="height: 15pt;" height="34">
<td class="xl25" style="height: 18px;  background-color: rgb(204, 204, 204); text-align: center; width: 75px;" x:str="Indifferent "><span lang="EN-US">Indifferent<span style="">e</span></span></td>
<td class="xl25" style="height: 18px;  background-color: rgb(204, 204, 204); text-align: center; width: 211px;" x:str="Doesn&#8217;t much care "><span lang="EN-US">Non
nutre interesse verso il personaggio<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 18px;  background-color: rgb(204, 204, 204); text-align: center; width: 208px;"><span lang="EN-US">Interazione sociale prevista</span></td>
</tr>
<tr style="height: 15pt;" height="51">
<td class="xl25" style=" height: 33px; text-align: center; width: 75px;" x:str="Friendly "><span lang="EN-US">Amichevole<span style=""></span></span></td>
<td class="xl25" style=" height: 33px; text-align: center; width: 211px;" x:str="Wishes you well "><span lang="EN-US">Si
augura il bene del personaggio<span style=""></span></span></td>
<td class="xl25" style=" height: 33px; text-align: center; width: 208px;"><span lang="EN-US">Consiglia</span><span lang="EN-US">,
difende</span><span lang="EN-US">, offre aiuto
limitato</span><span lang="EN-US">,</span><span lang="EN-US"></span><span lang="EN-US">
parla</span></td>
</tr>
<tr style="height: 15pt;" height="34">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt;  height: 21px; background-color: rgb(204, 204, 204); text-align: center; width: 75px;" x:str="Helpful "><span lang="EN-US">Premuroso<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt;  height: 21px; background-color: rgb(204, 204, 204); text-align: center; width: 211px;" x:str="Will take risks to help you "><span lang="EN-US">Correrà
dei rischi per aiutare il personaggio<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt;  height: 21px; background-color: rgb(204, 204, 204); text-align: center; width: 208px;"><span lang="EN-US">Aiuta</span><span lang="EN-US">,
guarisce</span><span lang="EN-US">, offre sostegno</span><span lang="EN-US">, protegge</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 150px;" border="0" cellpadding="0" cellspacing="0">
<col span="4" style="width: 48pt;" width="64">
<tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="4" style="height: 12.75pt; background-color: black; width: 574px;"><a name="Disable_Device"></a>Disattivare Congegni</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 48pt; height: 15px;  text-align: center; font-weight: bold;" x:str="Device " width="64"><span lang="EN-US">Congegno<span style="">&nbsp;</span></span></td>
<td class="xl26" style="height: 19px;  text-align: center; font-weight: bold; width: 85px;"><span lang="EN-US">Tempo</span></td>
<td class="xl27" style="height: 19px;  text-align: center; font-weight: bold; width: 207px;"><span lang="EN-US">CD di Disattivare Congegni<font class="font5"><sup>1</sup></font></span></td>
<td class="xl26" style="height: 19px;  text-align: center; font-weight: bold; width: 574px;"><span lang="EN-US">Esempio</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 19px;  text-align: center; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">Semplice</span></td>
<td class="xl24" style="height: 19px;  text-align: center; background-color: rgb(204, 204, 204); width: 85px;"><span lang="EN-US">1 round</span></td>
<td class="xl25" style="height: 19px;  text-align: center; background-color: rgb(204, 204, 204); width: 207px;" x:num=""><span lang="EN-US">10</span></td>
<td class="xl24" style="height: 19px;  text-align: center; background-color: rgb(204, 204, 204); width: 574px;"><span lang="EN-US">Bloccare una serratura</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 13px;  text-align: center;" width="64"><span lang="EN-US">Complicato</span></td>
<td class="xl24" style="height: 13px;  text-align: center; width: 85px;"><span lang="EN-US">1d4 round</span></td>
<td class="xl25" style="height: 13px;  text-align: center; width: 207px;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl24" style="height: 13px;  text-align: center; width: 574px;"><span lang="EN-US">Sabotare la ruota di un carro</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 14px;  text-align: center; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">Difficile</span></td>
<td class="xl24" style="height: 14px;  text-align: center; background-color: rgb(204, 204, 204); width: 85px;"><span lang="EN-US">2d4 round</span></td>
<td class="xl25" style="height: 14px;  text-align: center; background-color: rgb(204, 204, 204); width: 207px;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl24" style="height: 14px;  text-align: center; background-color: rgb(204, 204, 204); width: 574px;"><span lang="EN-US">Disarmare una trappola, riarmare una trappola</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 15px;  text-align: center;" width="64"><span lang="EN-US">Ostico</span></td>
<td class="xl24" style="height: 15px;  text-align: center; width: 85px;"><span lang="EN-US">2d4 round</span></td>
<td class="xl25" style="height: 15px;  text-align: center; width: 207px;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl24" style="height: 15px;  text-align: center; width: 574px;"><span lang="EN-US">Disarmare una trappola complessa, sabotare
astutamente un congegno meccanico</span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; " height="20">
<td colspan="4" class="xl24" style="padding-bottom: 0pt; padding-top: 0pt; height: 15px; width: 574px;"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> Se si tenta di non lasciare tracce della
manomissione, aggiungere 5 alla CD.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 126px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <col style="width: 48pt;" width="64"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="4" class="xl25" style="height: 12.75pt; text-align: center; width: 95px; background-color: black;"><a name="Balance"></a>Equilibrio</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style=" width: 155px; font-weight: bold; text-align: center; height: 15pt;" x:str="Narrow Surface " height="20"><span lang="EN-US">Superficie Stretta<span style="">&nbsp;</span></span></td>
<td class="xl24" style=" width: 100px; font-weight: bold; text-align: center;"><span lang="EN-US">CD di Equilibrio<font class="font6"><sup>1</sup></font><font class="font5"><span style=""></span></font></span></td>
<td class="xl24" style=" width: 143px; font-weight: bold; text-align: center;"><span lang="EN-US">Superficie Difficicile</span></td>
<td class="xl24" style=" width: 95px; font-weight: bold; text-align: center;"><span lang="EN-US">CD di Equilibrio<font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 155px; text-align: center; height: 12.75pt;" x:str="7&#8211;12 inches wide " height="17"><span lang="EN-US">16</span><span lang="EN-US">&#8211;</span><span lang="EN-US">30 cm di larghezza<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 100px; text-align: center;" x:num=""><span lang="EN-US">10</span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 143px; text-align: center;" x:str="Uneven flagstone "><span lang="EN-US">Superficie
lastricata<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 95px; text-align: center;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"></span></small></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  width: 155px; text-align: center;" x:str="2&#8211;6 inches wide " height="17"><span lang="EN-US">5</span><span lang="EN-US">&#8211;</span><span lang="EN-US">15 cm di larghezza</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style=" width: 100px; text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl25" style=" width: 143px; text-align: center;" x:str="Hewn stone floor "><span lang="EN-US">Superficie
in pietra tagliata<span style=""></span></span></td>
<td class="xl25" style=" width: 95px; text-align: center;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"></span></small></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 155px; text-align: center; height: 16px;" x:str="Less than 2 inches wide "><span lang="EN-US">Meno
di 5 cm di larghezza<span style="">&nbsp;</span></span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 100px; text-align: center; height: 16px;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 143px; text-align: center; height: 16px;" x:str="Sloped or angled floor "><span lang="EN-US">Superficie
angolare o ripida<span style=""></span></span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); width: 95px; text-align: center; height: 16px;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"></span></small></td>
</tr>
<tr style="height: 13.5pt; " height="18">
<td colspan="4" class="xl25" style="width: 95px; height: 18px;"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US"> Sommare appropriatamente i modificatori
derivanti da "Modificatori per le Superfici Strette", vedi sotto.</span></small></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="4" class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; width: 95px; height: 20px;"><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"> Solo se si corre o si carica. Fallire di 4 o
meno significa che il personaggio non corre o carica, ma può agire
normalmente.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="2" rowspan="1" class="xl24" style="height: 12.75pt; width: 135pt; text-align: center; background-color: rgb(102, 102, 102);"><span lang="EN-US">Modificatori per le Superfici Strette</span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl24" style="height: 15.75pt; width: 135pt;  font-weight: bold; text-align: center;" x:str="Surface " height="21" width="180"><span lang="EN-US">Sperficie<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 83pt;  font-weight: bold; text-align: center;" width="110"><span lang="EN-US">Modificatore CD<font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Lightly obstructed " height="17" width="180"><span lang="EN-US">Leggermente ostruita<span style="">
&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt;  text-align: center;" x:str="Severely obstructed " height="17" width="180"><span lang="EN-US">Pesantemente ostruita<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" height="17" width="180"><span lang="EN-US">Leggermente
scivolosa</span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt;  text-align: center;" x:str="Severely slippery " height="17" width="180"><span lang="EN-US">Estremamente scivolosa<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  text-align: center;" x:num="" width="110"><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt;  background-color: rgb(204, 204, 204); text-align: center;" x:str="Sloped or angled " height="17" width="180"><span lang="EN-US">Pendente o angolata<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt;  background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="2" class="xl25" style="height: 1pt; width: 218pt;" height="20" width="290"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> Sommare l'appropriato modificatore alla CD di
Equilibrio di una superficie stretta.</span><span lang="EN-US">
Questi modificatori si sommano.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 163pt;" width="217"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="2" style="height: 12.75pt; text-align: center; background-color: black; width: 401px;"><a name="Forgery"></a>Falsificare</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt;  text-align: center; font-weight: bold; width: 554px;" x:str="Condition " height="17"><span lang="EN-US">Condizion<span style="">e</span></span></td>
<td class="xl24" style=" text-align: center; font-weight: bold; width: 401px;"><span lang="EN-US">Modificatore del Lettore alla Prova di
Falsificare</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  text-align: center; background-color: rgb(204, 204, 204); width: 554px;" x:str="Type of document unknown to reader " height="17"><span lang="EN-US">Tipo di documento sconosciuto al lettore<span style=""></span></span></td>
<td class="xl26" style=" text-align: center; background-color: rgb(204, 204, 204); width: 401px;"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  text-align: center; width: 554px;" x:str="Type of document somewhat known to reader " height="17"><span lang="EN-US">Ttipo di documento in parte conosciuto dal
lettore<span style=""></span></span></td>
<td class="xl26" style=" text-align: center; width: 401px;" x:num=""><span lang="EN-US">+0</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  text-align: center; background-color: rgb(204, 204, 204); width: 554px;" x:str="Type of document well known to reader " height="17"><span lang="EN-US">Tipo di documento ben noto al lettore<span style=""></span></span></td>
<td class="xl26" style=" text-align: center; background-color: rgb(204, 204, 204); width: 401px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  text-align: center; width: 554px;" x:str="Handwriting not known to reader " height="17"><span lang="EN-US">Grafia sconosciuta al lettore<span style=""></span></span></td>
<td class="xl26" style=" text-align: center; width: 401px;"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  text-align: center; background-color: rgb(204, 204, 204); width: 554px;" x:str="Handwriting somewhat known to reader " height="17"><span lang="EN-US">Grafia in parte conosciuta dal lettore<span style=""></span></span></td>
<td class="xl26" style=" text-align: center; background-color: rgb(204, 204, 204); width: 401px;" x:num=""><span lang="EN-US">+0</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt;  text-align: center; width: 554px;" x:str="Handwriting intimately known to reader " height="17"><span lang="EN-US">Grafia conosciuta intimamente dal lettore<span style=""></span></span></td>
<td class="xl26" style=" text-align: center; width: 401px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; padding-bottom: 0pt; padding-top: 0pt;  text-align: center; background-color: rgb(204, 204, 204); width: 554px;" x:str="Reader only casually reviews the document " height="17"><span lang="EN-US">Il lettore controlla superficialmente il
documento<span style=""></span></span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt;  text-align: center; background-color: rgb(204, 204, 204); width: 401px;"><span lang="EN-US">&#8211;2</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col span="2" style="width: 48pt;" width="64">
<tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" rowspan="1" style="height: 19px; background-color: black; width: 301px;"><a name="Heal"></a>Guarire</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="text-align: center; height: 8px;  font-weight: bold; width: 654px;" x:str="Task Heal "><span lang="EN-US">Azione<span style=""></span></span></td>
<td class="xl24" style="text-align: center; height: 8px;  font-weight: bold; width: 301px;"><span lang="EN-US">CD di Guarire</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 2px;  background-color: rgb(204, 204, 204); width: 654px;"><span lang="EN-US">Cura a lungo termine<span style=""></span></span><span lang="EN-US"></span></td>
<td class="xl25" style="text-align: center; height: 2px;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 0px;  width: 654px;" x:str="Long-term care "><span lang="EN-US"></span><span lang="EN-US">Pronto soccorso</span></td>
<td class="xl25" style="text-align: center; height: 0px;  width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 13px;  background-color: rgb(204, 204, 204); width: 654px;"><span lang="EN-US">Trattare la ferita di un moribondo, <span style="font-style: italic;">crescita di spine</span>, <span style="font-style: italic;">rocce aguzze</span><font class="font6"><span style=""></span></font></span></td>
<td class="xl26" style="text-align: center; height: 13px;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 22px;  width: 654px;" x:str="Treat poison "><span lang="EN-US">Tratare
un avvelenamentio<span style=""></span></span></td>
<td class="xl25" style="text-align: center; height: 22px;  width: 301px;"><span lang="EN-US">CD del tiro salvezza del veleno</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 20px;  background-color: rgb(204, 204, 204); width: 654px;" x:str="Treat disease "><span lang="EN-US">Trattare
una malettia<span style=""></span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 20px;  background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">CD del tiro salvezza della malattia</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 80pt;" width="106"> <col style="width: 293pt;" width="390"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 159px;"><a name="Perform"></a>Intrattenere</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  font-weight: bold; width: 796px;" height="20">Intrattenimento</td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 159px;">CD
di Intrattenere</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 796px;" x:num="" height="20">Intarrenimento
di rutine. Cercare di guadagnare qualche soldo suonando in pubblico è
praticamente chiedere l'elemosina. Il personaggio guadagna 1d10 monete
di rame al giorno.</td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 159px;">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  width: 796px;" x:num="" height="20">Intrattenimento piacevole. In
una città prosperosa si possono guadagnare 1d10 monete d'argento al
giorno.</td>
<td class="xl26" style="text-align: center;  width: 159px;">15</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 796px;" x:num="" height="20">Grande
spettacolo. In una città ricca si possono guadagnare 3d10 monete
d'argento al giorno. Col tempo si pu essere invitati ad unirsi ad una
compagnia di professionisti e guadagnare una reputaione a livello
regionale.</td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 159px;">20</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center;  width: 796px;" x:num="" height="20">Spettacolo
memorabile. Inuna città prosperosa si possono guadagnare 1d6 monete
d'oro al giorno. Col tempo si può attirare l'attenzione di nobili
mecenati e guadagnare una reputazione a livello nazionale.</td>
<td class="xl26" style="text-align: center;  width: 159px;">25</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 796px;" x:num="" height="20">Spettacolo
straordinario. In una città ricca si possono guadagnare 3d6 monete
d'oro al giorno. Col tempo si può attirare l'attenzione di potenziali
mecenati lontani o anche di creature extraplanari.</td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 159px;">30</td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 253pt;" width="337"> <col style="width: 48pt;" width="64"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="height: 15pt; width: 301pt; background-color: black;"><a name="Move_Silently"></a>Muoversi Silenziosamente</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 253pt; text-align: center;  font-weight: bold;" x:str="Surface " height="20" width="337"><span lang="EN-US">Superficie<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 48pt; text-align: center;  font-weight: bold;" width="64"><span lang="EN-US">Modificatore alla
Prova</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 253pt; text-align: center;  background-color: rgb(204, 204, 204);" height="20" width="337"><span lang="EN-US">Rumorosa
(pietraia, acquitrino, bassa vegetazione, abbondanti macerie)</span></td>
<td class="xl26" style="width: 48pt; text-align: center;  background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 253pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; " x:str="Very noisy (dense undergrowth, deep snow) " height="20" width="337"><span lang="EN-US">Molto rumorosa
(folta vegetazione, neve profonda)<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 48pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; " width="64"><span lang="EN-US">&#8211;5</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" rowspan="1" class="xl28" style="height: 15pt; background-color: black; width: 131px;" height="20"><span lang="EN-US"><a name="Swim"></a>Nuotare</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 823px;" height="20"><span lang="EN-US">Acqua</span></td>
<td class="xl25" style="text-align: center;  font-weight: bold; width: 131px;"><span lang="EN-US"><st1:place w_x003a_st="on">CD di
Nuotare</st1:place>
</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 823px;" x:str="Calm water " height="20"><span lang="EN-US">Acque
calme<span style="">&nbsp;</span></span></td>
<td class="xl27" x:num="" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 823px;" x:str="Rough water " height="20"><span lang="EN-US">Acque
agitate<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 823px;" x:str="Stormy water " height="20"><span lang="EN-US">Acque tempestose<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">2</span><span lang="EN-US">0</span><span lang="EN-US"><font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="2" class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 131px;" height="20"><span lang="EN-US"></span><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> Non si può prendere 10 alle prove di Nuotare
in acque tempestose, anche se non si è minacciati o distratti in altro
modo.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="2" class="xl26" style="height: 15pt; text-align: center; background-color: black; width: 131px;"><a name="Spot"></a>Osservare</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 824px;" x:str="Condition " height="20"><span lang="EN-US">Condizion<span style="">e&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  font-weight: bold; width: 131px;"><span lang="EN-US">Penalità</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 824px;" x:str="Per 10 feet of distance " height="20"><span lang="EN-US">Per ogni 3 metri di distanza<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">&#8211;1</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 824px;" x:str="Spotter distracted " height="20"><span lang="EN-US">Osservatore distratto<span style=""></span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 131px;"><span lang="EN-US">&#8211;5</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 57pt;" width="76"> <col style="width: 192pt;" width="256"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="3" class="xl26" style="height: 15pt; background-color: black; width: 131px;"><span lang="EN-US"><a name="Speak_Language"></a>Parlare
Linguaggi</span></td>
</tr>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="3" class="xl24" style="height: 15pt; background-color: rgb(102, 102, 102); width: 131px;" height="20"><span lang="EN-US">Linguaggi Più
Comuni e Loro Alfabeto</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 130px;" x:str="Language " height="20"><span lang="EN-US">Linguaggio<span style=""></span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 692px;" x:str="Typical Speakers "><span lang="EN-US">Utilizzatori
Tipici<span style=""></span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 131px;"><span lang="EN-US">Alfabeto</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Abyssal " height="20"><span lang="EN-US">Abissale<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Demons, chaotic evil outsiders "><span lang="EN-US">Demoni,
esterni caotici malvagi<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Infernale</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Aquan " height="20"><span lang="EN-US">Aquan<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Water-based creatures "><span lang="EN-US">Creature
d'acqua<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Elfico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Auran " height="20"><span lang="EN-US">Auran<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Air-based creatures "><span lang="EN-US">Creature
d'aria<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Draconico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Celestial " height="20"><span lang="EN-US">Celestial<span style="">e</span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Good outsiders "><span lang="EN-US">Esterni
buoni<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Celestiale</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Common " height="20"><span lang="EN-US">Comune<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Humans, halflings, half-elves, half-orcs "><span lang="EN-US">Umani, halfling, mezzelfi, mezzorchi<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Comune</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Draconic " height="20"><span lang="EN-US">Draconic<span style="">o</span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;"><span lang="EN-US">Coboldi, trogloditi, lucertoloidi, draghi</span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Draconico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Druidic " height="20"><span lang="EN-US">Druidic<span style="">o</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Druids (only) "><span lang="EN-US">Druidi
(solo)<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Druidico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Dwarven " height="20"><span lang="EN-US">Elfico</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Dwarves "><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Elfi</span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US"></span><span lang="EN-US">Elfico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Elven " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US">Gigant<span style="">e</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Elves "><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Ogre,
giganti<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Nanico</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Giant " height="20"><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Gnome<span style="">sco</span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Ogres, giants "><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Gnomi<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Nanico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Gnome " height="20"><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Gnoll</span><span lang="EN-US"></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Gnomes "><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Gnoll</span><span lang="EN-US"></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Comune</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Goblin " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US">Goblin</span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Goblins, hobgoblins, bugbears "><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Goblin,
hobgoblin, bugbear</span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Nanico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Gnoll " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US">Halfling</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Gnolls "><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Halfling</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">Comune</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Halfling " height="20"><span lang="EN-US">Ignan</span><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Halflings "><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Creature delfuoco</span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">Draconico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Ignan " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US">Infernal<span style="">e</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Fire-based creatures "><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Diavoli, esterni legali malvagi</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">Infernale</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Infernal " height="20"><span lang="EN-US">Nanico</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Devils, lawful evil outsiders "><span lang="EN-US">Nani</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Nanico</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Orc " height="20"><span lang="EN-US">Orc<span style="">hesco</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;" x:str="Orcs "><span lang="EN-US">Orchi<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Nanico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 130px;" x:str="Sylvan " height="20"><span lang="EN-US">Silvano<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  width: 692px;" x:str="Dryads, brownies, leprechauns "><span lang="EN-US">Driadi,
brownie, leprecauni<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  width: 131px;"><span lang="EN-US">Elfico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 130px;" x:str="Terran " height="20"><span lang="EN-US">Sottocomune</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 692px;"><span lang="EN-US">Drow</span><span lang="EN-US"></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US"></span><span lang="EN-US">Elfico</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 130px;" x:str="Undercommon " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Terran</span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 692px;"><span lang="EN-US"></span><span lang="EN-US">Xorns
e altre creature di terra</span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 131px;"><span lang="EN-US">Nanico</span><span lang="EN-US"></span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 341pt;" width="455"> <col style="width: 47pt;" width="62"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="height: 15pt; background-color: black; width: 201px;"><a name="Sense_Motive"></a>Percepire Intenzioni</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 754px;" x:str="Task " height="20"><span lang="EN-US">Azione<span style=""></span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 201px;"><span lang="EN-US">CD di Percepire Intenzioni</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 754px;" x:str="Hunch " height="20"><span lang="EN-US">Sospetto<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 201px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 754px;" x:str="Sense enchantment " height="20"><span lang="EN-US">Percepire ammaliamento<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 201px;"><span lang="EN-US">25 o 15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 754px;" x:str="Discern secret message " height="20"><span lang="EN-US">Distinguere un messaggio segreto<span style=""></span></span></td>
<td class="xl28" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 201px;"><span lang="EN-US">Variabile</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 74px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 98pt;" width="130"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="2" class="xl24" style="height: 12.75pt; width: 157px; text-align: center; background-color: black;"><span lang="EN-US"><a name="Bluff_Examples"></a>Raggirare</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style=" width: 341px; font-weight: bold; text-align: center; height: 8px;"><span lang="EN-US">Circostanze di Esempio</span></td>
<td class="xl25" style=" width: 157px; font-weight: bold; text-align: center; height: 8px;"><span lang="EN-US">Modificatore a Percepire Intenzioni</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" width: 341px; background-color: rgb(204, 204, 204); text-align: center; height: 0px;"><span lang="EN-US">Il bersaglio vuole credere al personaggio.</span></td>
<td class="xl27" style=" width: 157px; background-color: rgb(204, 204, 204); text-align: center; height: 0px;"><span lang="EN-US">&#8211;5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" width: 341px; text-align: center; height: 0px;" x:str="The bluff is believable and doesn&#8217;t affect the target much. "><span lang="EN-US">L'inganno è credibile e non ha particolari
effetti sulla vittima.<span style=""></span></span></td>
<td class="xl27" style=" width: 157px; text-align: center; height: 0px;" x:num=""><span lang="EN-US">+0</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" width: 341px; background-color: rgb(204, 204, 204); text-align: center; height: 16px;" x:str="The bluff is a little hard to believe or puts the target at some risk. "><span lang="EN-US">L'inganno è un po' duro da credere e implica un
certo rischio per la vittima.<span style="">&nbsp;</span></span></td>
<td class="xl27" style=" width: 157px; background-color: rgb(204, 204, 204); text-align: center; height: 16px;" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" width: 341px; text-align: center; height: 21px;" x:str="The bluff is hard to believe or puts the target at significant risk. "><span lang="EN-US">L'inganno è molto difficile da credere e
implica un grosso rischio per la vittima.<span style="">&nbsp;</span></span></td>
<td class="xl27" style=" width: 157px; text-align: center; height: 21px;" x:num=""><span lang="EN-US">+10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt;  width: 341px; background-color: rgb(204, 204, 204); text-align: center; height: 19px;"><span lang="EN-US">L'inganno è inversimile, è quasi troppo assurdo
per essere preso in considerazione.</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt;  width: 157px; background-color: rgb(204, 204, 204); text-align: center; height: 19px;" x:num=""><span lang="EN-US">+20</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 341pt;" width="455"> <col style="width: 47pt;" width="62"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" align="center" height="20">
<td colspan="2" style="height: 15pt; background-color: black; width: 201px;"><a name="Sleight_of_Hand"></a>Rapidità di Mano</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 754px;" height="20"><span lang="EN-US">Azione</span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 201px;" x:str="Sleight of Hand DC "><span lang="EN-US">CD
di Rapidità di Mano<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 754px;" height="20"><span lang="EN-US">Sgraffignare un
oggetto grande come una moneta, far sparire una moneta</span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); width: 201px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 754px;" height="20"><span lang="EN-US">Sfilare un
piccolo oggetto ad una persona</span></td>
<td class="xl26" style="text-align: center;  width: 201px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 168pt;" width="224"> <col style="width: 83pt;" width="111"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 301px;"><a name="Jump"></a>Saltare</td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl25" style="height: 15.75pt; text-align: center;  font-weight: bold; width: 654px;" height="21"><span lang="EN-US">Distanza del
Salto in Lungo</span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 301px;"><span lang="EN-US">CD di Saltare<font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" height="17"><span lang="EN-US">1,5 metri</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center;  width: 654px;" height="17"><span lang="EN-US">3 metri</span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" height="17"><span lang="EN-US">4,5 metri</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center;  width: 654px;" height="17"><span lang="EN-US">6 metri</span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" height="17"><span lang="EN-US">7,5 metri</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center;  width: 654px;" height="17"><span lang="EN-US">9 metri</span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl24" style="height: 15.75pt; text-align: center;  font-weight: bold; background-color: rgb(204, 204, 204); width: 654px;" height="21"><span lang="EN-US">Distanza del
Salto in Alto<font class="font5"><sup>2</sup></font></span></td>
<td class="xl25" style="text-align: center;  font-weight: bold; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">CD di Saltare<font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  width: 654px;" x:str="1 foot " height="17"><span lang="EN-US">30
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">4</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="2 feet " height="17"><span lang="EN-US">60
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">8</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  width: 654px;" x:str="3 feet " height="17"><span lang="EN-US">90
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">12</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="4 feet " height="17"><span lang="EN-US">120
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">16</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  width: 654px;" x:str="5 feet " height="17"><span lang="EN-US">150
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="6 feet " height="17"><span lang="EN-US">180
</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">24</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  width: 654px;" x:str="7 feet " height="17"><span lang="EN-US">210
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 301px;" x:num=""><span lang="EN-US">28</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center;  background-color: rgb(204, 204, 204); width: 654px;" x:str="8 feet " height="17"><span lang="EN-US">240
centimetri<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">32</span></td>
</tr>
<tr style="height: 15pt; " align="justify" height="20">
<td colspan="2" class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; height: 26px; width: 301px;"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> Richiede una rincorsa di 6 metri. Senza
ricorsa, la CD raddoppia.</span></small></td>
</tr>
<tr style="height: 12.75pt; " align="justify" height="17">
<td colspan="2" class="xl26" style="height: 22px; width: 301px;"><span lang="EN-US"><font class="font5"><sup>2</sup></font></span><small><span lang="EN-US">&nbsp;Non include la portata verticale;
vedi sotto.</span></small></td>
</tr>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" align="center" height="17">
<td colspan="2" style="height: 20px; background-color: rgb(102, 102, 102); width: 301px;">Portata
Verticale</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="font-weight: bold; text-align: center;  height: 14px; width: 654px;" x:str="Creature Size "><span lang="EN-US">Taglia
della Creatura<span style=""></span></span></td>
<td class="xl24" style="font-weight: bold; text-align: center;  height: 14px; width: 301px;"><span lang="EN-US">Portata Verticale</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 16px; width: 654px;" x:str="Colossal "><span lang="EN-US">Colossal<span style="">e&nbsp;</span></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 16px; width: 301px;"><span lang="EN-US">3.840 </span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  height: 16px; width: 654px;" x:str="Gargantuan "><span lang="EN-US">Mastodontica<span style=""></span></span></td>
<td class="xl26" style="text-align: center;  height: 16px; width: 301px;"><span lang="EN-US">1.920 </span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 19px; width: 654px;" x:str="Huge "><span lang="EN-US">Enorme<span style=""></span></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 19px; width: 301px;"><span lang="EN-US">960 </span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  height: 10px; width: 654px;" x:str="Large "><span lang="EN-US">Grande<span style=""></span></span></td>
<td class="xl26" style="text-align: center;  height: 10px; width: 301px;"><span lang="EN-US">480 </span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 12px; width: 654px;" x:str="Medium "><span lang="EN-US">Media<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 12px; width: 301px;"><span lang="EN-US">24o&nbsp;</span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  height: 18px; width: 654px;" x:str="Small "><span lang="EN-US">Piccola<span style=""></span></span></td>
<td class="xl26" style="text-align: center;  height: 18px; width: 301px;"><span lang="EN-US">120&nbsp;</span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 21px; width: 654px;" x:str="Tiny "><span lang="EN-US">Minuscola<span style=""></span></span></td>
<td class="xl26" style="text-align: center;  background-color: rgb(204, 204, 204); height: 21px; width: 301px;"><span lang="EN-US">60&nbsp;</span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center;  height: 20px; width: 654px;" x:str="Diminutive "><span lang="EN-US">Minuta<span style=""></span></span></td>
<td class="xl26" style="text-align: center;  height: 20px; width: 301px;"><span lang="EN-US">30&nbsp;</span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); height: 12px; width: 654px;" x:str="Fine "><span lang="EN-US">Piccolissima<span style=""></span></span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); height: 12px; width: 301px;"><span lang="EN-US">15&nbsp;</span><span lang="EN-US">centimetri<span style=""></span></span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" class="xl24" style="height: 12.75pt; background-color: black; width: 151px;"><span lang="EN-US"><a name="Spellcraft"></a>Sapienza
Magica</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 804px;" height="20"><span lang="EN-US">Azione</span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 151px;" x:str="Spellcraft DC "><span lang="EN-US">CD
Sapienza Magica<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Quando si
utilizza <span style="font-style: italic;">lettura del
magico</span>, identifica un <span style="font-style: italic;">glifo
di interdizione</span>. Nessuna azione richiesta<font class="font5">.</font></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">13</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" x:str="Identify a spell being cast. (You must see or hear the spell&#8217;s verbal or somatic components.) No action required. No retry. " height="20"><span lang="EN-US">Identificare
un incantesimo al momento del lancio (il personaggio deve vedere o
sentire le componenti somatiche o verbali dell'incantesimo).<span style=""> Nessuna azione richiesta. Non è possibile
ritentare.</span></span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Imparare
un incantesimo da un libro degli incantesimi o da una pergamena (solo
maghi). Non è possibile ritentare per quell'incantesimo fino a quando
il personaggio non guadagna almeno 1 grado in Sapienz Magica (anche nel
caso in cui il personaggio trovi un'altra fonte da cui tentare di
imparare l'incantesimo). Richiede 8 ore.</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" x:str="Prepare a spell from a borrowed spellbook (wizard only). One try per day. No extra time required. " height="20"><span lang="EN-US">Preparare
un incantesimo da un libro degli incantesimi prestato (solo maghi). Un
tentativo al giorno. Non c'è bisogno di tempo extra.<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Quando si lancia
<span style="font-style: italic;">individuazione
del magico</span>,
determina la scuola di magia coinvolta nell'aura di un singolo oggetto
o creatura che il eprsonaggio può vedere. (Se l'aura non è dovuta
all'effetto di un incantesimo, la CD è 15 + metà del livello
dell'incantatore<font class="font5">.) Nessuna azione
richiesta</font></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Quando si
utilizza <span style="font-style: italic;">lettura del
magico</span>, identifica un <span style="font-style: italic;">simbolo</span>.
Nessuna azione richiesta<font class="font5">.</font></span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:num=""><span lang="EN-US">19</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Identifica
un incantesimo che è già in effetto in un'area (il personaggio deve
essere in grado di vedere o individuare gli effetti dell'incantesimo).
Nessuna azione richiesta. Non è possibile ritentare.</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:str="20 + spell level "><span lang="EN-US">20
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Identificare
materiali creati o modellati con la magia, come notare che un moro in
ferro è il risultato di un incantesimo <span style="font-style: italic;">muro di ferro</span>.
Nessuna azione richiesta. Non è possibile ritentare<font class="font5">.</font></span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:str="20 + spell level "><span lang="EN-US">20
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Decifrare un
incantesimo scritto (come una pergamena) senza utilizzare <span style="font-style: italic;">lettura del magico</span>.
Un tentativo al giorno. Richiede un'azione di round completo<font class="font5">.</font></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:str="20 + spell level "><span lang="EN-US">20
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Dopo
aver effettuato un tiro salvezza contro un incantesimo mirato contro il
personaggio, determina di quale incantesimo si trattava. Nesuna azione
richiesta. Non è possibile ritentare.</span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:str="25 + spell level "><span lang="EN-US">25
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Identificare una
pozione. Richiede 1 minuto. Non è possibile ritentare.</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Disegnare
un diagramma per tracciare un'ancora dimensionale all'interno di un
cerchio magico. Occorrono 10 minuti. Non è possibil eritentare. Il DM
effettua questa prova<font class="font5">.</font></span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Comprendere
un effetto magico strano o unico, come gli effetti di un flusso magico.
Il tempo richiesto varia. Non è possibile ritentare.</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:str="30 or higher "><span lang="EN-US">30 or
higher<span style="">&nbsp;</span></span></td>
</tr>
</tbody>
</table><table style="border-collapse: collapse; width: 100%; height: 102px;" x:str="" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="2" style="height: 15px; text-align: center; background-color: black; width: 824px;"><a name="Climb"></a>Scalare</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15px;  font-weight: bold; text-align: center; width: 131px;" x:str="Climb DC "><span lang="EN-US">CD di
Scalare<span style="">&nbsp;</span></span></td>
<td class="xl26" style="height: 15px;  font-weight: bold; text-align: center; width: 824px;"><span lang="EN-US">Superficie o Attività di Esempio</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 9px; width: 131px;" x:num=""><span lang="EN-US">0</span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 9px; width: 824px;"><span lang="EN-US">Una pendenza troppo ripida per potervi
camminare sopra,o una corda con nodi e una parete a cui appoggiarsi.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" text-align: center; height: 11px; width: 131px;" x:num=""><span lang="EN-US">5</span></td>
<td class="xl25" style=" text-align: center; height: 11px; width: 824px;"><span lang="EN-US">Una corda con una parete a cui appoggiarsi o
una corda con nodi, o una corda influenzata dall'incantesimo <span style="font-style: italic;">trucco della corda</span><font class="font5">.<span style=""></span></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 4px; width: 131px;" x:num=""><span lang="EN-US">10</span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 4px; width: 824px;" x:str="A surface with ledges to hold on to and stand on, such as a very rough wall or a ship&#8217;s rigging. "><span lang="EN-US">Una superficie con sporgenze per tenersi e
appoggiarsi, con una parte molto irregolare o il sartiame di una nava.<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style=" text-align: center; height: 18px; width: 131px;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl25" style=" text-align: center; height: 18px; width: 824px;" x:str="Any surface with adequate handholds and footholds (natural or artificial), such as a very rough natural rock surface or a tree, or an unknotted rope, or pulling yourself up when dangling by your hands. "><span lang="EN-US">Qualsiasi
superficie con appigli adeguati per mani e piedi (naturali o
artificiali), comeuna superficie rocciosa naturale molto irregolare
oppure un albero; oppure una corda senza nodi, o tirarsi su mentre si è
appoggiati solo con le mani.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 20px; width: 131px;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 20px; width: 824px;" x:str="An uneven surface with some narrow handholds and footholds, such as a typical wall in a dungeon or ruins. "><span lang="EN-US">Una superficie ruvida con qualche appiglio
stretto per mani e piedi, come una tipica parete in un dungeon o tra le
rovine.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" text-align: center; height: 0px; width: 131px;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl25" style=" text-align: center; height: 0px; width: 824px;" x:str="A rough surface, such as a natural rock wall or a brick wall. "><span lang="EN-US">Una superficie irregolare, con una parete di
roccia naturale o un muro di mattoni.<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 0px; width: 131px;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl25" style=" background-color: rgb(204, 204, 204); text-align: center; height: 0px; width: 824px;" x:str="An overhang or ceiling with handholds but no footholds. "><span lang="EN-US">Sporgenza o soffitto con appigli per le mani ma
non per i piedi.<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt;  text-align: center; height: 0px; width: 131px;" x:str="&#8212; "><span lang="EN-US">&#8212;<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt;  text-align: center; height: 0px; width: 824px;"><span lang="EN-US">Una superficie verticale perfettamente liscia e
piatta non può essere scalata.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style=" font-weight: bold; background-color: rgb(204, 204, 204); text-align: center; height: 19px; width: 131px;"><span lang="EN-US">Modificatore alla&nbsp;CD di Scalare<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl26" style=" font-weight: bold; background-color: rgb(204, 204, 204); text-align: center; height: 19px; width: 824px;"><span lang="EN-US">Superficie o Attività di Esempio</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style=" text-align: center; height: 2px; width: 131px;"><span lang="EN-US">&#8211;10</span></td>
<td class="xl27" style=" text-align: center; height: 2px; width: 824px;"><span lang="EN-US"><span style=""></span>Scalare
un acamino (artificiale o naturale) o un altro luogo in cui ci si può
appoggiare a due areti opposte (riduce la normale CD di 10).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style=" background-color: rgb(204, 204, 204); text-align: center; height: 11px; width: 131px;" x:str="&#8211;5 "><span lang="EN-US">&#8211;5<span style=""></span></span></td>
<td class="xl27" style=" background-color: rgb(204, 204, 204); text-align: center; height: 11px; width: 824px;"><span lang="EN-US">Scalare un aongolo in cui è possibile
appoggiarsi a pareti perpendicolari (riduce la normale CD di 5).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td x:num="" style=" text-align: center; height: 0px; width: 131px;" class="xl27"><span lang="EN-US">+5</span></td>
<td class="xl27" style=" text-align: center; height: 0px; width: 824px;"><span lang="EN-US"><span style="">&nbsp;</span></span><span lang="EN-US">La superficie è scivolosa (aumenta la CD di 5)</span><span lang="EN-US">.</span></td>
</tr>
<tr style="height: 15pt; " height="20">
<td colspan="2" class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 3px; width: 824px;"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> </span><span lang="EN-US">Questi
modificatori sono cumulativi, utilizzare quelli applicabili.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 80pt;" width="106"> <col style="width: 48pt;" width="64"> <col style="width: 50pt;" width="67"> <col style="width: 28pt;" width="37"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="4" class="xl26" style="height: 15pt; background-color: black; width: 52px;"><span lang="EN-US"><a name="Open_Lock"></a>Scassinare
Serrature</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 401px;" x:str="Lock " height="20"><span lang="EN-US">Serratura<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 51px;" x:str="DC "><span lang="EN-US">CD<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 416px;" x:str="Lock "><span lang="EN-US">Serratura<span style=""></span></span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 52px;"><span lang="EN-US">CD</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 401px;" x:str="Very simple lock " height="20"><span lang="EN-US">Serratura molto semplice<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 51px;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 416px;" x:str="Good lock "><span lang="EN-US">Serratura
buona<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 52px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 401px;" height="20"><span lang="EN-US">Serratura media</span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 51px;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 416px;" x:str="Amazing lock "><span lang="EN-US">Serratura
eccezionale<span style=""></span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 52px;" x:num=""><span lang="EN-US">40</span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 151px;"><a name="Survival"></a>Sopravvivenza</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 804px;" height="20"><span lang="EN-US">Azione</span></td>
<td class="xl24" style="text-align: center;  font-weight: bold; width: 151px;" x:str="Survival DC "><span lang="EN-US">CD di
Sopravvivenza<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Si
è in grado di cavarsela in territori selvaggi. Ci si muove alla metà
della propria velocità su terra mentre si caccia e si saccheggia (non
sono necesarie scorte ne di cibo ne di acqua). Si può fornire cibo e
acqua per un'altra persona per ogni 2 punti con cui il risultato della
prova supera 10.</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Si
guadagna un bonus di +2 a tutti i tiri salvezza sulla Tempra contro
avverse condizioni atmosferiche mentre ci si muove alla metà della
propria velocità su terra, o un bonus di +4 se si rimane fermi. Si può
garantire lo stesso bonus ad un altro personaggio per ogni punto con
cui il risultato della prova supera il 15.</span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Si evita di
perdersi e si evitano i pericoli naturali, come le sabbie mobili.</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Si
è in grado di predire il tempo fino a 24 ore di anticipo. Per ogni 5
punti con cui il risultato della prova di Sopravvivenza supera il 15 si
può predire il tempo per un ulteriore giorno di&nbsp;anticipo.</span></td>
<td class="xl25" style="text-align: center;  width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Si è in grado di
seguire tracce (vedi il talento Seguire Tracce).</span></td>
<td class="xl25" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:str="Varies "><span lang="EN-US">Variabile<span style="">&nbsp;</span></span></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" height="17">
<td colspan="2" style="height: 12.75pt; text-align: center; background-color: black; width: 151px;"><a name="Use_Rope"></a>Utilizzare Corde</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 804px;" height="20"><span lang="EN-US">Azione</span></td>
<td class="xl25" style="text-align: center;  font-weight: bold; width: 151px;"><span lang="EN-US">CD di Utilizzare Corde</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Fare un nodo
stretto</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Fissare un
rampino</span></td>
<td class="xl27" style="text-align: center;  width: 151px;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Fare un nodo
speciale, come un nodo scorsoio, che scorre lentamente o si scioglie
con uno strattone</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Legarsi una
corda attorno con una mano sola</span></td>
<td class="xl27" style="text-align: center;  width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 804px;" height="20"><span lang="EN-US">Intrecciare due
corde</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 151px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 804px;" height="20"><span lang="EN-US">Legare un
personaggio</span></td>
<td class="xl27" style="text-align: center;  width: 151px;"><span lang="EN-US">Varies</span></td>
</tr>
<tr style="height: 15pt; " align="center" height="20">
<td colspan="2" class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: left; width: 151px;" height="20"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US"> Sommare 2 alla CD per ogni 3 metri di corda
lanciati.</span></small></td>
</tr>
</tbody>
</table><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" align="center" height="20">
<td colspan="2" style="height: 15pt; background-color: black; width: 251px;"><a name="Use_Magic_Device"></a>Utilizzare Oggetti Magici</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center;  font-weight: bold; width: 704px;" x:str="Task " height="20"><span lang="EN-US">Azione<span style=""></span></span></td>
<td class="xl25" style="text-align: center;  font-weight: bold; width: 251px;"><span lang="EN-US">CD di Utilizzare Oggetti Magici</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 704px;" x:str="Activate blindly " height="20"><span lang="EN-US">Attivare alla cieca<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 251px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 704px;" x:str="Decipher a written spell " height="20"><span lang="EN-US">Decifrare un incantesimo scritto<span style=""></span></span></td>
<td class="xl27" style="text-align: center;  width: 251px;"><span lang="EN-US">25 + livello dell'incantesimo</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 704px;" x:str="Use a scroll " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US">Emulare
un allineamento</span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 251px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 704px;" x:str="Use a wand " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US"></span><span lang="EN-US">Emulare un privilegio di classe</span></td>
<td class="xl27" style="text-align: center;  width: 251px;" x:num=""><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 704px;" x:str="Emulate a class feature " height="20"><span lang="EN-US">Emulare un punteggio di caratteristica</span><span lang="EN-US"></span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 251px;" x:num=""><span lang="EN-US">Vedi testo</span><span lang="EN-US"></span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  width: 704px;" x:str="Emulate an ability score " height="20"><span lang="EN-US"><span style=""></span></span><span lang="EN-US">Emulare una razza</span></td>
<td class="xl27" style="text-align: center;  width: 251px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center;  background-color: rgb(204, 204, 204); width: 704px;" x:str="Emulate a race " height="20"><span lang="EN-US">Utilizzare una bacchetta</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl27" style="text-align: center;  background-color: rgb(204, 204, 204); width: 251px;" x:num=""><span lang="EN-US">20</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 704px;" x:str="Emulate an alignment " height="20"><span lang="EN-US">Utilizzare una pergamena</span><span lang="EN-US"><span style=""></span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center;  width: 251px;" x:num=""><span lang="EN-US">20 + livello
dell'incantatore</span><span lang="EN-US"></span></td>
</tr>
</tbody>
</table></body></html>