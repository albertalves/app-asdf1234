<?php

namespace App\Observers;

use App\Enum\ActionType;
use App\Jobs\ProductJob;
use App\Models\History;

class HistoryObserver
{
    /**
     * Handle the History "created" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function created(History $history)
    {
        if ($history['action_type'] != ActionType::INITIAL) {
            ProductJob::dispatch($history->toArray());
        }
    }
}
