<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;


class EmailController extends Controller
{
    public function send_mail()
    {
        $mailData = [
            "Message" => "THIS IS AN AUTO GENERATED EMAIL FROM CHANGAN AUTOS BY USING SENDGRID"
        ];

        $recipients = [
            "irfanahmed.qbs@gmail.com"
        ];
        $ccRecipients = [
            "irfanahmedkhan2811@gmail.com"
        ];
        // Mail::to($recipients)->send(new TestEmail($mailData));
        $email = new TestEmail($mailData);
        Mail::to($recipients)
            ->cc($ccRecipients) // Add CC recipients
            // ->bcc($bccRecipients)  // Add BCC recipients
            ->send($email);
        dd("Mail sent successfully.");
    }
}
