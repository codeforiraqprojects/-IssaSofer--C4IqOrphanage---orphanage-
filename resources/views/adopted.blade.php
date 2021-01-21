@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="orphans-body">
    <div class="container">
        <div class="row">
             @can('kind', Auth::user())
                  @foreach ($a_orphans as $orphan)
                      @foreach($adopteds as $adopted)
                         @if($adopted->orphan_id == $orphan->id)
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
                                       <button class="btn btn-success more">المزيد</button>
                                   </div>
                               </div>
                          @endif
                       @endforeach
                  @endforeach
               @endcan
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
</div>

@endsection
