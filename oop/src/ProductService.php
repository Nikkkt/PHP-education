<?php

namespace App;

use App\Product;

class ProductService
{
    private string $filePath;
    private array $products = [];

    public function __construct(string $filePath = 'products.json')
    {
        $this->filePath = $filePath;
        $this->loadProducts();
    }

    private function loadProducts(): void
    {
        if (file_exists($this->filePath)) {
            $json = file_get_contents($this->filePath);
            $data = json_decode($json, true) ?? [];

            foreach ($data as $item) $this->products[] = new Product($item['name'], $item['price']);
        }
    }

    public function saveProducts(): void
    {
        $json = json_encode($this->products, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $json);
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->saveProducts();
    }

    public function getAllProducts(): array { return $this->products; }

    public function searchByName(string $name): ?Product { return array_find($this->products, fn($product) => strtolower($product->name) === strtolower($name)); }
}
