<?php

namespace App\Repositories;

use App\Models\Shipping;

class ShippingRepository extends BaseRepository {

    public function __construct(
        Shipping $shipping_owner
    )
    {
        $this->model = $shipping_owner;
    }

    private function save($post, $inputs, $up = null)
    {
        $post->name = $inputs['name'];
        $post->note = $inputs['note'];
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
