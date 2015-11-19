<?php

try{
$db = new PDO('mysql:host=127.0.0.1;dbname=biz', 'root', '', array(PDO::ATTR_PERSISTENT => TRUE));
echo "Connected successfully";

}catch(Exception $e){
die("Unable to connect to MYSQL" . $e->getMessage());
}

try{

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$db->beginTransaction();
$sql = "DELETE FROM customer_data WHERE item IN('Chromebook')";

$db->exec($sql);
echo "Record deleted successfully";
//$db->commit;
}catch(PDOException $e){
//$db->rollBack();
echo $sql . "<br>" . $e->getMessage();
}


?>