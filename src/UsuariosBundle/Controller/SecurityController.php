<?php

namespace UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
	public function loginAction(){
		$autenticationUtils = $this->get('security.authentication_utils');

		$error = $autenticationUtils->getLastAuthenticationError();

		$lastUsername = $autenticationUtils->getLastUsername();

		return $this->render('security/login.html.twig',array(
			'last_username'=>$lastUsername,'error'=>$error));
	}

	public function loginCheckAction()
	{
		
	}
	
}
