<?php

namespace Router\Src\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RoutesController extends Controller
{
    /**
     * @var RouteCollection
    */
    protected $routes;

    /**
     * Create a new route command instance.
     *
     * @param  Router $router
     */
    public function __construct(Router $router)
    {
        $this->routes = $router->getRoutes();
    }

    /**
     * Returns the routes list with matching paths.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $routes = [];
        $method = strtoupper($request->input('method', 'get'));
        $path = $request->input('path', null);

        /** @var \Illuminate\Routing\Route $route */
        foreach ($this->routes->get($method) as $index => $route) {

            if (!is_null($path) && is_bool(strpos($route->uri(), $path))) {
                continue;
            }

            $routes[] = [
                'methods' => implode('|', $route->methods()),
                'uri'     => $route->uri(),
                'action'  => data_get($route, 'action.controller')
            ];
        }

        return new JsonResponse($routes);
    }
}