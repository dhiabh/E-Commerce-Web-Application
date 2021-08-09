<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;


    public function belongsToUser(User $user, Article $article)
    {
        return $user->id == $article->boutique->user->id;
    }



}

