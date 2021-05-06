<?php



function saveToBD($userName, $userMail, $userPhone){
	require 'toEdit.php';
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $BASE_NAME);

	if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}


	$query = "INSERT INTO ".$TABLE_NAME." (userName,userEmail,userPhone,userDate) VALUES (?,?,?,now())";


	if (!($stmt = $mysqli->prepare($query))) {
    echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if (!$stmt->bind_param("sss", $userName,$userMail,$userPhone)) {
    echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
	}
	return $stmt->execute();
}

?>