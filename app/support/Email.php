<?php
namespace app\support;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    private array $to = [];
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

    public function from()
    {
    }

    public function to()
    {
    }

    public function template()
    {
    }


    public function templateData()
    {
    }


    public function subject()
    {
    }

    public function message()
    {
    }

    public function send()
    {
    }
}
