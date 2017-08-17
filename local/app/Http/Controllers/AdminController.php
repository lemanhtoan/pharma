<?php namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Repositories\TransactionRepository;

class AdminController extends Controller {

	public function admin(
		TransactionRepository $contact_gestion,
        CustomerRepository $customer_gestion)
	{	
		$nbrMessages = $contact_gestion->getNumber();
		$nbrUsers = $customer_gestion->getNumber();

		return view('back.index', compact('nbrMessages', 'nbrUsers'));
	}


}
