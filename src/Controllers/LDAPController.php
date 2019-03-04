<?php declare(strict_types=1);

namespace LDAPClient\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class LDAPController
{
    protected $view;
    protected $ldap_provider;

    public function __construct(\Slim\Views\Twig $view, \Adldap\Connections\Provider $ldap_provider)
    {
        $this->view = $view;
        $this->ldap_provider = $ldap_provider;
    }

    public function index(Request $request, Response $response, array $arguments): Response
    {

        $results = $this->ldap_provider->search()->where('uid', '=', 'einstein')->get();
        $results = $this->ldap_provider->search()->where('ou', '=', 'mathematicians')->get();

        return $this->view->render($response, 'index.html', $arguments);
    }
}
