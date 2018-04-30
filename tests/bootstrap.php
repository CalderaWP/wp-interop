<?php

if (file_exists(dirname(__FILE__, 2) . '/vendor/autoload.php')) {
    spl_autoload_register(function ($class) {
        if (in_array($class, [
            'Caldera_Forms_Entry_Entry',
            'Caldera_Forms_Entry_Field',
            'WP_HTTP_Response',
            'WP_REST_Response',
            'WP_REST_Request',
        ])) {
            include_once __DIR__ . '/Mocks/' . $class . '.php';
        }

        $cfPath = dirname(__FILE__, 2) . '/vendor/Desertsnowman/caldera-forms/';
        $cfClasses = [
            'Caldera_Forms_Entry' => 'classes/entry.php'
        ];
        if (array_key_exists($class, $cfClasses)) {
            include_once $cfPath . $cfClasses[ $class ];
        }
    });
    include_once dirname(__FILE__, 2) . '/vendor/autoload.php';
    include_once __DIR__ . '/Mocks/wp-functions.php';
} else {
    throw  new Exception('No autoloader');
}
