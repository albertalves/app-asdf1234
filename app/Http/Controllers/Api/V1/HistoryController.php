<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Http\Traits\JsonResponse;
use App\Services\HistoryService;

class HistoryController extends Controller
{
    use JsonResponse;
    protected $historyService;

    /**
     * @param HistoryService $historyService
     */
    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    /**
     * @param  \App\Http\Requests\HistoryRequest  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(HistoryRequest $request)
    {
        // @todo: Enviar o action_type no front
        try {
            $response = $this->historyService->create($request->validated);
            return $this->response('Histórico adicionado com sucesso', $response);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), [], 422);
        }
    }
}
