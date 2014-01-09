<?php

// --- config start -> move to config.inc.php ? ---
// BitMatrix: move configuration to config/config.php
 
// OpenDNSSEC configuration file containing the zone list
$zonelist = 'zonelist.xml';

// --- config end ---

// action: list all zones

// Load and parse XML
$xml = simplexml_load_file($zonelist);

// List all zone names
$result = $xml->xpath('/ZoneList/Zone');

print_r($result);

// New result array
$zone_list = array();

// Walk all zone tags
foreach ($result as $r) {
	// extract zone name
	$attrList = $r->attributes();
	$zone_name = $attrList['name'];
	
	// add to result
	$zone_list[$zone_name] = $r;
}

// sort asc
ksort($zone_list);

// debug: dump data structure
print_r($zone_list);

// test: output as json
echo json_encode($zone_list);

// TODO: one file per action? or one file calling methods?
// BitMatrix: simple request dispatcher, one Class per action 
