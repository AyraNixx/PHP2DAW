<?php
$validation_error = "";
$username = "";
$users = ["coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password  = $_POST["password"];
    if (isset($users[$username]) && $users[$username] === $password) {
        // Add your code here:

        //Con la funcion header("Location: XXXXXX"); se redigirá el usuario a otra 
        //página.
        //Para que funcione correctamente, se debe de ejecutar antes de cualquier salida
        //realizada por el script, incluido HTML. Por lo que lo incluiremos en nuestro
        //script PHP antes de que nuestro archivo genere un HTML
        header("Location: success.html");
        //Después de usar header, usamos el constructor de lenguaje exit para 
        //finalizar el script actual.
        exit;
    } else {
        $validation_error = "* Incorrect username or password.";
    }
}

?>

<h3>Welcome back!</h3>
<form method="post" action="">
    Username:<input type="text" name="username" value="<?php echo $username; ?>">
    <br>
    Password:<input type="text" name="password" value="">
    <br>
    <span class="error"><?= $validation_error; ?></span>
    <br>
    <input type="submit" value="Log in">
</form>