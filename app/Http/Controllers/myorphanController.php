<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myorphan;
use App\Orphans;
use App\User;
use App\adopted;
use Gate;
use Auth;
class myorphanController extends Controller
{
    //

    public function index()
    {
         if (Gate::denies('kind', Auth::user())) {

              $adopted = Adopted::all('orphan_id');

              $myorphans = Myorphan::all()->where('user_id', auth()->user()->id, 'orphan_id', '!=', $adopted);

              $orphans = Orphans::all();

              return view('myorphan')->with(array('myorphans' => $myorphans, 'orphans' => $orphans));
         }else {
              return redirect('/home');
         }

    }

    public function story(Request $request, $orphan, $user)
    {
         $data['orphan_id'] = $orphan;
         $data['user_id'] = $user;
         $myorphan = Myorphan::create($data);
         return redirect('/myorphans')->with('success', 'Done successfuly');
    }

    public function destroy($id)
    {
         $myorphan = Myorphan::find($id);
         if($myorphan != null){
              $myorphan->delete();
              return redirect('/myorphans')->with('success', 'Done successfuly');
         }
         return redirect('/')->with(['message'=> 'Wrong ID!!']);
    }
}
