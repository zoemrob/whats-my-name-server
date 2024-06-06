<?php

use App\View\Renderer;
use Dotenv\Dotenv;
use GuzzleHttp\Psr7\Response as Response;
use GuzzleHttp\Psr7\Request as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = AppFactory::create();

$app->addRoutingMiddleware();

/**
 * Add Error Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null $logger -> Optional PSR-3 Logger
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware($_ENV['env'] === 'dev', true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $renderer = new Renderer();
    $response->getBody()->write($renderer('home.php', ['hello' => 'Hello World!']));

    return $response;
});

$app->run();
