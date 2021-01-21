@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="orphan-add">
     <div class="container">
          <h2 class="text-center">اضافة يتيم جديد</h2>
          <div class="add">
               {!! Form::open(['action' => 'orphansController@store', 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group">
                          {{Form::label('name', 'الاسم الثلاثي')}}
                          {{Form::text('name', '', ['class'=>'form-control', 'data-text'=>'', 'placeholder'=>"اكتب الاسم"])}}
                    </div>

                    <div class="form-group">
                         {{Form::label('age', 'المواليد')}}
                         {{Form::text('age', '', ['class'=>'form-control', 'data-text'=>'', 'placeholder'=>"اكتب المواليد"])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('id_number', 'رقم الهوية')}}
                        {{Form::number('id_number', '', ['class'=>'form-control', 'data-text'=>'', 'placeholder'=>"اكتب رقم الهوية"])}}
                    </div>

                    <div class="form-group">
                       {{Form::label('governorate', 'المحافظة')}}
                       {{Form::text('governorate', '', ['class'=>'form-control', 'data-text'=>'', 'placeholder'=>"اكتب المحافظة"])}}
                    </div>

                    <div class="form-group">
                      {{Form::label('hobbies', 'الهوايات')}}
                      {{Form::text('hobbies', '', ['class'=>'form-control', 'data-text'=>'', 'placeholder'=>"مثال : كرة القدم , السباحة"])}}
                    </div>

                    <div class="form-group">
                      {{Form::label('case', 'الحالة الصحية')}}
                      {{Form::text('case', '', ['class'=>'form-control', 'data-text'=>'', 'placeholder'=>"اكتب الحالة الصحية لليتيم"])}}
                    </div>

                    <div class="form-group">

                      {{Form::file('image', ['class'=>'form-control'])}}
                    </div>
                    {{Form::submit('اضافة', ['class'=>'btn btn-primary btn-lg'])}}
               {!! Form::close() !!}
          </div>
     </div>
</div>


@endsection
