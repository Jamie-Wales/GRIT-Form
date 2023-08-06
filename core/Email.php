<?php

namespace core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Email {
    private $mailer;

    /**
     * @throws Exception
     */
    public function __construct($config) {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP(); // Set mailer to use SMTP
        $this->mailer->Host = $config['host']; // Specify main and backup SMTP servers
        $this->mailer->SMTPAuth = true; // Enable SMTP authentication
        $this->mailer->Username = $config['mailUsername']; // SMTP username
        $this->mailer->Password = $config['mailPassword']; // SMTP password
        $this->mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $this->mailer->Port = 587; // TCP port to connect to                //SMTP port
        $this->mailer->setFrom('jamie.wales.developer@gmail.com', 'Jamie Wales');
        $this->mailer->isHTML(true);

    }

    public function sendMail($recipientEmail, $recipientName, $subject, $body)
    {
        try {

            $this->mailer->addAddress($recipientEmail, $recipientName);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->send();

        } catch (Exception $e) {
            echo "{$this->mailer->ErrorInfo}";
        }
    }
}