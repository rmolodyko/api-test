<?php

// src/AppBundle/Action/BookSpecial.php

namespace AppBundle\Action;

use AppBundle\Entity\User;
use FOS\UserBundle\Doctrine\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class ManagerUser
{
    /** @var UserManager */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route(
     *     name="create_user",
     *     path="/users1",
     *     defaults={"_api_resource_class"=User::class, "_api_collection_operation_name"="manage_user_operation"}
     * )
     * @Method("POST")
     */
    public function __invoke($data)
    {
//        $user = $this->userManager->createUser();
//        $user->setUsername($username);
//        $user->setEmail($email);
//        $user->setPlainPassword($password);
//        $user->setEnabled((Boolean) $active);
//        $user->setSuperAdmin((Boolean) $superadmin);
//        $user->setLatitude($latitude);
//        $this->userManager->updateUser($user);
//        dump($data);die;
//        $user = $this->userManager->createUser();
//
//        return $data;
    }
}
