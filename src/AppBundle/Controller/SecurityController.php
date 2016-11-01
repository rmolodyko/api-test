<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.10.16
 * Time: 19:30
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 *
 * @Route("/api")
 *
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * Login the user
     *
     * @Route("/login", name="api.login")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function loginAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if (
            !is_array($data)
            || !array_key_exists('email', $data)
            || !array_key_exists('password', $data)
        ) {
            throw $this->createNotFoundException();
        }

        $user = $this->getDoctrine()->getRepository(User::class)
            ->findOneBy(['email' => $data['email']]);

        if(!$user) {
            throw $this->createNotFoundException();
        }

        // Password check
        if(!$this->get('security.password_encoder')->isPasswordValid($user, $data['password'])) {
            throw $this->createAccessDeniedException('Access denied');
        }

        // Create JWT token that hold only information about user name
        $token = $this->get('lexik_jwt_authentication.encoder')
            ->encode(['email' => $user->getEmail()]);

        // Return generated token
        return new JsonResponse(['token' => $token]);
    }
}