<?php

namespace App\Http\View\Composer;

use App\Models\SiteMeta;
use Illuminate\View\View;



class DataComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $meta;


    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->meta = SiteMeta::find(1);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['meta' =>  $this->meta]);
    }
}