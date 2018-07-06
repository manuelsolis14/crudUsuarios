<?php

namespace UsuariosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use UsuariosBundle\Entity\Usuarios;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUsuarios extends Fixture
{

    public function load(ObjectManager $manager)
    {

        $usuarios = new Usuarios();
        $password="developer";
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($usuarios,$password);
        $usuarios->setNombre("Administrador");
        $usuarios->setApellidos("Administrador");
        $usuarios->setTelefono(1234567890);
        $usuarios->setDireccion("Conocido");
        $usuarios->setSexo("Masculino");
        $usuarios->setRedesSociales("Redes sociales administrador");
        $usuarios->setUserName("admin");
        $usuarios->setPassword($encoded);
        $usuarios->setRole("ROLE_ADMIN");
        $usuarios->setIsActive(true);
        $manager->persist($usuarios);
        $manager->flush();
    }
}
//php bin/console doctrine:fixtures:load --append
