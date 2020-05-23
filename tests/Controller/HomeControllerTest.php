<?php

namespace App\Tests\Controller;

use App\Entity\Invoice;
use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
    }


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

    public function testCategoriedIndex()
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

    public function testTakesToBookDetail()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $firstBook = $crawler
            ->filter('article.book > a')
            ->last()
        ;
        $firstBookName = $firstBook->text();
        $crawler = $client->click($firstBook->link());
        $this->assertEquals($firstBookName, $crawler->filter('h1')->first()->text());
        $this->assertSelectorTextContains('a.add-to-cart', 'Add to Cart');
    }

    public function testAddRemoveCartItem()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $firstBook = $crawler->filter('article.book')->first()->text();

        if ( strpos($firstBook, 'Add to Cart') != false ) {
            $client->request('POST', '/add-to-cart/1');
            $this->assertCartHasItem($client);
        } else {
            $client->request('POST', '/remove-from-cart/1');
        }

        $this->assertResponseIsSuccessful();

    }

    private function assertCartHasItem($client) {
        $homepage = $client->request('GET', '/');
        $cart = $homepage->filter('.top-cart')->first()->text();
        $this->assertStringContainsStringIgnoringCase('lkr', $cart);
    }
}
