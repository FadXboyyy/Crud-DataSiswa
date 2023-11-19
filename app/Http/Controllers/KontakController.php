<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class KontakController extends Controller
{
    function showKontakForm(){
        return view('kontak-form');
    }

    function sendMail(Request $request){
        
        $subject = "kontak dari " . $request->input('name');
        $name = $request->input('name');
        $emailAddress = $request->input('email');
        $message = $request->input('message');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Pengaturan Server
           // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
           $mail = new PHPMailer(); // create a new object
           $mail->IsSMTP(); // enable SMTP
           $mail->SMTPAuth = true; // authentication enabled
           $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
           $mail->Host = "fadlyrizkimaulana65.gmail.com";
           $mail->Port = 465; // or 587                                    // TCP port to connect to

            // Siapa yang mengirim email
            $mail->setFrom("alamatemailkamu@gmail.com", "Saya");

            // Siapa yang akan menerima email
            $mail->addAddress('fadlyrizkimaulana65@gmail.com', 'Fadly Rizki Maulana');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $name);
            
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();

            $request->session()->$request->flash('status', 'Terima kasih, kami sudah menerima email anda.');
            return view('kontak-form');

        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }
}
