<?php

namespace DrinkWith\Bundle\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test DefaultController
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class DefaultControllerTest extends WebTestCase
{

    /**
     *  Test index function
     *
     *  @return null
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Hello toto")')->count() > 0);
    }
}
