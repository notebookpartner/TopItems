<?php
 
namespace TopItem\Providers;
 
 
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;
 
class TopItemRouteServiceProvider extends RouteServiceProvider
{
	public function map(Router $router)
	{
         $router->get('hello','TopItem\Controllers\ContentController@sayHello');
	}
}