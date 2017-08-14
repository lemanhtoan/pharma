<?php namespace App\Http\Controllers;

use App\Repositories\DrugRepository;
use App\Repositories\MindRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\ContactRepository;

class AdminController extends Controller {

	public function admin(
		ContactRepository $contact_gestion,
        MindRepository $mind_gestion,
        CustomerRepository $customer_gestion)
	{	
		$nbrMessages = $contact_gestion->getNumber();
		$nbrUsers = $customer_gestion->getNumber();

		return view('back.index', compact('nbrMessages', 'nbrUsers'));
	}


}
