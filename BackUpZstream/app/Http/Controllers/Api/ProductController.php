<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function get_all_inventory(Request $request)
    {
        if($request->connection_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id)');
        }

        $key = $request->connection_id;
        $user_id=$this->validate_connection_id($key);

        if($user_id)
        {
            $inventory=DB::table('inventories')
            ->orderBy('updated_at', 'DESC')->get();

            return $this->processResponse('All Products',$inventory,'success','Product fetched successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }
}
