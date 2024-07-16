<?php 

class ComandaContr extends Comanda{
    private $numComanda;

    public function getNumComanda(){
        return $this->numComanda;
    }
    public function setNumComanda($numComanda){
        $this->numComanda = $numComanda;
    }

    public function generateInvoice($numComanda){
       $res = $this->getInvoice($numComanda);

       if($res == 0 || $res == -1){
        header("Location: ../view/factura.php?error=Hayunerror");
        exit();
       }

       $emil = $res[0]['email'];
       // TheComposerautoloader
        require_once'../lib/dompdf/vendor/autoload.php';
        // Reference theDompdfnamespace
        //use Dompdf\Dompdf;
        // Instantiate and use the dompdf class    
        $dompdf = new Dompdf\Dompdf();
        ob_start();
        include 'invoice.php';
        $html = ob_get_contents(); // contenido dinamico
        ob_end_clean();

        //$html = file_get_contents('invoice.php'); contenido estatico

        // Load HTML contenttogeneratea PDF
        $dompdf->loadHtml($html);
        // (Optional) Setupthepapersizeand orientation
        $dompdf->setPaper('A4','portrait');
        // Render theHTML as PDF
        $dompdf->render();
        // save the generated PDF
        $pdf_string = $dompdf->output();
        $pdf_file_loc = '../documents/'.$numComanda.'.pdf';
        file_put_contents($pdf_file_loc, $pdf_string);

        //enviar el pdf por email
        $this->sendEmail($email,$pdf_file_loc);
    }

    public function getComandes(){
        $res = $this->getAllComandes();
        if($res == 0 || $res == -1){
            header("Location: ../view/factura.php?error=Hayunerror");
            exit();
        }

        return $res;
    }

    private function sendEmail($email,$attachment=null){
        
        require '../lib/PHPMailer/src/Exception.php';
        require '../lib/PHPMailer/src/PHPMailer.php';
        require '../lib/PHPMailer/src/SMTP.php';
        
        //Create a new PHPMailer instance
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        
        //Enable SMTP debugging
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
        
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        
        //Set the SMTP port number:
        $mail->Port = 465;
        
        //Set the encryption mechanism to use:
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'foap408@gmail.com';
        
        //Password to use for SMTP authentication
        $mail->Password = 'dyrv alyq ojiq acyd';
        
        //Set who the message is to be sent to
        $mail->addAddress($email);
        
        //Set the subject line
        $mail->Subject = 'Invoice';
        
        //Replace the plain text body with one created manually
        $mail->msgHTML("Aquí esta su factura");
        $mail->addAttachment($attachment);

        //send the message, check for errors
        if (!$mail->send()) {
           // echo 'Mailer Error: ' . $mail->ErrorInfo;
            header("Location: ../view/factura.php?error=Mailer Error");
            exit();
        } else {
            header("Location: ../view/factura.php?msg=Message sent!");
            exit();
         
        }
    }
}

