<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function triggerEvent() {
        Log::info('Triggering TestEvent...');
        event(new TestEvent('Hello, this is a test message!'));
        return response()->json(['message' => 'Event has been sent']);
    }
}
