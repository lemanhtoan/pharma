<?php

namespace App\Repositories;

use App\Models\Drug;
use App\Models\GroupDrug;


class DrugRepository extends BaseRepository {

    public function __construct(
        Drug $_drugs
    )
    {
        $this->model = $_drugs;
    }

    private function save($post, $inputs, $up = null)
    {
        $post->code = $inputs['code'];
        $post->name = $inputs['name'];
        $post->group_drug_id = $inputs['group_drug_id'];
        $post->activeIngredient = $inputs['activeIngredient'];
        $post->content = $inputs['content'];
        $post->design = $inputs['design'];
        $post->package = $inputs['package'];
        $post->donvibuon = $inputs['donvibuon'];
        $post->donvile = $inputs['donvile'];
        $post->hesoquydoi = $inputs['hesoquydoi'];
        $post->registerNumber = $inputs['registerNumber'];
        $post->produceCompany = $inputs['produceCompany'];
        $post->produceCountry = $inputs['produceCountry'];
        $post->registerCompany = $inputs['registerCompany'];
        $post->registerCountry = $inputs['registerCountry'];
        $post->note = $inputs['note'];
        $post->status = $inputs['status'];
        $post->save();

        return $post->id;
    }

    private function queryActiveWithUserOrderByDate()
    {
        return $this->model
            ->select('*')->latest();
    }

    public function indexFront($n)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->paginate($n);
    }

    public function search($n, $search, $sGroup, $sStatus)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        $query->where(function($q) use ($search) {
                    $q->where('code', 'like', "%$search%")
                        ->orWhere('name', 'like', "%$search%")
                        ->orWhere('activeIngredient', 'like', "%$search%")
                        ->orWhere('content', 'like', "%$search%")
                        ->orWhere('design', 'like', "%$search%")
                        ->orWhere('package', 'like', "%$search%")
                        ->orWhere('donvibuon', 'like', "%$search%")
                        ->orWhere('donvile', 'like', "%$search%")
                        ->orWhere('hesoquydoi', 'like', "%$search%")
                        ->orWhere('registerNumber', 'like', "%$search%")
                        ->orWhere('produceCompany', 'like', "%$search%")
                        ->orWhere('registerCountry', 'like', "%$search%")
                        ->orWhere('note', 'like', "%$search%");
                });
        if($sGroup) $query->where('group_drug_id', '=', "$sGroup");
        if($sStatus =='0'){
            $query->where('status', '=', "$sStatus");
         }
        if($sStatus) $query->where('status', '=', "$sStatus");
//        echo $query->toSql();die;
        return $query->paginate($n);
    }

    public function index($n,  $orderby = 'created_at', $direction = 'desc', $search=null, $sGroup=null, $sStatus=null)
    {
        if($search || $sStatus || $sStatus =='0' || $sGroup) {
            $query = $this->queryActiveWithUserOrderByDate();

            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('activeIngredient', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%")
                    ->orWhere('design', 'like', "%$search%")
                    ->orWhere('package', 'like', "%$search%")
                    ->orWhere('donvibuon', 'like', "%$search%")
                    ->orWhere('donvile', 'like', "%$search%")
                    ->orWhere('hesoquydoi', 'like', "%$search%")
                    ->orWhere('registerNumber', 'like', "%$search%")
                    ->orWhere('produceCompany', 'like', "%$search%")
                    ->orWhere('registerCountry', 'like', "%$search%")
                    ->orWhere('note', 'like', "%$search%");
            });
            if($sGroup) $query->where('group_drug_id', '=', "$sGroup");
            if($sStatus =='0'){
                $query->where('status', '=', "$sStatus");
            }
            if($sStatus) $query->where('status', '=', "$sStatus");
            $query->select('*')
                ->orderBy($orderby, $direction);
        }else{
            $query = $this->model
                ->select('*')
                ->orderBy($orderby, $direction);
        }

        return $query->paginate($n);
    }

    public function show($id)
    {
        $groupdrug = GroupDrug::all();
        $post = $this->model->whereId($id)->firstOrFail();
        return compact('post', 'groupdrug');
    }

    public function edit($post)
    {
        $groupdrug = GroupDrug::all();
        $drugType = \Config::get('constants.drugType'); sort($drugType);
        $country = \Config::get('constants.country');
        return compact('post' ,'groupdrug', 'drugType', 'country');
    }

    public function update($inputs, $post)
    {
        return  $this->save($post, $inputs, 'update');
    }

    public function updateActive($inputs, $id)
    {
        $post = $this->getById($id);

        $post->status = $inputs['status'] == 'true';

        $post->save();
    }

    public function store($inputs)
    {
        return $this->save(new $this->model, $inputs);
    }

    public function destroy($post) {
        $post->delete();
    }
}
