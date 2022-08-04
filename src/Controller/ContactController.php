<?php

namespace App\Controller;


/*use App\Entity\Contact;
use App\Form\ContactType;*/
//use Doctrine\ORM\EntityManagerInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Mailer\MailerInterface;
//use Symfony\Component\Mime\Email;


class ContactController extends AbstractController
{
    #[Route('/', name: 'app_contact')]
    public function index(
    ): Response
    {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'localhost';
//            $mail->SMTPAuth   = true;
//            $mail->Username   = 'user@example.com';
//            $mail->Password   = 'secret';
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 1025;
            $mail->CharSet = "utf-8";

            $mail->addAddress('ellen@example.com');
            $mail->setFrom('from@example.com', 'Mailer');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'mon vrai test';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }




      /*  $to = 'bou@site.fr';
        $subject = 'sujet du message';
        $message = 'message';

        $header = [
            "From" => 'no-reply@site.fr',
            "Reply-To" => 'adress@site.fr',
            "Cc" => 'copi@site.fr',
            "Bcc" => 'copiecaché@site.fr',
            "Content-Type" => "text/html"
        ];

        $message = wordwrap($message, 70, "\r\n");
        mail($to, $subject, $message, $header);*/


        

       /* $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();

            $email = (new Email())
                ->from('hello@example.com')
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            //$mailer = new Mailer();
            $mailer->send($email);*/

           /* $this->addFlash(
                'succes'
            );*/
//        }

      /*  ob_start();
        phpinfo();
        $phpinfo = ob_get_contents();
        ob_end_clean();
        return $this->render('contact/index.html.twig', array(
            'phpinfo'=>$phpinfo,
        ));*/


        return $this->render('contact/index.html.twig', [
//            'form' => $form->createView(),
        ]);
    }
}
