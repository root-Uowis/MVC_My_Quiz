<?php

namespace App\Notification;

use App\Entity\User;
use Twig\Environment;

class ContactNotification
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $render;

    public function __construct(\Swift_Mailer $mailer, Environment $render)
    {
        $this->mailer = $mailer;
        $this->render = $render;
    }

    public function sendmail(User $user,$token)
    {
        $message = (new \Swift_Message('nepasrepondre'))
        ->setFrom('noreply@noreply.com')
        ->setTo('contat@quiz.fr')
        ->setReplyTo($user->getEmail())
        ->setBody(
            'Bonjour  ' . $user->getEmail() . 
            ' Pour activer votre compter merci de renter la cle suivante : ' . $token .

            ' a localhost:8000/active.'
        );
        $this->mailer->send($message);
    }
}
