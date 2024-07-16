<?php
class Comanda extends Connection{

    protected function getInvoice($numComanda){
        $res = 0;
        $stmt = $this->connectEmpresa()->prepare("SELECT productes.descr, productes.preu,lc.quant,lc.quant*productes.preu as preu_total,clients.nom as nom_client,empleats.nom as nom_empleat, lc.lin_com, email FROM comanda inner join linia_comanda as lc on comanda.numcomanda = lc.numcomanda inner join productes on productes.codprod=lc.codprod and productes.codfab = lc.codfab inner join clients on comanda.clie = clients.numclie inner join empleats on comanda.rep_ven=empleats.numemp where comanda.numcomanda=?");
        if(!$stmt->execute(array($numComanda))){
           $res = -1;
        }
        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
        }
        $stmt = null;
        return $res;
    }

    protected function getAllComandes(){
        $res = 0;
        $stmt = $this->connectEmpresa()->prepare("SELECT numcomanda from comanda");
        if(!$stmt->execute()){
           $res = -1;
        }
        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
        }
        $stmt = null;
        return $res;
    }

   

}
