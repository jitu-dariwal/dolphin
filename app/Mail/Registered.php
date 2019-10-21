<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Registered extends Mailable
{
    use Queueable, SerializesModels;
	public $name;
	
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from([
			'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
			'name' => env('MAIL_FROM_NAME', 'Example'),
		])->markdown('emails.registerMail');
    }
}
