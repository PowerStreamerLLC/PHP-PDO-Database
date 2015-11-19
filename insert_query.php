<?php
include_once ('db_connect.php');

try{
$handler = new PDO('mysql:host=127.0.0.1;dbname=biz', 'root', '');
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//$conn = null;

}catch(PDOException $e){
  echo $e->getMessage();
  die();
}

//$item = "Acer Aspire c456";
//$date_in = "";
//$customer_name = "Eric Stevenson";
//$amount = 354;
//$payment_method = 367;



$sql = "INSERT INTO customer_data (item, date_in, customer_name, amount, payment_method) VALUES('Chromebook', CURRENT_TIMESTAMP, 'Johnny Nelson', 125, 140 )";
 $handler->exec($sql);
 //$handler->commit();
echo "A new record was created successfully";

$sql2 = "INSERT INTO customer_data(item, date_in, customer_name, amount, payment_method) VALUES('Acer Aspire', CURRENT_TIMESTAMP, 'Robert Gause', 234, 265)";
//$query->execute(array($item, $date_in, $customer_name, $amount,  $payment_method));
$handler->exec($sql2);
//public $item,$date_in,$customer_name, $amount, $payment_method;
//public function __construct()
//{


//$this->customer_name = "{$this->customer_name} payment on: {$this->date_in}";

//}

$db2 = new PDO('mysql:host=127.0.0.1;dbname=biz', 'root', '');
$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Turn emulated prepares off
$db2->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);


try {

  // Check if item exists in database
  $stmt = $db2->prepare("SELECT COUNT(*) FROM 'customer_data' WHERE `item` = :Chromebook");
  $stmt->execute(array('item' => $_POST['item']));
  if ($stmt->fetchColumn() > 0) {
  }  throw new Exception("That item does not exist in the database.");
  }catch(PDOException $e){
	 
	  echo "That item exists in the database.  Try something else.";
  }


?>