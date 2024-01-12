<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class joinTeam extends Notification
{
    use Queueable;
    protected $userAdded;
    protected $userAdding;

    /**
     * Create a new notification instance.
     */
    public function __construct($userAdded, $userAdding)
    {
        $this->userAdded = $userAdded;
        $this->userAdding = $userAdding;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Un nouvel utilisateur a été ajouté à votre équipe.')
            ->line('Nom de l\'utilisateur ajouté: ' . $this->userAdded->name)
            ->line('Nom de l\'utilisateur ajoutant: ' . $this->userAdding->name)
            ->line('Date et heure de l\'ajout: ' . now())
            ->action('Voir l\'équipe', route('team.index'))
            ->line('Merci d\'utiliser notre application !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "userAdded" => $this->userAdded,
            "userAdding" => $this->userAdding,
            "date" => now(),
        ];
    }
}
