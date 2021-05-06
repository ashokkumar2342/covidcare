<?php

namespace App\Listeners;

use App\Admin;
use App\Admin\Model\SmsApi;
use App\Events\SmsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SmsEventListener
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
     * @param  SmsEvent  $event
     * @return void
     */
  public function handle(SmsEvent $event)
  {      
         $msg=urlencode($event->message);
         $mobile=$event->mobile; 
         $url = "http://180.179.218.150/sendurlcomma.aspx?user=20092798&pwd=Ashok@2342&senderid=DEOJJR&CountryCode=91&mobileno=$mobile&msgtext=$msg";
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
         curl_close($ch); 
           
  }
}
