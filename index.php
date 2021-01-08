<?php
/**
 * Back-end Challenge.
 *
 * PHP version 7.2
 *
 * Este serΓʽ o arquivo chamado na execuΓ§Γ£o dos testes automΓʽtizados.
 *
 * @category Challenge
 * @package  Back-end
 * @author   William Luiz da Silva <wiliamluisilva@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     https://github.com/apiki/back-end-challenge
 */
// declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

// defino o mιtodo http e a url amigαvel
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'] ?? '/exchange/';

// Rota
$router = new Apiki\Framework\Router($method, $path);

$moeda = new Apiki\Framework\Moeda();

$router->get('/exchange/{amount}/{from}/{to}/{rate}', function ($params) {
    return $params;
});

// procura a rota que foi acessado
$result = $router->handler();

// se não encontrar volta vázio
if (!$result) {
    // http_response_code(404);
    echo '';
    die();
}

// imprimo a página atual
echo $result($router->getParams());
