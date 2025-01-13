<?php
namespace App\Service;
use Psr\Log\LoggerInterface;

class ServeiCombinat
 {
    private $contactes;
    private $logger;

    public function __construct( BDProva $dades, LoggerInterface $logger )
 {
        $this->contactes = $dades->get();
        $this->logger = $logger;
    }

    public function getContactes()
 {
        return $this->contactes;
    }

    public function getLog()
 {
        return $this->logger;
    }

    public function set()
 {
    $data_hora = new \DateTime();
     $this->logger->info( 'Servei Combinat ' .$data_hora->format( 'd/m/y H:i:s' ) );
    }
}
?>