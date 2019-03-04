<?php
return [
    'settings' => [
        'displayErrorDetails' => getenv('DEBUG') ?? true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => true,
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'cache_path' => getenv('DEBUG') ? false : __DIR__ . '/../var/cache/',
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => getenv('docker') ? 'php://stdout' : __DIR__ . '/../var/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'database' => [
            'driver' => getenv("DB_DRIVER"),
            'host' => getenv("DB_HOST"),
            'database' => getenv("DB_NAME"),
            'username' => getenv("DB_USER"),
            'password' => getenv("DB_PASSWORD"),
            'schema'    => getenv("DB_SCHEMA"),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'ldap' => [
          //https://www.forumsys.com/tutorials/integration-how-to/ldap/online-ldap-test-server/
          // An array of your LDAP hosts. You can use either
          // the host name or the IP address of your host.
          'hosts'    => ['ldap.forumsys.com'],
          'port'     => 389,
          // The base distinguished name of your domain to perform searches upon.
          'base_dn'  => 'dc=example,dc=com',
          // The account to use for querying / modifying LDAP records. This
          // does not need to be an admin account. This can also
          // be a full distinguished name of the user account.
          'username' => 'cn=read-only-admin,dc=example,dc=com',
          'password' => 'password',
        ],
    ],
];
