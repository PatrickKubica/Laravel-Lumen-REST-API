<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    // We will use Transactions to make sure that we do not change the state of our database
    use DatabaseTransactions;

    public function testProductCreation()
    {
        $response = $this->json('POST', '/api/v1/product', [
            'name' => 'unittest testproduct',
            'sku' => 99999,
            'description' => 'This is a test product added by an unittest',
            'available' => true
            ]);
        $response->seeJson(['name' => 'unittest testproduct']);
    }

    public function testProductDeletion()
    {
        $product =  $this->createProduct('unittest Deletion testproduct');
        $productId = $product->id;

        $response = $this->json('DELETE', '/api/v1/product/' . $productId);
        $response->seeJson(['Product with id ' . $productId . ' was correctly deleted']);
    }

    public function testProductUpdate()
    {
        $product =  $this->createProduct('unittest Update testproduct');
        
        $response = $this->json('PUT', '/api/v1/product/'  . $product->id, [
            'name' => 'unittest updated testproduct',
            'sku' => 99999,
            'description' => 'This is a test product added by an unittest',
            'available' => true
            ]);
        $response->seeJson(['name' => 'unittest updated testproduct']);
    }

    public function testProductListing()
    {
        $this->createProduct('unittest Listingtestproduct');
        $response = $this->json('GET', '/api/v1/product/');
        $response->seeJson(['name' => 'unittest Listingtestproduct']);
    }

    /**
     * create a new product in the database
     *
     * @param string $name
     * @return App\Product
     */
    private function createProduct($name)
    {
        $product = factory('App\Product')->create([
            'name' => $name,
            'sku' => 99999,
            'description' => 'This is a test product added by an unittest',
            'available' => true
        ]);
        return $product;
    }
}
