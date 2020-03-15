<?php

class AlbumTest extends TestCase {

  public function __construct() {
    $this->client = new GuzzleHttp\Client();
    $this->url = "http://localhost/album/index";
  }

  public function testIndexNoData() {
    $output = $this->request('PUT', ['Album', 'index']);

    $this->assertEquals(420, http_response_code());
  }

  public function testIndexWithData() {
    $arr = ['a', 'b', 'c'];

    $response = $this->client->put($this->url, [
        GuzzleHttp\RequestOptions::JSON => $arr
    ]);
    $code = $response->getStatusCode();
    $this->assertEquals(200, $code);
  }

  public function testIndexDuplicate() {
    $arr = ['a', 'b', 'c', 'a'];
    $code  = 200;

    try {
      $response = $this->client->put($this->url, [
          GuzzleHttp\RequestOptions::JSON => $arr
      ]);

      $code = $response->getStatusCode();
    } catch (GuzzleHttp\Exception\ClientException $exception) {
        $code  = $exception->getResponse()->getStatusCode();
    }

    $this->assertEquals(420, $code);
  }
}
