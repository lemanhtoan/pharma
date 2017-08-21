<?php namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\MindRepository;
use App\Repositories\DrugRepository;

class AdminController extends Controller {

	public function admin(
		TransactionRepository $contact_gestion,
        CustomerRepository $customer_gestion,
        MindRepository $mind_gestion,
        DrugRepository $drug_gestion
    )
	{	
		$nbrMessages = $contact_gestion->getNumber();
		$nbrUsers = $customer_gestion->getNumber();
        $nbrMind = $mind_gestion->getNumber();
        $nbrDrug = $drug_gestion->getNumber();
		return view('back.index', compact('nbrMessages', 'nbrUsers', 'nbrMind', 'nbrDrug'));
	}


}
