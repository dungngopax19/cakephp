<?php

declare(strict_types=1);

namespace App\Controller;

class RecipesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function view($id)
    {
        $article = $this->fetchTable('Articles')->get($id);
        // dd($article);
        $this->set(compact('article'));

        $this->viewBuilder()->setOption('serialize', 'article');
    }

    public function share($customerId, $recipeId)
    {
        // Action logic goes here.
    }

    public function search($query)
    {
        // Action logic goes here.
    }
}
