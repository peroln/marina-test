<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use App\Jobs\SendNotificationNewCompany;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCreatedCompanyNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CompanyCreated  $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {
        dispatch(new SendNotificationNewCompany($event->company));
    }
}
