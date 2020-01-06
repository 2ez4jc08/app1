<?php
namespace Classes;

require_once './lib/PHPMailer/vendor/autoload.php';
use  PHPMailer\PHPMailer\Exception;

class Emailer{

    protected $mail;
    public function __construct()
    {
        $this->mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    }

    public function send($email, $token){
        require(APP_PATH . 'config/config.php');
        $username = $config['EmailUsername'];
        $password = $config['EmailPassword'];

        try{
            $this->mail->IsSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->Port = 465; //can be 587
            $this->mail->SMTPAuth = TRUE;
            $this->mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $this->mail->IsHTML(true);
            // Change this to your gmail address
            $this->mail->Username = $username;  
            // Change this to your gmail password
            $this->mail->Password = $password;
            // Change this to your gmail address
            $this->mail->From = $username; 
            // This will reflect as from name in the email to be sent
            $this->mail->FromName = 'MYCMS'; 
            $this->mail->Body = 'Welcome in MYCMS!! Click here to verify you Account <a target="_blank" href="mycms.com/Email/Verify/client?u='.$token.'">mycms.com/Email/Verify/client?u='.$token.'</a>';
            $this->mail->Subject = 'ACCOUNT VERIFICATION';
            // This is where you want your email to be sent
            $this->mail->AddAddress($email);  
            if(!$this->mail->Send()){
                // echo "Message was not sent<br/ >";
                // echo "Mailer Error: " . $this->mail->ErrorInfo;
                $data['status'] = 0;
                $data['msg'] = "VERIFICATION SENT TO YOUR EMAIL, KINDLY GO AND VERIFY";
                return json_encode($data);
            }else{
                $data['status'] = 1;
                $data['msg'] = "VERIFICATION SENT TO YOUR EMAIL, KINDLY GO AND VERIFY";
                return json_encode($data);
            }
        }catch(Exception $e){
            return "VERIFICATION SENT TO YOUR EMAIL, KINDLY GO AND VERIFY";
        }
    }
}