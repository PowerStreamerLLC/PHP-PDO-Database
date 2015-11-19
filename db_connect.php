<?php
require('insert_query.php');
try{
$handler = new PDO('mysql:host=127.0.0.1;dbname=biz', 'root', '');
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



}catch(PDOException $e){
  echo $e->getMessage();
  die();
}


class CustomerData{
	public $item, $date_in, $customer_name, $amount, $payment_method;
	
	public function __construct(){
		$this->customer_name = "{$this->customer_name} payment on: {$this->date_in}";
	}
}
$query = $handler->query('SELECT * FROM customer_data');
$query->setFetchMode(PDO::FETCH_CLASS, 'CustomerData');
while($r = $query->fetch(PDO::FETCH_OBJ)){
	//$cust_data = array('item', 'date-in', 'customer_name', 'amount', 'payment_method');
	
	//INDEXED ARRAY
	//echo $r['date_in'], '<br>';
	//echo $r['customer_name'], '<br>';
	//ASSOCIATIVE ARRAY
	//echo '<pre>', print_r($r), '</pre>';
	
	
	echo $r->customer_name, '<br>';
	echo $r->payment_method, '<br>';
	echo $r->date_in, '<br>';
}
echo "Our cool page";
?>