<?php

namespace App\Policies;

use App\Entity\Currency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the currency.
     *
     * @param  \App\User $user
     * @param  \App\Entity\Currency $currency
     * @return mixed
     */
    public function view(User $user, Currency $currency)
    {
        return true;
    }

    /**
     * Determine whether the user can create currencies.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the currency.
     *
     * @param  \App\User $user
     * @param Currency $currency
     * @return mixed
     */
    public function update(User $user, Currency $currency)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the currency.
     *
     * @param  \App\User $user
     * @param  Currency $currency
     * @return mixed
     */
    public function delete(User $user, Currency $currency)
    {
        return $user->isAdmin();
    }
}
