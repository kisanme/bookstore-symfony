<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    private $categories = [
        0, 1, // Correct categories
        4, 5  // Invalid categories
    ];

    public function testDefaultIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Books');
        $this->assertGreaterThan(0, $crawler->filter('a.add-to-cart')->count());
    }

    public function testChildrenCategoriedIndex()
    {
        $client = static::createClient();

        foreach ($this->categories as $category) {
            $crawler = $client->request('GET', "/?category=${category}");

            if ($category > 1) {
                $this->assertResponseRedirects('/');
            } else {
                $this->assertResponseIsSuccessful();
                $this->assertSelectorTextContains('h1', 'Books');
                $this->assertGreaterThan(0, $crawler->filter('a.add-to-cart')->count());
            }
        }
    }
}
