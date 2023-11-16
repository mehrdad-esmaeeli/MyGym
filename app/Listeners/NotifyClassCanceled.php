<?php

namespace App\Listeners;

use App\Events\ClassCancel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCancel $event): void
    {
     $scheduledClass=$event->scheduledClass;
     Log::info($scheduledClass);
    }
}
