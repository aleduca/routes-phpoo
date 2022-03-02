<?php
namespace app\support;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    private array|string $to;
    private string $from;
    private string $fromName;
    private string $template;
    private array $templateData = [];
    private string $message;
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host       = env('EMAIL_HOST');
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = env('EMAIL_USERNAME');
        $this->mail->Password   = env('EMAIL_PASSWORD');
        $this->mail->Port       = env('EMAIL_PORT');
    }

    public function from(string $from, string $name = ''):Email
    {
        $this->from = $from;

        $this->fromName = $name;

        return $this;
    }

    public function to(string|array $to):Email
    {
        $this->to = $to;

        return $this;
    }

    public function template()
    {
    }

    public function templateData()
    {
    }

    public function subject(string $subject):Email
    {
        $this->subject = $subject;

        return $this;
    }

    public function message(string $message):Email
    {
        $this->message = $message;
        return $this;
    }


    private function addAddress()
    {
        if (is_array($this->to)) {
            foreach ($this->to as $to) {
                $this->mail->addAddress($to);
            }
        }
        
        if (is_string($this->to)) {
            $this->mail->addAddress($this->to);
        }
    }

    public function send()
    {
        $this->mail->setFrom($this->from, $this->fromName);

        $this->addAddress();

        $this->mail->isHTML(true);
        $this->mail->CharSet = 'UTF-8';
        $this->mail->Subject = $this->subject;
        $this->mail->Body    = $this->message;
        $this->mail->AltBody = $this->message;

        return $this->mail->send();
    }
}
