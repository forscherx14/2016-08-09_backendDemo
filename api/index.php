<?php
	
	include_once('obj/dbCon.php');

	$result = array();
	$intention = $_POST["intention"];
	// $d1 = $_POST['d1'];
	// $d2 = $_POST['d2'];
	// $d3 = $_POST['d3'];

	//echo $d1 . $d2 . $d3;
	switch( $intention ){
		case "insertARecord":
				$d1 = $_POST['d1'];
				$d2 = $_POST['d2'];
				$d3 = $_POST['d3'];
				$sql = "INSERT INTO backendDemo(d1, d2, d3) VALUES('".$d1."', '".$d2."', '".$d3."')";
				$db->query( $sql );
				$result['status'] = "success";
			break;
		case "selectARecord":
				$rec = array();
				$data = array();
				$searchKey = $_POST["d4"];
				$sql = "SELECT * from backendDemo WHERE d1 = '".$searchKey."'";
				$r = $db->query( $sql );

				if( $r->num_rows > 0 ){

					for( $i = 0; $i< $r->num_rows; $i++ ){
						$row = mysqli_fetch_array($r);


						array_push( $rec, $row['id']);
						array_push( $rec, $row['d1']);
						array_push( $rec, $row['d2']);
						array_push( $rec, $row['d3']);
						array_push( $rec, $row['dateCreated']);
						array_push( $data, $rec);
						$rec = array();
					}

					$result['data'] = $data;
					

				}else{
					$result['data']   = "no records found";
				}


				$result['status'] = "success";
				
			break;
	}

	

	echo json_encode($result);
?>