<?php

include 'simple_html_dom.php';
$dom = new DOMDocument();
@$dom->loadHTMLFile('http://redsnovelty.com/THU007STAT.html');
$xpath = new DOMXPath($dom);

//$tr = $xpath->query('//table[7]/tbody/tr');

$level_seven = $xpath->query('//table[7]/tbody/tr/td[contains(@style,"bold")]');

$colspan = $xpath->query('//table[7]/tbody/tr/td[not(@colspan = 22)]');

$xml = new DOMDocument();

foreach($level_seven as $teams) {
	$team = $xml->appendChild($xml->createElement("team"));
	
	$teamname = $xpath->query('.', $teams)->item(0)->nodeValue;
	$team->appendChild($xml->createElement("teamname", $teamname));
	
	$members = $xpath->query('../following-sibling::tr', $teams);
	
	foreach($members as $player) {
	
		//if($xpath->query('./td[contains(., "Team Totals")]', $player) break;
	
		$member = $team->appendChild($xml->createElement("member"));
		
		$name = $xpath->query('./td', $player)->item(0)->nodeValue;
		$member->appendChild($xml->createElement("name", $name));
		
		if($name = "Team Totals:") break;		
		//../preceding-sibling::tr/td[@colspan = 22] and following-sibling::tr/td[contains(., "Team Totals")]
		
		//td[contains(., 'Chapter')]	
	}
	/*--	
	
	$member = $team->appendChild($xml->createElement("member"));
		
	$name = $xpath->query('../following-sibling::tr/td', $teams)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("name", $name));
		
	$ppd = $xpath->query('.//td[2]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("ppd", $ppd));
	
	$games = $xpath->query('.//td[3]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("games", $games));
	
	$wins = $xpath->query('.//td[4]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("wins", $wins));
	
	$lton = $xpath->query('.//td[5]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("lton", $lton));
	
	$hton = $xpath->query('.//td[6]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("hton", $hton));
	
	$xhats = $xpath->query('.//td[7]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("xhats", $xhats));
	
	$sixdo = $xpath->query('.//td[8]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("sixdo", $sixdo));
	
	$sevendo = $xpath->query('.//td[9]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("sevendo", $sevendo));
	
	$eightdo = $xpath->query('.//td[10]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("eightdo", $eightdo));
	
	$ninedo = $xpath->query('.//td[11]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("ninedo", $ninedo));
	
	$fourro = $xpath->query('.//td[12]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("fourro", $fourro));
	
	$hstout = $xpath->query('.//td[13]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("hstout", $hstout));
	
	$hstton = $xpath->query('.//td[14]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("hstton", $hstton));
	
	$mpr = $xpath->query('.//td[15]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("mpr", $mpr));
	
	$fivemr = $xpath->query('.//t6[15]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("fivemr", $fivemr));
	
	$sixmr = $xpath->query('.//td[17]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("sixmr", $sixmr));
	
	$sevenmr = $xpath->query('.//td[18]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("sevenmr", $sevenmr));
	
	$eightmr = $xpath->query('.//td[19]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("eightmr", $eightmr));
	
	$ninemr = $xpath->query('.//td[20]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("ninemr", $ninemr));
	
	$chats = $xpath->query('.//td[21]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("chats", $chats));
	
	$whorse = $xpath->query('.//td[22]', $tr)->item(0)->nodeValue;
	$member->appendChild($xml->createElement("whorse", $whorse));
	--*/
}

echo $xml->saveXML();

?>