<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ContacteController
{
	#[Route('/contacte/{codi}', name:'fitxa_contacte')]
    
	public function fitxa($codi)
	{
		return new Response("Dades del contacte amb codi $codi");
	}
}
?>