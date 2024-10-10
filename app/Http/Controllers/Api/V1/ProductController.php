<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    /**
     * endpoints for getting all products
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }   

    /**
     * endpoint for getting specific product
     */
    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    /**
     * endpoint for creating new product
     */
    public function store(StoreProductRequest $request)
    {
        
        $product = Product::create($request->validated());
        
        return ProductResource::make($product);
    }

    /**
     * endpoint to update existing product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return ProductResource::make($product);
    }

    // Implement these later

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }    
}
