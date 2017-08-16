<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Pharmacies;
use DateTime;

class CustomerRepository extends BaseRepository {

    public function __construct(
        Customer $customers
    )
    {
        $this->model = $customers;
    }

    private function save($post, $inputs, $up = null)
    {
        $post->uid = uniqid();
        $post->created = new datetime;
        $post->name = $inputs['name'];
        $post->phone = $inputs['phone'];
        $post->email = $inputs['email'];
        $post->pharmacieId = $inputs['pharmacieId'];
        $post->password = bcrypt($inputs['password']);;
        $post->status = $inputs['status'];
        if ($up != 'update') {
            $data = Customer::whereRaw('id = (select max(`id`) from customers)')->first();
            if($data) {
                $post->code = 'KH0'.(int)($data['id']+1);
            } else {
                $post->code = 'KH01';
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

    public function search($n, $search, $sStatus)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        $query->where(function($q) use ($search) {
            $q->where('code', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        });
        if($sStatus =='0'){
            $query->where('status', '=', "$sStatus");
        }
        if($sStatus) $query->where('status', '=', "$sStatus");
        return $query->paginate($n);

    }

    public function index($n,  $orderby = 'created_at', $direction = 'desc', $search=null, $sStatus=null)
    {
        if($search || $sStatus || $sStatus =='0') {
            $query = $this->queryActiveWithUserOrderByDate();

            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            });
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
        $post = $this->model->whereId($id)->firstOrFail();
        $pharmacies = Pharmacies::all();
        return compact('post', 'pharmacies');
    }

    public function edit($post)
    {
        if ($post) {
            $pharmacieId = Pharmacies::where('id', $post['pharmacieId'])->orderBy('name', 'asc')->get();
        } else {
            $pharmacieId = Pharmacies::all();
        }

        if(count($pharmacieId) == 0){
            $pharmacieId = Pharmacies::all();
        }
        return compact('post', 'pharmacieId');
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
