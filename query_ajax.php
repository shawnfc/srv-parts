<?php
try {
$db = new PDO("mysql:host=localhost;dbname=sourceo4_main", "sourceo4", "Source&Recreation04", array(PDO::ATTR_PERSISTENT => true));
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();
if ($_SESSION["uid"] == 1)
{
	$mode = $_POST["mode"];
	// $mode = "test";
	// $tables = []; foreach ($db->query("SHOW TABLES") as $t) $tables[] = $t[0];
	$tables = ["dealers","states"];

	switch($mode)
	{
		case "load_tables":
			foreach ($tables as $table) echo "<div>$table</div>";
		break;
		
		case "load_results":
			$tbl = $_POST["tbl"];
			if (in_array($tbl,$tables))
			{
				$order = "";
				if (isset($_POST["order"])) $order = "ORDER BY " . $_POST["order"];
				$stmt = $db->prepare("SELECT * FROM $tbl $order");
				$stmt->execute();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo "<input id='table_name' type=hidden value='$tbl' /><table border=1 style='border-collapse:collapse;'><tr>";
				foreach ($rows[0] as $key => $val) echo "<th>$key</th>";
				
				$length = count($rows);
				$id = 0;
				for ($i=0;$i<$length;$i++)
				{
					echo "<tr>";
					foreach ($rows[$i] as $key => $val)
					{
						if ($key == "id") $id = $val;
						echo "<td data-id=$id data-field='$key' data-table='$tbl' onclick='edit(this);'>$val</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			else echo "SQL INJECTION!";
		break;
		
		case "update":
			$tbl = $_POST["tbl"];
			if (in_array($tbl,$tables))
			{
				$fld = $_POST["fld"];
				
				$fields = [];
				$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'sourceo4_main' AND TABLE_NAME='$tbl';";
				foreach ($db->query($sql) as $f) $fields[] = $f[0];
				
				if (in_array($fld,$fields))
				{
					$id = $_POST["id"];
					$val = $_POST["val"];
					$sql = "UPDATE $tbl SET $fld = ? WHERE id = ?";
					$stmt = $db->prepare($sql);
					$stmt->execute(array($val,$id));
					echo "UPDATE $tbl SET $fld = '$val' WHERE id=$id";
				}
				else echo "SQL INJECTION!!";
			}
			else echo "SQL INJECTION!";
		break;
		
		case "execute":
			$stmt = $db->prepare($_POST["sql"]);
			$stmt->execute();
			echo "success";
		break;
		
		case "test":
			
		break;
	}
}
else "not authorized";

} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>