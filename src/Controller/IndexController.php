<?php

namespace App\Controller;

use Component\Button\ButtonComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/')]
    public function __invoke()
    {
        if (!class_exists(ButtonComponent::class)) {
            throw new \RuntimeException('Clear composer cache / run composer install');
        }

        return $this->render('base.html.twig');
    }
}
