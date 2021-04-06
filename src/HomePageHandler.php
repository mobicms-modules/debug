<?php

/**
 * This file is part of mobicms-modules/stub package.
 *
 * @see       https://github.com/mobicms-modules/stub for the canonical source repository
 * @license   https://github.com/mobicms-modules/stub/blob/develop/LICENSE GPL-3.0
 * @copyright https://github.com/mobicms-modules/stub/blob/develop/README.md
 */

declare(strict_types=1);

namespace MobicmsModules\Debug;

use Mobicms\Render\Engine;
use Mobicms\System\Environment\IpAndUserAgentMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Throwable;

class HomePageHandler implements RequestHandlerInterface
{
    private Engine $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws Throwable
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $sever = $request->getServerParams();
        $data['webServer'] = $sever['SERVER_SOFTWARE'] ?? 'Unknown';
        $data['ip'] = $request->getAttribute(IpAndUserAgentMiddleware::IP_ADDR, 'Empty');
        $data['ipViaProxy'] = $this->getIpViaProxy($request);
        $data['userAgent'] = $request->getAttribute(IpAndUserAgentMiddleware::USER_AGENT, 'Empty');
        $data['pdoDemo'] = null;

        $data['diServices'] = [];

        $data['psrattributes'] = [];
        foreach ($request->getAttributes() as $key => $val) {
            if (is_string($val) || is_int($val)) {
                $data['psrattributes'][$key] = $val;
            } elseif (is_array($val)) {
                $data['psrattributes'][$key] = 'array';
            } elseif(is_object($val)){
                $data['psrattributes'][$key] = 'object';
            } else {
                $data['psrattributes'][$key] = 'other';
            }
        }

        return new HtmlResponse($this->engine->render('stub-app::home-page', $data));
    }

    private function getIpViaProxy(ServerRequestInterface $request): string
    {
        $ip = $request->getAttribute(IpAndUserAgentMiddleware::IP_VIA_PROXY_ADDR);

        if (null === $ip) {
            $request = $request->withHeader('X-Forwarded-For', '93.184.216.34');
            $middleware = new IpAndUserAgentMiddleware();
            $ip = '<span class="badge rounded-pill bg-warning text-dark">FAKE</span> ';
            $ip .= $middleware->determineIpViaProxyAddress($request);
        }

        return $ip;
    }
}
