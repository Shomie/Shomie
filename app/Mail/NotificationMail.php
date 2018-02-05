<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $notification;
    protected $property;
    protected $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification, $property, $user)
    {
      $this->notification = $notification;
      $this->property = $property;
      $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $visit_date = $this->notification->value('visit_date');
      $visit_time = $this->notification->value('visit_time');
      $id = $this->notification->value('id');
      $property_id = $this->property->value('id');
      $property_address = $this->property->value('address');
      $property_floor = $this->property->value('floor');
      $property_number = $this->property->value('number');
      $user_name = $this->user->value('name');

        return $this->view('emails.notification')
        ->with([
                'visit_date' => $visit_date,
                'visit_time' => $visit_time,
                'id'         => $id,
                'property_id'=> $property_id,
                'property_address' => $property_address,
                'property_floor' => $property_floor,
                'property_number' => $property_number,
                'user_name'        => $user_name
              ]);
    }
}
