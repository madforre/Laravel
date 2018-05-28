<?php

namespace App\Notifications;

use App\User; // 추가( 필터링과 비밀번호 보안을 위해 )
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegisteredSuccessfully extends Notification
{
    use Queueable;

    /**
     * @var User
     */
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
    public function toMail($notifiable)
    {
        /** @var User $user */
        $user = $this->user;
        
        return (new MailMessage)
            ->from('Bakecrea@practice.com')
            ->subject('계정이 생성되었습니다. 이메일 인증 확인을 해주세요!')
            ->greeting(sprintf('Hello %s', $user->name))
            ->line('성공적으로 계정생성이 완료되었습니다. 계정을 활성화 해주세요!')
            ->action('click', route('activate.user', $user->activation_code))
            ->line('회원가입을 환영합니다.');
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
