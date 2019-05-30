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