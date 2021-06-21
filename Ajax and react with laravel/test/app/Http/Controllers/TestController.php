<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function index()
    {
        return view('Javascript.index');
    }


    public function create()
    {
        //while(keybord.is_pressed('q')==false):
            //pyautogui.press('right',presses=1,interval=0.3)
            //a=random.randomint(0,9)
            //time.sleep()

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Test $test)
    {
        //
    }

    public function edit(Test $test)
    {
        //
    }

    public function update(Request $request, Test $test)
    {
        //
    }


    public function destroy(Test $test)
    {
        //
    }
}
