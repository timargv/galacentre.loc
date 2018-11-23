<?php

namespace App\Services\Search;

use App\Entity\Products\Product\Product;
use Elasticsearch\Client;

class ProductIndexer
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function clear(): void
    {
        $this->client->deleteByQuery([
            'index' => 'products',
            'type' => 'product',
            'body' => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
        ]);
    }

    public function index(Product $product): void
    {
         
        $this->client->index([
            'index' => 'products',
            'type' => 'product',
            'id' => $product->id,
            'body' => [
                'id' => $product->id,
                'title' => $product->title,
                'name_original' => $product->name_original,
                'name_h1' => $product->name_h1,
                'article' => $product->article,
                'sh_description' => $product->consh_descriptiontent,
                'full_description' => $product->full_description,
                'price' => $product->price,
                'price_base' => $product->price_base,
                'price_old' => $product->price_old,
                'price_sp' => $product->price_sp,
                'status' => $product->status,
                'categories' => array_merge(
                    [$product->category->id],
                    $product->category->ancestors()->pluck('id')->toArray()
                ),
                 
            ],
        ]);
    }

    public function remove(Product $product): void
    {
        $this->client->delete([
            'index' => 'products',
            'type' => 'product',
            'id' => $product->id,
        ]);
    }
}