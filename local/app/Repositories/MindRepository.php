<?php

namespace App\Repositories;

use App\Models\Mind;
use App\Models\Drug;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MindRepository extends BaseRepository {

    public function __construct(
        Mind $minds
    )
    {
        $this->model = $minds;
    }

    private function save($post, $inputs, $up = null)
    {
        $post->name = $inputs['name'];
        $post->discount_cg1 = $inputs['discount_cg1'];
        $post->discount_cg2 = $inputs['discount_cg2'];
        $post->start_time = $inputs['start_time'];
        $post->end_time = $inputs['end_time'];
        $post->note = $inputs['note'];
        $post->status = $inputs['status'];
        if ($up != 'update') {
            $data = Mind::whereRaw('id = (select max(`id`) from minds)')->first();
            if($data) {
                $post->code = 'PH0'.(int)($data['id']+1);
            } else {
                $post->code = 'PH01';
            }

        }
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


    public function index($n,  $orderby = 'created_at', $direction = 'desc')
    {
        $query = $this->model
            ->select('*')
            ->orderBy($orderby, $direction);

        return $query->paginate($n);
    }

    public function show($id)
    {
        $drugs = Drug::all();
        $post = $this->model->whereId($id)->firstOrFail();

        $arrDrugs = $post->mind_drugs;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($arrDrugs);

        // fix test pagination
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $drugArr = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[ 'path' => LengthAwarePaginator::resolveCurrentPath()]);

        return compact('post', 'drugs', 'drugArr');
    }

    public function edit($post)
    {
        $drugs = Drug::orderBy('name', 'asc')->get();
        return compact('post', 'drugs');
    }

    public function update($inputs, $post)
    {
        $this->save($post, $inputs, 'update');
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
