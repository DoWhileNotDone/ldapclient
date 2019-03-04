<?php declare(strict_types=1);

use LDAPClient\Controllers\LDAPController;

$container = $app->getContainer();
$container['LDAPController'] = function ($c) {
    $view = $c->get("view"); // retrieve the 'view' from the container
    $ldap_provider = $c->get("ldap_provider"); // retrieve the 'ldap' from the container
    return new LDAPController($view, $ldap_provider);
};

$app->get('/ldap', \LDAPController::class . ':index')->setName('ldap');
