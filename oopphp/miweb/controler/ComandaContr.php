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
        // DownloadthegeneratedPDF
        $dompdf->stream();
    }
}

