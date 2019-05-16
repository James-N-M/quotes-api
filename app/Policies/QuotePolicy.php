<?php

namespace App\Policies;

use App\User;
use App\Quote;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quote.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function view(User $user, Quote $quote)
    {
    }

    /**
     * Determine whether the user can create quotes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the quote.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function update(User $user, Quote $quote)
    {
        //
    }

    /**
     * Determine whether the user can delete the quote.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function delete(User $user, Quote $quote)
    {
        //
    }

    /**
     * Determine whether the user can restore the quote.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function restore(User $user, Quote $quote)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quote.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function forceDelete(User $user, Quote $quote)
    {
        //
    }
}
