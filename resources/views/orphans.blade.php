@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="orphans-body">
    <div class="container">
         @can('kind', Auth::user())
           <div class="text-center">
                <a class="btn btn-success" href="/orphans/create">اضافة يتيم</a>
           </div>
         @endcan
        <div class="row">
                 @foreach ($orphans as $orphan)
                    @foreach($adopteds as $adopted)
                         @if($adopted->orphan_id !== $orphan->id)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                               <div class="orphan">
                                   <div class="image">
                                       <img class="img" src="{{asset('image')}}/{{$orphan->image}}" />
                                   </div>
                                   <div class="text">
                                       <h3 class="text-center name">{{$orphan->name}}</h3>
                                       <h5 class="text-center age">{{$orphan->age}}</h5>
                                       <p class="hidden id">{{$orphan->id_number}}</p>
                                       <p class="hidden governorate">{{$orphan->governorate}}</p>
                                       <p class="hidden hobbies">{{$orphan->hobbies}}</p>
                                       <p class="hidden case">{{$orphan->case}}</p>
                                        @if (!Auth::guest())
                                             @cannot('kind', Auth::user())
                                                  @foreach($myorphans as $myorphan)
                                                       @if(auth()->user()->id == $myorphan->user_id && $orphan->id !== $myorphan->orphan_id || auth()->user()->id !== $myorphan->user_id && $orphan->id == $myorphan->orphan_id || $orphan->id !== $myorphan->orphan_id || $counts == 0)
                                                            {!! Form::open(['action' => ['myorphanController@story', $orphan->id, Auth()->user()->id], 'method' => 'POST']) !!}
                                                                 {{Form::submit('اضافة الى ايتامي', ['class'=>'btn btn-primary  pull-right'])}}
                                                            {!! Form::close() !!}
                                                       @endif
                                                  @endforeach
                                             @endcannot


                                             @can('kind', Auth::user())
                                                  {!! Form::open(['action' => ['orphansController@destroy', $orphan->id], 'method' => 'DELETE']) !!}
                                                       {{Form::submit('حذف', ['class'=>'btn btn-danger  pull-right b-font'])}}
                                                  {!! Form::close() !!}

                                                  @if($orphan->id !== $adopted->orphan_id || $c_adopted == 0)
                                                       {!! Form::open(['action' => ['adoptedController@story', $orphan->id], 'method' => 'POST', 'class' => 'adopted']) !!}
                                                            {{Form::submit('تبني', ['class'=>'btn btn-primary  pull-right b-font'])}}
                                                       {!! Form::close() !!}
                                                  @endif
                                                       <a class="btn btn-success b-font" href="http://localhost:8000/orphans/{{$orphan->id}}/edit">تعديل</a>
                                                  @endcan
                                             @endif
                                            <button class="btn btn-success more b-font">المزيد</button>
                                        </div>
                                    </div>
                                 </div>
                         @endif
                      @endforeach
                  @endforeach
               </div>

             <!-- more information -->
             <div class="info">
                  <div class="image">
                       <img src="" />
                  </div>
                  <h3 class="show-name text-center"></h3>
                  <p class="show-age"></p>
                  <p class="show-id"></p>
                  <p class="show-governorate"></p>
                  <p class="show-hobbies"></p>
                  <p class="show-case"></p>
                  <div class="text-center">
                       <button class="closes">اغلاق</button>
                  </div>
             </div>
     </div>
     {{$orphans->links()}}
</div>

@endsection
