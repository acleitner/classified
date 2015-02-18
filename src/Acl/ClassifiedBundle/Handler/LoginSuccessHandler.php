<?php

namespace Acl\ClassifiedBundle\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected $router;
    protected $authorizationChecker;

    public function __construct(Router $router, AuthorizationChecker $authorizationChecker)
    {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
      if ($this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) {
      }
      if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
      }
      if ($this->authorizationChecker->isGranted('ROLE_USER')) {
          $url = ('dashboard');
      }

      $response = new RedirectResponse($this->router->generate($url));

      return $response;
    }
}
