<?php

namespace VivaceBurgers\AppBundle\Entity;

class Hamburger
{
	protected $name, $description, $price;

	public function __construct($name, $price, $description = "")
	{
		$this->setName($name);
		$this->setPrice($price);
		$this->setDescription($description);
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getPrice()
	{
		return $this->price;
	}
}