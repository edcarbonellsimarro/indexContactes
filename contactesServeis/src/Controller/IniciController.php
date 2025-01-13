<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;

class IniciController extends AbstractController
 {
    private $logger;
	private $formatData;

    public function __construct( LoggerInterface $logger, $formatData )
 {
        $this->logger = $logger;
		$this->formatData = $formatData;
    }

    #[ Route( '/', name:'inici' ) ]

    public function inici()
    {
        $data_hora = new \DateTime();
        $this->logger->info( 'Accés el ' .$data_hora->format( 'd/m/y H:i:s' ) );
        return $this->render( 'inici.html.twig' );
    }
	
	#[ Route( '/format', name:'inici_' ) ]

    public function iniciFormat()
    {
        $data_hora = new \DateTime();
        $this->logger->info( 'Accés formatData ' .$data_hora->format( $this-> formatData) );
        return $this->render( 'inici.html.twig' );
    }
	

    #[ Route( '/iniciHerencia', name:'iniciHerencia' ) ]

    public function iniciHerencia()
    {
        return $this->render( 'iniciHerencia.html.twig' );
    }
}
?>