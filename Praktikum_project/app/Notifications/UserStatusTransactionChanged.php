<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Transaction;
class UserStatusTransactionChanged extends Notification
{
    use Queueable;
    public $transaction_id;
    public string $old_status;
    public string $new_status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($_transaction_id, $_old_status, $_new_status)
    {
        $this->transaction_id = $_transaction_id;
        $this->old_status = $_old_status ?? 'Tanpa Status';
        $this->new_status = $_new_status ?? 'Tanpa Status';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->line('Status transaksimu berubah')
            ->action('Buka transaksi', $url)
            ->line('Dari ' . $this->old_status . ' menjadi ' . $this->new_status);
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
            "old_status" => $this->old_status ,
            "new_status" => $this->new_status ,
        ];
    }
}
