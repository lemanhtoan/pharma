<?php

namespace App\Repositories;

use App\Models\Discount;

class DiscountRepository extends BaseRepository {

    public function __construct(
        Discount $config_discount
    )
    {
        $this->model = $config_discount;
    }

    private function save($post, $inputs, $up = null)
    {
        $post->name = $inputs['name'];
        $post->level = $inputs['level'];
        $post->from = $inputs['from'];
        $post->to = $inputs['to'];
        $post->value = $inputs['value'];
        $post->type = $inputs['type'];
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

    public function index($n,  $orderby = 'created_at', $direction = 'desc')
    {
        $query = $this->model
            ->select('*')
            ->orderBy($orderby, $direction);
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

    public function store($inputs)
    {
        $this->save(new $this->model, $inputs);
    }

    public function destroy($post) {
        $post->delete();
    }
}
