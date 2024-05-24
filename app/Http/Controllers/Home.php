<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Home extends BaseController
{
    public function hikeDetails(): View
    {
        $results = Hikes::getAllHikes();
        return view('hello', ['results' => $results]);
    }

}
