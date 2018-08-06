<?php

namespace JwtApp\Infrastructure\Delivery\Http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController extends Controller
{
    public function hello()
    {
        $response = new JsonResponse(['hello' => 'Welcome to the real world...'], 200);

        return $response;
    }
}
