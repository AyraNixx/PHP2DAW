<?php
$contacts = ["Susan" => "5551236666", "Alex" => "7779991717", "Lily" => "8181117777"];  
$message = "";
$validation_error = "* Please enter a 10-digit North American phone number.";
$name = "";
$number = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $number  = $_POST["number"];
   // Write your code here:
   
   //Comprobamos que el numero introducido sea menor de 30
   //Ya hemos visto antes que los inputs muy largos pueden
   //ocasionar error, por lo que es mejor indicar un límite.
   if(strlen($number) < 30)
   {
     //Cualquier caracter que no sea un número, será
     //remplazado por "".
    $formatted_number = preg_replace("/[^0-9]/", "" , $number);

    //Una vez dado el nuevo formato al número introducido, 
    //comprobamos que haya diez números (si fueran los números
    //españoles serían 9, pero estamos usando el formato de 
    //norte america que tiene 10 dígitos)
    if(strlen($formatted_number) === 10)
    {
      $contacts[$name] = $formatted_number;
      $message = "Thanks ${name}, we'll be in touch.";
    }else{
      $message = $validation_error;
    }
   }else{
     $message = $validation_error;
   }
  
   
   

};
?>
<html>
	<body>
  <h3>Contact Form:</h3>
		<form method="post" action="">
			Name:
			<br>
  		<input type="text" name="name" value="<?= $name;?>">
 			<br><br>
  		Phone Number:
  		<br>
  		<input type="text" name="number" value="<?= $number;?>">
  		<br><br> 
  		<input type="submit" value="Submit">
		</form>
		<div id="form-output">
			<p id="response"><?= $message?></p>
    </div>
	</body>
</html>
    