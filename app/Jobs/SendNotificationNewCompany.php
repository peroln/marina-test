<?php

namespace App\Jobs;

use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendNotificationNewCompany implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $company;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
try{
    Mail::send('emails.notification', [
        'company' => $this->company
    ] , function($message){
        $mail_admin = env('MAIL_ADMIN');
        $message->from($this->company->email, $this->company->name);
        $message->to($mail_admin)->subject('New company');
    });
}catch(\Exception $e){
    dd($e->getMessage());
}


    }
}
