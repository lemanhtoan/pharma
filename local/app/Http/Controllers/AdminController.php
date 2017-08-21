<?php namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\MindRepository;
use App\Repositories\DrugRepository;
use Carbon;
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

        $fromDate1 = new \Carbon('last week');
        $toDate1 = new \Carbon('now');
        $u4 = \DB::table('customers')->whereBetween('created_at', array($fromDate1->toDateTimeString(), $toDate1->toDateTimeString()) )->get();

        $fromDate2 = \Carbon::now()->subDays(14);
        $toDate2 = \Carbon::now()->subDays(7);
        $u3 = \DB::table('customers')->whereBetween('created_at', array($fromDate2->toDateTimeString(), $toDate2->toDateTimeString()) )->get();

        $fromDate3 = \Carbon::now()->subDays(21);
        $toDate3 = \Carbon::now()->subDays(14);
        $u2 = \DB::table('customers')->whereBetween('created_at', array($fromDate3->toDateTimeString(), $toDate3->toDateTimeString()) )->get();

        $fromDate4 = \Carbon::now()->subDays(28);
        $toDate4 = \Carbon::now()->subDays(21);
        $u1 = \DB::table('customers')->whereBetween('created_at', array($fromDate4->toDateTimeString(), $toDate4->toDateTimeString()) )->get();
        $dataUser = array(
            "w1" => count($u1),
            "w2" => count($u2),
            "w3" => count($u3),
            "w4" => count($u4)
        );
        $fromDate1 = new \Carbon('last week');
        $toDate1 = new \Carbon('now');
        $t4 = \DB::table('transactions')->whereBetween('created_at', array($fromDate1->toDateTimeString(), $toDate1->toDateTimeString()) )->get();

        $fromDate2 = \Carbon::now()->subDays(14);
        $toDate2 = \Carbon::now()->subDays(7);
        $t3 = \DB::table('transactions')->whereBetween('created_at', array($fromDate2->toDateTimeString(), $toDate2->toDateTimeString()) )->get();

        $fromDate3 = \Carbon::now()->subDays(21);
        $toDate3 = \Carbon::now()->subDays(14);
        $t2 = \DB::table('transactions')->whereBetween('created_at', array($fromDate3->toDateTimeString(), $toDate3->toDateTimeString()) )->get();

        $fromDate4 = \Carbon::now()->subDays(28);
        $toDate4 = \Carbon::now()->subDays(21);
        $t1 = \DB::table('transactions')->whereBetween('created_at', array($fromDate4->toDateTimeString(), $toDate4->toDateTimeString()) )->get();
        $dataTrans = array(
            "w1" => count($t1),
            "w2" => count($t2),
            "w3" => count($t3),
            "w4" => count($t4)
        );
		return view('back.index', compact('nbrMessages', 'nbrUsers', 'nbrMind', 'nbrDrug', 'dataTrans', 'dataUser'));
	}


}
