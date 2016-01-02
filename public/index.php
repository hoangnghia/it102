<?php

error_reporting(E_ALL);

try {
    defined('APP_PATH') || define('APP_PATH', dirname(__FILE__) . '../apps');

    defined('WEB_PATH') || define('WEB_PATH', dirname(__FILE__));

    // Define db name environment
     defined('DB_NAME') || define('DB_NAME', (getenv('DB_NAME') ? getenv('DB_NAME') : 'test'));

    defined('BASE_URL') || define('BASE_URL', (getenv('BASE_URL') ? getenv('BASE_URL') : ''));

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new \Phalcon\DI\FactoryDefault();

    /**
     * Registering a router
     */
    $di['router'] = function () {

        $router = new \Phalcon\Mvc\Router(false);

        $router->add('/admin', array(
            'module' => 'backend',
            'controller' => 'index',
            'action' => 'index'
        ));

        $router->add('/index', array(
            'module' => 'frontend',
            'controller' => 'index',
            'action' => 'index'
        ));

        $router->add('/', array(
            'module' => 'frontend',
            'controller' => 'index',
            'action' => 'index'
        ));
        $router->notFound(array(
            'module' => 'frontend',
            'controller' => 'index',
            'action' => 'error404'
        ));


        return $router;
    };

    /**
     * The URL component is used to generate all kind of urls in the application
     */
    $di->set('url', function () {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri(BASE_URL);
        return $url;
    });

    /**
     * Start the session the first time some component request the session service
     */
    $di->set('session', function () {
        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application();

    $application->setDI($di);

    /**
     * Register application modules
     */
    $application->registerModules(array(
        'frontend' => array(
            'className' => 'Modules\Frontend\Module',
            'path' => '../apps/frontend/Module.php'
        ),
        'backend' => array(
            'className' => 'Modules\Backend\Module',
            'path' => '../apps/backend/Module.php'
        )
    ));

    echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}
