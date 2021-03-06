<?php

namespace App\Mail\Auth;

use App\Entity\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyMail extends Mailable
{
    use SerializesModels;

    // Создание публичной переменно $user
    public $user;

    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    public function build()
    {
        return $this
            ->subject('Signup Confirmation')
            ->markdown('emails.auth.register.verify');
    }
}
