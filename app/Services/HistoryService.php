<?php

namespace App\Services;

use App\Repositories\HistoryRepository;

class HistoryService
{
    protected $historyRepository;

    /**
     * @param HistoryRepository $historyRepository
     */
    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    /**
     * @param  array $attributes
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function create($attributes)
    {
        return $this->historyRepository->create($attributes);
    }
}