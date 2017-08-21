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

        $u4 = \DB::select('SELECT * FROM `customers` WHERE `created_at` BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()');
        $u3 = \DB::select('SELECT * FROM `customers` WHERE `created_at` BETWEEN (NOW() - INTERVAL 14 DAY) AND NOW() - INTERVAL 7 DAY');
        $u2 = \DB::select('SELECT * FROM `customers` WHERE `created_at` BETWEEN (NOW() - INTERVAL 21 DAY) AND NOW() - INTERVAL 14 DAY');
        $u1 = \DB::select('SELECT * FROM `customers` WHERE `created_at` BETWEEN (NOW() - INTERVAL 28 DAY) AND NOW() - INTERVAL 21 DAY');
        $dataUser = array(
            "w1" => count($u1),
            "w2" => count($u2),
            "w3" => count($u3),
            "w4" => count($u4)
        );

        $t4 = \DB::select('SELECT * FROM `transactions` WHERE `created_at` BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()');
        $t3 = \DB::select('SELECT * FROM `transactions` WHERE `created_at` BETWEEN (NOW() - INTERVAL 14 DAY) AND NOW() - INTERVAL 7 DAY');
        $t2 = \DB::select('SELECT * FROM `transactions` WHERE `created_at` BETWEEN (NOW() - INTERVAL 21 DAY) AND NOW() - INTERVAL 14 DAY');
        $t1 = \DB::select('SELECT * FROM `transactions` WHERE `created_at` BETWEEN (NOW() - INTERVAL 28 DAY) AND NOW() - INTERVAL 21 DAY ');
        $dataTrans = array(
            "w1" => count($t1),
            "w2" => count($t2),
            "w3" => count($t3),
            "w4" => count($t4)
        );
		return view('back.index', compact('nbrMessages', 'nbrUsers', 'nbrMind', 'nbrDrug', 'dataTrans', 'dataUser'));
	}


}
