<?php
if (class_exists('PHPUnit_Runner_Version')) {
	set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/../vendor/mockery/mockery/library/');
	require_once('Mockery/Loader.php');
	$loader = new \Mockery\Loader;
	$loader->register();
}

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__.'/../vendor/autoload.php';

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->add('', __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs');
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
