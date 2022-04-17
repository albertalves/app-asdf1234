<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResourceCollection;
use App\Http\Traits\JsonResponse;
use App\Services\ProductService;

class ProductController extends Controller
{
    use JsonResponse;
    protected $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return new ProductResourceCollection($this->productService->getAll());
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), [], 422);
        }
    }

    /**
     * @param \App\Http\Requests\StoreProductRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $response = $this->productService->create($request->validated());
            return $this->response('Produto adicionado com sucesso', $response);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), [], 422);
        }
    }

    /**
     * @param  \App\Http\Requests\UpdateProductRequest $request
     * @param  string  $uuid
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $uuid)
    {
        try {
            $response = $this->productService->update($request->validated(), $uuid);
            return $this->response('Produto atualizado com sucesso', $response);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), [], 422);
        }
    }
}
