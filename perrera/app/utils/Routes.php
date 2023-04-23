<?php
namespace utils;

$routes = [];

route("/", function(){
    echo "Home Page";
});

route("/login", function(){
    echo "Login";
});

// 2 argumentos, uno la url y dos, una callback function
function route(String $path = "/", callable $callback)
{
    
}


class Route 
{
    public static function route(String $path = "/", callable $callback)
    {
        global $routes;
        $routes[$path] = $callback;
    }

    function run()
    {
        global $routes;
        $uri = $_SERVER["REQUEST_URI"];

        foreach ($routes as $path => $callback){

            if($path !== $uri) continue;
            $callback();
        }
    }
}

// if($_SERVER['REQUEST_URL'] == "/")
// {
//     include "login.php";
// }

// if($_SERVER['REQUEST_URL'] == "/")
// {
//     include "login.php";
// }

// if($_SERVER['REQUEST_URL'] == "/")
// {
//     include "login.php";
// }

// if($_SERVER['REQUEST_URL'] == "/")
// {
//     include "login.php";
// }

?>