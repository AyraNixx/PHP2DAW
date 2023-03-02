<?php
require_once './vendor/autoload.php';
 
use \vendor\symfony\routing\Matcher\UrlMatcher;
use \vendor\symfony\routing\RequestContext;
use \vendor\symfony\routing\RouteCollection;
use \vendor\symfony\routing\Route;
use \vendor\symfony\HttpFoundation\Request;
use \vendor\symfony\routing\Generator\UrlGenerator;
use \vendor\symfony\routing\Exception\ResourceNotFoundException;
 
try
{
    // Init basic route 
    $ruta1 = new Route(
      '/ruta1',
      array('controller' => 'controller/sController')
    );
 
    // Init route with dynamic placeholders 
    $ruta2_arg = new Route(
      '/ruta2/{nombre}',
      array('controller' => 'controller/sController', 'method'=>'mostrarDatos'),
      array('nombre' => 'Juan')
    );
 
    // Add Route object(s) to RouteCollection object 
    $routes = new RouteCollection();
    $routes->add('ruta1', $ruta1);
    $routes->add('ruta2_arg', $ruta2_arg);
 
    // Init RequestContext object 
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());
 
    // Init UrlMatcher object 
    $matcher = new UrlMatcher($routes, $context);
 
    // Find the current route 
    $parameters = $matcher->match($context->getPathInfo());
 
    // How to generate a SEO URL 
    $generator = new UrlGenerator($routes, $context);
    $url = $generator->generate('ruta2_arg', array(
      'nombre' => "Juan",
    ));
 
    echo '<pre>';
    print_r($parameters);
 
    echo 'Generated URL: ' . $url;
    exit;
}
catch (ResourceNotFoundException $e)
{
  echo $e->getMessage();
}