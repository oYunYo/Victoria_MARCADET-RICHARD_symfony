<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setAlreadyLogged(true);
        $admin->setLastname('DUPOND');
        $admin->setFirstname('Patricia');
        $admin->setSector('Direction');
        $admin->setPhoto('123.png');
        $admin->setEmail('admin@deloitte.com');

        $password = $this->encoder->encodePassword($admin, 'admin123@');
        $admin->setPassword($password);
        $admin->setRoles((array)'ROLE_ADMIN');

        $manager->persist($admin);
        $manager->flush();

    }
}