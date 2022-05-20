<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail($to_name, $to_address,$from_address, $attachment= null) : callable
    {
        return function () use ($to_name, $to_address, $from_address, $attachment) {
            $data = array("name" => $to_name, "body" => "Report of seafearers expired documents");
            Mail::send("emails.mail", $data, function ($message) use ($to_name, $to_address, $from_address, $attachment) {
                $message->to($to_address, $to_name)->subject("Report of seafearers expired documents");
                $message->from($from_address, "Expired documents");
                if ($attachment != null ){
                    $message->attach($attachment);
                }
            });
        };
    }
}
