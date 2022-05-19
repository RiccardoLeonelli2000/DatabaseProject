<?php error_reporting(E_ALL); ini_set('display_errors', 1);

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, "FACTORY", $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
            echo "Connessione fallita";
        }        
    }

    // OP1

    public function aggiungiCliente($partitaIva, $nome, $telefono, $citta, $via, $numeroCivico) {
        $query = "INSERT INTO `CLIENTI` (`PartitaIva`, `Nome`, `Telefono`, `Città`, `Via`, `NumeroCivico`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $partitaIva, $nome, $telefono, $citta, $via, $numeroCivico);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    // OP2

    public function aggiungiOrdine($numeroOrdine, $partitaIva, $data , $descrizione, $stato) {
        $query = "INSERT INTO `ORDINI` (`NumeroOrdine`, `Data`, `Descrizione`, `Stato`, `PartitaIva`) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('issss', $numeroOrdine, $data, $descrizione, $stato, $partitaIva);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    
    public function trovaCliente($nome) {
        $query = "SELECT * FROM `CLIENTI` WHERE Nome=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nome);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // OP3

    public function aggiungiSpedizione($numeroOrdine, $data , $matricola) {
        $query = "INSERT INTO `spedizioni` (`NumeroOrdine`, `Data`, `Matricola`) VALUES (?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isi', $numeroOrdine, $data, $matricola);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    public function trovaOrdine($numeroOrdine) {
        $query = "SELECT * FROM `ORDINI` WHERE NumeroOrdine=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$numeroOrdine);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function trovaCamionista($matricola){
        $query = "SELECT * FROM `CAMIONISTI` WHERE Matricola=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$matricola);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function trovaOperaio($matricola){
        $query = "SELECT * FROM `OPERAI` WHERE Matricola=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$matricola);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function modificaStatoOrdine($numeroOrdine,$stato) {
        $query = "UPDATE ORDINI SET Stato=? WHERE NumeroOrdine=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $stato, $numeroOrdine);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    //OP4

    public function trovaOrdiniConsegnati($dataInizio,$dataFine){
        $stato='consegnato';
        $query = "SELECT ORDINI.NumeroOrdine, ORDINI.Data, ORDINI.Descrizione, ORDINI.CostoTotale,
                    ORDINI.PartitaIva, CLIENTI.Nome
                FROM ORDINI JOIN CLIENTI 
                ON (ORDINI.PartitaIva = CLIENTI.PartitaIva)
                AND (ORDINI.Stato=?) AND (ORDINI.Data>? AND ORDINI.Data<?)
                ORDER BY ORDINI.Data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $stato, $dataInizio, $dataFine);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //OP5

    public function trovaProdotto($lottoProdotto){
        $query = "SELECT * FROM PRODOTTI_LAVORATI WHERE LottoProdotto=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $lottoProdotto);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //OP6

    public function calcolaFatturato($anno){
        $dataInizio =strval($anno).'-01-01';
        $dataFine =strval($anno+1).'-01-01';
        $query = "SELECT SUM(CostoTotale) FROM ORDINI WHERE `Data`>? AND `Data`<?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $dataInizio, $dataFine);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    //OP7

    public function trovaMacchinario($targa){
        $query = "SELECT * FROM MACCHINARI WHERE Targa=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$targa);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function occupazione($matricola, $targa){
        $data=date("Y-m-d");
        $data=strval($data);
        $query = "SELECT Matricola,Targa,OraFine FROM PRODUZIONI WHERE (Matricola = ? OR Targa = ?) AND `Data` = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iss', $matricola, $targa, $data);
        $result = $stmt->execute();
        $res = $stmt->get_result();
        $res = $res->fetch_all(MYSQLI_ASSOC);
        var_dump($res);
        if (false === $result) {
            return false;
        }
        else{
            for ($i = 0; $i<count($res); $i++){
                if ($res[$i]["OraFine"]==NULL){
                    return true;
                }
            }
            return false;

            
        }
    }

    public function aggiungiProduzione($matricola, $oraInizio, $data, $targa) {
        $query = "INSERT INTO PRODUZIONI (Matricola, OraInizio, `Data`, Targa) VALUES (?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isss', $matricola, $oraInizio, $data, $targa);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    //OP8 

    public function aggiungiLavorazione($lottoLavorazione, $ora, $data, $lottoProdotto, $targa, $tipo, $descrizione){
        $query = "INSERT INTO LAVORAZIONI (LottoLavorazione, Ora, `Data`, LottoProdotto, Targa, Tipo, Descrizione) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssss', $lottoLavorazione, $ora, $data, $lottoProdotto, $targa, $tipo, $descrizione);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    public function aggiungiProdotto($lottoProdotto, $tipo, $pesoComplessivo, $pesoPerElemento, $numeroElementi, $lunghezza, $numeroOrdine){
        $query = "INSERT INTO PRODOTTI_LAVORATI (LottoProdotto, Tipo, PesoComplessivo, PesoPerElemento, NumeroElementi, Lunghezza, NumeroOrdine) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssiiiii', $lottoProdotto, $tipo, $pesoComplessivo, $pesoPerElemento, $numeroElementi, $lunghezza, $numeroOrdine);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    public function aggiornaProdotto($lottoProdotto, $tipo, $pesoComplessivo, $pesoPerElemento, $numeroElementi, $lunghezza){
        $query = "UPDATE PRODOTTI_LAVORATI SET Tipo=?, PesoComplessivo=?, PesoPerElemento=?, NumeroElementi=?, Lunghezza=? 
        WHERE LottoProdotto=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('siiiis', $tipo, $pesoComplessivo, $pesoPerElemento, $numeroElementi, $lunghezza, $lottoProdotto);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }

    public function verificaQuantità($lottoMateriale,$quantita){
        $query = "SELECT * FROM MATERIALI WHERE LottoMateriale=? AND Quantità>?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $lottoMateriale, $quantita);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function aggiornaMateriale($lottoMateriale,$quantita){
        $query = "UPDATE MATERIALI SET Quantità=(Quantità-?) 
                WHERE LottoMateriale=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $quantita,$lottoMateriale);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }
    
    public function aggiungiNecessita($lottoLavorazione, $lottoMateriale, $quantita){
        $query = "INSERT INTO necessità (LottoLavorazione, LottoMateriale, Quantità) VALUES (?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $lottoLavorazione, $lottoMateriale, $quantita);
        $result = $stmt->execute();
        if (false === $result) {
            return false;
        }
        return true;
    }
    /**OP9  */

    public function trovaLavorazioniCliente($nome){
        $query = "SELECT P.NumeroOrdine, L.LottoProdotto, L.LottoLavorazione,
                        L.Ora, L.Data, L.Targa, L.Tipo, L.Descrizione
                FROM LAVORAZIONI L JOIN PRODOTTI_LAVORATI P
                ON L.LottoProdotto=P.LottoProdotto
                JOIN ORDINI O ON P.NumeroOrdine=O.NumeroOrdine
                JOIN CLIENTI C ON O.PartitaIva=C.PartitaIva
                WHERE C.Nome=?
                ORDER BY O.Data, L.LottoProdotto, L.Data DESC;";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $nome);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**OP10  */

    public function trovaProduzioniOperai($lottoProdotto){
        $query = "SELECT *
                FROM PRODOTTI_LAVORATI PL JOIN LAVORAZIONI L
                ON PL.LottoProdotto=L.LottoProdotto
                JOIN PRODUZIONI P
                ON P.Targa=L.Targa AND L.Data=P.Data AND L.Ora>P.OraInizio AND L.Ora<P.OraFine
                JOIN OPERAI O
                ON O.Matricola=P.Matricola
                WHERE PL.LottoProdotto=?
                ORDER BY L.Data DESC;";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $lottoProdotto);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /**OP11  */

    public function costoMateriali($anno){
        $dataInizio =strval($anno).'-01-01';
        $dataFine =strval($anno+1).'-01-01';
        $query = "SELECT F.PartitaIva, F.Nome, SUM(fo.Prezzo)
                FROM FORNITORI F LEFT JOIN forniture fo
                ON F.PartitaIva = fo.PartitaIva
                WHERE fo.Data>? AND fo.Data<?
                GROUP BY F.PartitaIva
                ORDER BY fo.Data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $dataInizio, $dataFine);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
