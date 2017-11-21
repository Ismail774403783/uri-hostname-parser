<?php

declare(strict_types=1);

namespace League\Uri\Tests;

use League\Uri\PublicSuffix\CurlHttpClient;
use League\Uri\PublicSuffix\HttpClientException;
use PHPUnit\Framework\TestCase;

class CurlHttpClientTest extends TestCase
{
    /**
     * @var HttpClient
     */
    protected $adapter;

    protected function setUp()
    {
        $this->adapter = new CurlHttpClient();
    }

    protected function tearDown()
    {
        $this->adapter = null;
    }

    public function testGetContent()
    {
        $content = $this->adapter->getContent('https://www.google.com');
        $this->assertNotNull($content);
        $this->assertContains('google', $content);
    }

    public function testThrowsException()
    {
        $this->expectException(HttpClientException::class);
        $this->adapter->getContent('https://qsfsdfqdf.dfsf');
    }
}
