<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orphans;
use Image;
use App\User;
use App\Myorphan;
use App\Adopted;
use Gate;
use Auth;
class orphansController extends Controller
{
    public function __construct()
    {

         if (Gate::denies('kind', Auth::user())){
               $this->middleware('auth', ['except'=>['index']]);
          }
    }
    //
    public function index(){
        $orphans = Orphans::orderBy('created_at' , 'desc')->paginate(3);
        $myorphans = Myorphan::all();
        $counts = Myorphan::all('id')->count();
        $adopteds = Adopted::all('orphan_id');
        $c_adopted = Adopted::all('orphan_id')->count();
        return view('orphans')->with(array('orphans' => $orphans, 'myorphans' => $myorphans, 'counts' => $counts, 'adopteds' => $adopteds, 'c_adopted' => $c_adopted));
    }

     public function edit($id)
     {
          if (Gate::allows('kind', Auth::user())){
               $orphans = Orphans::find($id);
               return view('/edit')->with('orphans', $orphans);
          }else {
               return redirect('/home')->with('error', 'can not open this.');
          }
     }

     public function update(Request $request, $id)
     {
          if (Gate::allows('kind', Auth::user())){
               $this->Validate($request , [
                    'name'         => 'required',
                    'age'          => 'required',
                    'id_number'    => 'required',
                    'governorate'  => 'required',
                    'hobbies'      => 'required',
                    'case'         => 'required',
                    'image'        => 'max:500000'
               ]);

               if($request->hasFile('image')){
                  $fileNameExt = $request->file('image')->getClientOriginalName();
                  $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                  $extention = $request->file('image')->getClientOriginalExtension();

                  $fileNameStore =  time() . '.' . $extention;
                  $path =  $request->file('image')->move(base_path() . '/public/image/', $fileNameStore);
               }else{
                  $fileNameStore = 'header.jpg';
               }

               $orphan = Orphans::find($id);
               $orphan->name = $request->input('name');
               $orphan->age = $request->input('age');
               $orphan->id_number = $request->input('id_number');
               $orphan->governorate = $request->input('governorate');
               $orphan->hobbies = $request->input('hobbies');
               $orphan->case = $request->input('case');
               $orphan->image = $fileNameStore;
               $orphan->save();
               return redirect('/orphans')->with('success', 'Done successfuly');
          }else {
               return redirect('/home')->with('error', 'can not open this.');
          }

     }


     public function create()
     {
          if (Gate::allows('kind', Auth::user())){
               return view('/create');
          }else {
               return redirect('/home')->with('error', 'can not open this.');
          }
     }

     public function store(Request $request)
     {
          $this->Validate($request , [
               'name'         => 'required',
               'age'          => 'required',
               'id_number'    => 'required',
               'governorate'  => 'required',
               'hobbies'      => 'required',
               'case'         => 'required',
               'image'        => 'required|nullable|max:500000'
          ]);

          if($request->hasFile('image')){
             $fileNameExt = $request->file('image')->getClientOriginalName();
             $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
             $extention = $request->file('image')->getClientOriginalExtension();

             $fileNameStore =  time() . '.' . $extention;
             $path =  $request->file('image')->move(base_path() . '/public/image/', $fileNameStore);
          }else{
             $fileNameStore = 'header.jpg';
          }

          $orphan = new Orphans;
          $orphan->name = $request->input('name');
          $orphan->age = $request->input('age');
          $orphan->id_number = $request->input('id_number');
          $orphan->governorate = $request->input('governorate');
          $orphan->hobbies = $request->input('hobbies');
          $orphan->case = $request->input('case');
          $orphan->image = $fileNameStore;
          $orphan->save();
          return redirect('/orphans')->with('success', 'Done successfuly');
     }

     public function show()
     {

     }

     public function destroy($id)
     {
          if (Gate::allows('kind', Auth::user())){
               $orphan = Orphans::find($id);
               if($orphan->image){
                  unlink(public_path() . '\image\\' . $orphan->image);
               }
               $orphan->delete();
               return redirect('/orphans')->with('success', 'Done successfuly');
          }else {
               return redirect('/home')->with('error', 'can not open this.');
          }
     }
}
