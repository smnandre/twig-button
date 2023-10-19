<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getLogDir(): string
    {
        return $this->getProjectDir() . '/logs/app';
    }

    public function getCacheDir(): string
    {
        return $this->getProjectDir() . '/cache/' . $this->environment;
    }
}
