<?php

namespace DrinkWith\Bundle\UserBundle\Tests\Controller;

use FOS\UserBundle\Doctrine\UserManager;

use Symfony\Bundle\FrameworkBundle\Console\Application,
    Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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

    private function login( $username = 'testuser', $password = 'testpass' )
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Connexion')->form(array('_username' => $username, '_password' => $password));
        $client->submit($form);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        return $client;
    }


    /**
     * test profile action disconnected user
     */
    public function testProfileShowDisconnectedUser()
    {

        $user = "test";
        $pwd = "testpwd";


        $client = $this->login($user, $pwd);
        $crawler = $client->request('GET', '/user/profile');
        $this->assertEquals(301, $client->getResponse()->getStatusCode());
        $this->assertEquals(1, $crawler->filter('meta[http-equiv="refresh"]')->count());
    }
}
