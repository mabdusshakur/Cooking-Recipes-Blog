<?php

namespace App\Jobs;

use App\Mail\OtpMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mail;

class SendOtpEmail implements ShouldQueue
{
    use Queueable;
    
    protected $email;
    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new OtpMail($this->data));
    }
}
