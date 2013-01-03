<?php

namespace DrinkWith\Bundle\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test Default Controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * test index action
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/');

        $this->assertTrue($crawler->filter('html:contains("Hello")')->count() > 0);
    }
}
