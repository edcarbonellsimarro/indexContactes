<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\BDProva;
use App\Service\UnaClasse;

class ContacteController extends AbstractController
{
    private $contactes;
    private $contactesCombinat;
	

    public function __construct(BDProva $dades, UnaClasse $UnaC)
	{
		$this->contactes = $dades->get();
        $this->contactesCombinat = $UnaC->get();
	}

    #[Route('/contacte/{codi<\d+>?1}' ,name:'fitxa_contacte')]

    public function fitxa($codi)
    {
        $resultat = array_filter(
            $this->contactes,

            function ( $contacte ) use ( $codi ) {
                return $contacte[ 'codi' ] == $codi;
            }
        );
        if ( count( $resultat ) > 0 ) {
            return $this->render( 'fitxa_contacteIncloure.html.twig',
                                    array( 'contacte' => array_shift( $resultat ) ) );
        } 
        else
        return $this->render('fitxa_contacteIncloure.html.twig', array(
'contacte' => NULL));
    }

    #[Route('/contacteCombinat/{codi<\d+>?1}' ,name:'fitxa_contacteCombinat')]

    public function fitxaCombinat($codi)
    {
       $this->contactesCombinat->set();
        $resultat = array_filter(
            $this->contactesCombinat->getContactes(),

            function ( $contacte ) use ( $codi ) {
                return $contacte[ 'codi' ] == $codi;
            }
        );
        if ( count( $resultat ) > 0 ) {
            return $this->render( 'fitxa_contacteIncloure.html.twig',
                                    array( 'contacte' => array_shift( $resultat ) ) );
        } 
        else
        return $this->render('fitxa_contacteIncloure.html.twig', array(
'contacte' => NULL));
    }

    #[Route('/contacte/{text}', name: 'buscar_contacte')]
    public function buscar($text)
    {
        $resultat = array_filter(
            $this->contactes,

            function ( $contacte ) use ( $text ) {
                return strpos( $contacte[ 'nom' ], $text ) !== FALSE;
            }
        );
        return $this->render('llista_contactesHerencia.html.twig',
 					array('contactes' => $resultat));
    }
}
