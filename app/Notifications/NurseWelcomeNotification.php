<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NurseWelcomeNotification extends Notification
{
    use Queueable;

    protected $password;
    protected User $admin;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $admin, $password)
    {
        $this->password = $password;
        $this->admin = $admin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('Nurse Welcome Notification'))
            ->markdown('mails/nurse-welcome-mail', [
                'username'         => $notifiable->email,
                'password'         => $this->password,
                'adminname'        => $this->admin->name,
                'institution_name' => $this->admin->clinic->institution_name,
                'address'          => $this->admin->clinic->address,
                'telnumber'        => $this->admin->clinic->phoneNumber,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
