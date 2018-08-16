<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationNewRequests extends Mailable
{
    use Queueable, SerializesModels;
    protected $notification = null;
    protected $property = null;
    protected $user = null;


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

      $visit_date = $this->notification["visit_date"];
      $visit_time = $this->notification["visit_time"];
      $id = $this->notification["id"];
      $property_id = $this->property["id"];
      $landlord_id = $this->property["landlord_id"];

      $user_email = $this->user["email"];
      $property_address = $this->property["address"];
      $property_floor = $this->property["floor"];
      $property_number = $this->property["number"];
      $user_name = $this->user["name"];

        return $this->view('emails.notification_new_requests')
        ->with([
                'visit_date' => $visit_date,
                'visit_time' => $visit_time,
                'id'         => $id,
                'property_id'=> $property_id,
                'property_address' => $property_address,
                'property_floor' => $property_floor,
                'property_number' => $property_number,
                'landlord_id' => $landlord_id,
                'user_name'        => $user_name,
                'user_email'       => $user_email

              ]);
    }
}
