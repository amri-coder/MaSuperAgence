<?php

namespace App\Controller\Admin;

use App\Repository\PropertyRepository;
use App\Controller\PropertyController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController 
{

	/**
	* @var PropertyRepository
	*/

	private $repository;

	 public function __construct (PropertyRepository $repository)
	 {
	 	$this->repository = $repository;
	 }

	 /**
	 * @Route("/admin", name="admin.property.index")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public function index()
	 {
	 	$properties = $this->repository->findAll();
	 	return $this->render('admin/property/index.html.twig', compact('properties'));
	 }

	 /**
	 *@Route("/admin/{id}", name="admin.property.edit")
	 *@param PropertyController $property
	 *@return \Symfony\Component\HttpFoundation\Response
	 */
	 public function edit(PropertyController $property)
	 {
	 	return $this->render('admin/property/edit.html.twig', compact('property'));
	 }

}