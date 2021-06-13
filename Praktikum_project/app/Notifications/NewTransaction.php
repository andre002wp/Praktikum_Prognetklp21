<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Transaction;

class NewTransaction extends Notification
{
    use Queueable;
    public $transaction_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($_transaction_id)
    {
        $this->transaction_id = $_transaction_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url =url('/transaksi/'.$this->transaction_id);
        return (new MailMessage)
            ->line('Seseorang baru saja membuat transaksi')
            ->action('Buka transaksi', $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $trans = Transaction::find($this->transaction_id);

        return [
            "transaction_id" => $this->transaction_id,
            "trans" => $trans,
        ];
    }
}
