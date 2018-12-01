<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(
            200,
            $client->getResponse()
                   ->getStatusCode()
        );
        $this->assertContains(
            'Monty Hall Problem Simulator',
            $crawler->filter('.container h1')
                    ->text()
        );
    }

    public function testSimulate()
    {
        $client  = static::createClient();
        $crawler = $client->request('GET', '/simulate/100');

        $this->assertEquals(
            200,
            $client->getResponse()
                   ->getStatusCode()
        );
        $this->assertNotEmpty($crawler->filter('.table'));
    }

    public function testSimulateBadInput()
    {
        $client  = static::createClient();
        $crawler = $client->request('GET', '/simulate/badinput');

        $this->assertEquals(
            404,
            $client->getResponse()
                   ->getStatusCode()
        );
    }
}
