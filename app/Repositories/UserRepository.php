<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{

	public function __construct(
		User $user)
	{
		$this->model = $user;
	}

  	private function save($user, $inputs)
	{		
        $user->username = $inputs['username'];
        $user->email = $inputs['email'];
		$user->save();
	}

	public function index($n)
	{
		return $this->model
		->latest()
		->paginate($n);
	}

	public function count()
	{
		return $this->model->count();
	}

	public function counts()
	{
		$counts = [
			'admin' => $this->count('admin'),
			'redac' => $this->count('redac'),
			'user' => $this->count('user')
		];

		$counts['total'] = array_sum($counts);

		return $counts;
	}

	public function store($inputs, $confirmation_code = null)
	{
		$user = new $this->model;

		$user->password = bcrypt($inputs['password']);

		if($confirmation_code) {
			$user->confirmation_code = $confirmation_code;
		} else {
			$user->confirmed = true;
		}

		$this->save($user, $inputs);

		return $user;
	}

	public function update($inputs, $user)
	{
		$user->confirmed = isset($inputs['confirmed']);

		$this->save($user, $inputs);
	}

	public function getStatut()
	{
		return session('statut');
	}

	public function valid($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

    public function destroyUser(User $user)
    {
        $user->delete();
    }

	public function confirm($confirmation_code)
	{
		$user = $this->model->whereConfirmationCode($confirmation_code)->firstOrFail();
		$user->confirmed = true;
		$user->confirmation_code = null;
		$user->save();
	}

}
