<?php

namespace App\Http\Controllers;

use App\Models\Sprint;

class SprintController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getAll()
    {
        return Sprint::all();
    }

    public function get()
    {

    }

}
