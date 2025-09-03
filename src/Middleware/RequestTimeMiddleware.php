<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RequestTimeMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $start = microtime(true);

        // Cho phép request đi tiếp qua middleware khác / controller
        $response = $handler->handle($request);

        $end = microtime(true);
        $elapsed = round(($end - $start) * 1000, 2); // ms

        // Gắn thêm header X-Request-Time
        return $response->withHeader('X-Request-Time-test', $elapsed . ' ms');
    }
}
