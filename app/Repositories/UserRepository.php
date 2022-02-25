<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all users.
     *
     * @return User $user
     */
    public function getAll()
    {
        return $this->user->get();
    }

    /**
     * Get user by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->user->where('id', $id)->first();
    }

    /**
     * Save User
     *
     * @param $data
     * @return User
     */
    public function save($data)
    {
        return $this->user->create($data);
    }

    /**
     * Update User
     *
     * @param $data
     * @return User
     */
    public function update($data, $id)
    {
        $user = $this->user->find($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->update();

        return $user;
        // return $this->user->where('id', $id)->update($data);
    }

    /**
     * Update User
     *
     * @param $data
     * @return User
     */
    public function delete($id)
    {
        // return $this->user->where('id', $id)->delete();
        $user = $this->user->find($id);
        $user->delete();

        return $user;
    }

}
