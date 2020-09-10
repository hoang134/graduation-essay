<?php

namespace App\Policies;

use App\User;
use App\UserPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == User::ROLE_SUPER_ADMIN;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\UserPost  $userPost
     * @return mixed
     */
    public function view(User $user, UserPost $userPost)
    {
        return $user->role == $userPost->user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\UserPost  $userPost
     * @return mixed
     */
    public function update(User $user, UserPost $userPost)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\UserPost  $userPost
     * @return mixed
     */
    public function delete(User $user, UserPost $userPost)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\UserPost  $userPost
     * @return mixed
     */
    public function restore(User $user, UserPost $userPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\UserPost  $userPost
     * @return mixed
     */
    public function forceDelete(User $user, UserPost $userPost)
    {
        //
    }
}
