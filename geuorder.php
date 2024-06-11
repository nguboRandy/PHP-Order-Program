<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="geu.css">
</head>

<body>
      <form action="geu_submit-order.php" method="post">
            <div class="container">
                  <label for="food">Food Item:</label> 
                  <select id="food" name="food"> 
            </div>
            

      <?php

      //locating the file with food items
      $foodLocation = "geu_system_inventory.txt";
      
      // Reading the file with food items
      $foodItems = file($foodLocation);
       //iterating through the file to get food name using indexing then matching food name to food image
      foreach ($foodItems as $line) {
            $foodData = explode("\t", $line); //using explode to split a string using another string
            $foodName = $foodData[0];
            $foodImage = $foodName . ".jpg"; 

            echo "<option value='$foodName'>$foodName</option>"; //populating the drop down list for food options to the values in $foodName
      }
      ?>


</select>
<br />
<label for="quantity">Quantity:</label>
<input type="number" id="quantity" name="quantity" min="1" required><br />
<input type="submit" value="Order">
</form>
</body>
</html>


















<!-- <option value="apple">apple</option>
      <option value="chicken">chicken</option>
      <option value="cookie">cookie</option>
      <option value="milk">milk</option>
      <option value="tomato">tomato</option>
      <option value="banana">banana</option>
      <option value="tinfish">tinfish</option> -->