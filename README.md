# `mobicms-modules/debug`

This package is part of [mobiCMS](https://github.com/mobicms) Content Management System
and used exclusively for debugging during the development process.  
**Do not use in living systems, or protect access with a password!**


## Installation
1. You must use the [mobicms/mobicms-skeleton](https://github.com/mobicms/mobicms-skeleton) package
2. Add repository to its **composer.json**  
    ```JSON
    "repositories": [
       {
        "type": "vcs",
        "url": "https://github.com/mobicms-modules/debug.git"
      }
    ]
    ```
3. Update dependencies `composer update`.
4. Add any route you want to [routes.php](https://github.com/mobicms/mobicms-skeleton/blob/develop/mobicms/config/routes.php)
for example `/debug`
    ```php
    $app->get('/debug', \MobicmsModules\Debug\HomePageHandler::class, 'home');
    ```
5. Done. You can open debug information at the URL you specified above.

## License
This package is licensed for use under the GNU General Public License v3.0 (GPL-3.0).  
Please see [LICENSE](https://github.com/mobicms-modules/stub/blob/develop/LICENSE) for more information.


## Copyright
Copyright (c) 2021 [mobiCMS Project](https://mobicms.org).  
All rights to used third-party libraries, fonts, images, etc. reserved by their authors.


## Our links
- [**Project Website**](https://mobicms.org) and support forum
- [**Facebook**](https://www.facebook.com/mobicms)
- [**Twitter**](https://twitter.com/mobicms)
