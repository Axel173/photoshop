<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\ShopCategoryRepository;

class CategoriesComposer
{
    /**
     * The user repository implementation.
     *
     * @var ShopCategoryRepository
     */
    protected $categories;

    /**
     * Create a new profile composer.
     *
     * @param  ShopCategoryRepository  $categories
     * @return void
     */
    public function __construct(ShopCategoryRepository $categories)
    {
        // Dependencies automatically resolved by service container...
        //$this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //$view->with('categories', $this->categories->getAll());
    }
}