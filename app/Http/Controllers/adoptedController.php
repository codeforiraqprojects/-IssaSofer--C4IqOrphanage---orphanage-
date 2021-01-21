<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;
use App\Adopted;
use App\Myorphan;
use App\Orphans;
class adoptedController extends Controller
{
     public function index()
     {
          $adopteds = Adopted::all('orphan_id');
          $a_orphans = Orphans::all();
          return view('adopted')->with(array('adopteds' => $adopteds,'a_orphans' => $a_orphans));
     }

     public function story($id)
     {
         $data['orphan_id'] = $id;
         $myorphan = Adopted::create($data);
         return redirect('/orphans')->with('success', 'Done successfuly');
     }
}
