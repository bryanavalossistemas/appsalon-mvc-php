<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPAuth = true;
        $mail->isSMTP();
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=" . $this->token . "'>Confimar Cuenta</a></p>";
        $contenido .= "<p>Si tú no solicitaste esta cuenta, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;
        $mail->send();
    }

    public function enviarInstucciones()
    {
        $mail = new PHPMailer();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Restablece tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/recuperar?token=" . $this->token . "'>Restablecer Password</a></p>";
        $contenido .= "<p>Si tú no solicitaste esta cuenta, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;
        $mail->send();
    }
}
