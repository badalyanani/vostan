<?php
/*
$data['tell'] = $_POST['tell'];
$data['email'] = $_POST['email'];
$data['adress'] = $_POST['adress'];
$data['quantity'] = $_POST['quantity'];
*/
require_once 'swift/lib/swift_required.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tell = test_input($_POST['tell']);
  $email = test_input($_POST['email']);
  $adress = test_input($_POST['adress']);
  $quantity = test_input($_POST['quantity']);
  $size = test_input($_POST['size']);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 echo "The name you typed is: " . $tell;

 echo "The name you typed is: " . $email;

 echo "The name you typed is: " . $adress;

 echo "The name you typed is: " . $quantity;
 
echo "The name you typed is: " . $size;
?>

