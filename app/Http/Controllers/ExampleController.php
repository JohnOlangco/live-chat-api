<?php

namespace App\Http\Controllers;

use App\Events\ExampleEvent;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function fireEvent() {
        $data = ['Hello', 'Motherfucker'];

        event(new ExampleEvent($data));
    }
}
