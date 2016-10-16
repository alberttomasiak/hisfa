<?php

namespace App\Notifications;

use App\Silo;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use DB;

class SilosVolume extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
		
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
	
	public function checkVolume(){
		$silos = DB::table('silos')
            ->join('silo_types', 'silos.id', '=', 'silo_types.silo_id')
            ->select('silos.*', 'silo_types.type')
			->where('silos.volume', '>=', '95')
            ->get();
		
		if($silos->first()){
			return true;
		}else{
			return false;
		}
	}
	
    public function toMail($notifiable)
    {
        return (new MailMessage)
					->greeting('Opgepast!')
                    ->line("De volgende silo's zijn bijna vol: ")
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
