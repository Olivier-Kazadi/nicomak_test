<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'Myriam' => 'myriam.png', 
            'Geoffroy' => 'geoffroy.PNG', 
            'Laura' => 'laura.PNG', 
            'Céline' => 'celine.PNG', 
            'Alice' => 'alice.PNG', 
            'Laetitia' => 'laetitia.PNG',
        ];
        foreach ($names as $name => $avatar) {
            $user = new User();
            $user->setName($name);
            $user->setAvatar('/avatars/' . $avatar);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
