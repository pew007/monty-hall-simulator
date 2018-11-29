<?php

namespace AppBundle\Twig;

class NumberFormatter extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('percentage', [$this, 'percentage'])
        ];
    }

    public function percentage($number)
    {
        return sprintf("%.2f%%", $number * 100);
    }
}
