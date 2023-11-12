<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
//            new TwigFilter('exampleFilter', [$this, 'exampleFilter']),
        ];
    }

//    public function exampleFilter($var)
//    {
//        $formattedVar = $var;
//        return $formattedVar;
//    }
}