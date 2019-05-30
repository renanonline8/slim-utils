# Slim Utils

Tools for Slim Framework 3.

## Install
```
composer require renanonline8/slim-utils
```

## Usage

### BaseController
This class has the purpose of creating a controller class

1. Create the class
```php
namespace App\Controller;

use \SlimUtils\Controller\BaseController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class Controller extends BaseController
{
    
    public function control(Request $request, Response $response, Array $args)
    {
        //implement the code...

        //for use a container...
        $this->containerName->functionContainer();
    }
}
```

2. Create a container with Controller
```php
$container['ControllerIndex'] = function($c) {
    return new \App\Controller\ControllerIndex($c);
};
```

3. Implement the route
```php
$app->get('/[{name}]', 'Controller:control');
```

### Middleware
This class has the purpose be a Middleware abstract with easy access of container

1. Create the class

```php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use \SlimUtils\Middleware\BaseMiddleware;
use \SlimUtils\Middleware\InterfaceMiddleware;


class ExampleMid extends BaseMiddleware implements InterfaceMiddleware
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        //for use a container...
        $this->containerName->functionContainer();
        
        $response->getBody()->write('BEFORE');
        $response = $next($request, $response);
        $response->getBody()->write('AFTER');

        return $response;
    }
}
```

2. Add Middleware at the route

```php
$app->get('/[{name}]', 'Controller:control')->add(new ExampleMid($container));
```