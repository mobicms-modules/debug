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
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomePageHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new HomePageHandler($container->get(Engine::class));
    }
}
