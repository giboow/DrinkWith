<?php

namespace DrinkWith\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * User bundle
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class DrinkWithUserBundle extends Bundle
{
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\HttpKernel\Bundle.Bundle::getParent()
     *
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
