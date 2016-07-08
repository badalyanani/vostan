<?php
/* SQL Connection Helper Functions */
function getConnection($argv) {
	$vostan = "";
	if (isset($argv)) {
		$vostan = $argv[1];
	} else {
		$vostan = $_GET['argument1'];
	}
	$dbh = new PDO("sqlite:$vostan");

	$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

/* Function to upgrade vostan.db
 * - replace 'Query' tag to 'vostan::query(e{}.{}, desc(nodeID))' 
 * - update vostan.db version
 * */
function upgradeDb($argv){
    try {
        $db = getConnection($argv);

        $sql1 = "update links set nodeID = linkedNodeID, linkedNodeID = nodeID where linkedNodeID in (select nodeID from nodes where tags LIKE '%'||'vostan::query'||'%')";
               
        $stmt = $db -> prepare($sql1);
        $stmt -> execute();

        $sql4 = "INSERT OR IGNORE INTO versions VALUES ('1.9', 'Update Query directions');";
        $stmt = $db->prepare($sql4);
        $stmt -> execute();
    } catch(PDOException $e) {
        echo '{"error": "' . $e -> getMessage() . '"}';
    }
}

upgradeDb($argv);

?>
