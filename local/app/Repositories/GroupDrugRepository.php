<?php

namespace App\Repositories;

use App\Models\GroupDrug;

class GroupDrugRepository extends BaseRepository {

    public function __construct(
        GroupDrug $group_drugs
    )
    {
        $this->model = $group_drugs;
    }

    private function save($post, $inputs, $up = null)
    {
        $post->short_name = $inputs['short_name'];
        $post->full_name = $inputs['full_name'];
        $post->note = $inputs['note'];
        $post->status = $inputs['status'];
        if ($up != 'update') {
            $data = GroupDrug::whereRaw('id = (select max(`id`) from group_drugs)')->first();
            if($data) {
                $post->code = 'NT0'.(int)($data['id']+1);
            } else {
                $post->code = 'NT01';
            }

        }
        $post->save();

        return $post;
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

    public function search($n, $search)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->where(function($q) use ($search) {
                    $q->where('short_name', 'like', "%$search%")
                            ->orWhere('code', 'like', "%$search%")
                            ->orWhere('full_name', 'like', "%$search%")
                            ->orWhere('note', 'like', "%$search%");
                })->paginate($n);
    }

    public function index($n,  $orderby = 'created_at', $direction = 'desc', $search=null)
    {
        if($search) {
            $query = $this->model
                ->where('short_name', 'like', "%$search%")
                ->orWhere('code', 'like', "%$search%")
                ->orWhere('full_name', 'like', "%$search%")
                ->orWhere('note', 'like', "%$search%")
                ->select('*')
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
        $post = $this->model->whereId($id)->firstOrFail();
        return compact('post');
    }

    public function edit($post)
    {
        return compact('post');
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
        $this->save(new $this->model, $inputs);
    }

    public function destroy($post) {
        $post->delete();
    }
}
