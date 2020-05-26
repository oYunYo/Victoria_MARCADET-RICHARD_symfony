<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticationController extends AbstractController
{


    /**
     * @Route("/login_success", name="login_success")
     */
    public function postLoginRedirectAction()
    {
        // TODO après authentification on devrait aterrir ici avec la config dans security, mais ça ne marche pas...
        $user = $this->getUser();
        if($user && !$user->getAlreadyLogged()){
            return $this->redirectToRoute('set_password');
        }
    }
}
