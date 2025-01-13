<?php
namespace App\Service;
use App\Service\ServeiCombinat;

class UnaClasse{
private $servei;
public function __construct(ServeiCombinat $servei)
{
	$this->servei = $servei;
}

public function get()
{
	return $this->servei;
}
public function getContactes()
{
	return $this->servei->getContactes();
}


public function set()
{
	$this->servei->set();
}

}
?>