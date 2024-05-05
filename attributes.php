<?php

class Request
{
    public string $uri;
    public string $method;

    public function __construct()
    {
        $this->uri = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];
    }
}
#[Attribute]
class Http
{
    public function __construct(
        public string $uri,
        public string $method
        ) 
    {
    }
}

class MyController
{
    #[Http(uri: '/myself', method: 'GET')]
    public function me()
    {
        return 'Welcome to my web app';
    }
}

class Router
{
    public function handle(Request $request)
    {
        $controller = new ReflectionClass(MyController::class);
        $methods = $controller->getMethods();
        foreach($methods as $method){
            $attributes = $method->getAttributes();
            foreach($attributes as $attribute){
                $arguments = $attribute->getArguments();
                $uri = explode('/', $arguments['uri']);
                $requestUri = explode('/', $request->uri);
                $requestMethod = $request->method;
                $http = $arguments['method'];
                if(
                    $requestUri !== $uri ||
                    $requestMethod !== $http
                ){
                    continue;
                }
                return $method->invoke(
                    $method->getDeclaringClass()->newInstance()
                );

            }
        }
        return 'route not found';
    }
}

$request = new Request;
$router = new Router;
echo $router->handle($request);