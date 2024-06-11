<!DOCTYPE html>
<html>
<head>
</head>
<link rel="stylesheet" href="geu.css">
<body>
<?php
if (isset($_POST["food"]) && isset($_POST["quantity"])) {

  // handles the submission of a form, and gets the values of the submitted food item and quantity.
  $foodItem = $_POST["food"];
  $quantity = intval($_POST["quantity"]);
  
  $inventoryFile = "geu_system_inventory.txt"; 
  
  // Read the inventory file
  $inventoryData = file($inventoryFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  
  $orderPrice = 0;
  $orderImages = "";
  $error = "";
  
  foreach ($inventoryData as $line) {
    $itemData = explode("\t", $line);
    $itemName = $itemData[0];
    $itemQuantity = intval($itemData[1]);
    $itemPrice = floatval($itemData[2]);
    $itemImage = $itemName . ".jpg";


    // Checking if the current item name matches the selected food item.
    if ($itemName == $foodItem) {
      
      //Checking if the item quantity in stock is sufficient.
      if ($itemQuantity >= $quantity) {

        //calculating total price
        $orderPrice = $quantity * $itemPrice;
        $orderImages = str_repeat("<img src='$itemImage'>", $quantity);
        //to show on html item ordered based on quantity
      } else {
        $error = "Sorry, we do not have $quantity $foodItem in stock. We only have $itemQuantity $foodItem in stock.";
      }
      break; //if found item exit loop
    }
  }
  
  if ($orderPrice > 0) {
    echo "Order Successful R$orderPrice is your total price. Each $foodItem is R$itemPrice. Here is what you ordered:<br>$orderImages";
  } else {
    echo "Error Message: $error";
  }
} else {
  echo "Error: Food item and quantity parameters are required.";
}
?>
</body>
</html>
