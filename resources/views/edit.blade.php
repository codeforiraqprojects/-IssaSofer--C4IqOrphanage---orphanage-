@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="orphan-add">
     <div class="container">
          <div class="add">

                    {!! Form::open(['action' => ['orphansController@update', $orphans->id], 'method' => 'PUT', 'files' => true]) !!}

                         <div class="form-group">
                               {{Form::label('name', 'الاسم الثلاثي')}}
                               {{Form::text('name', $orphans->name, ['class'=>'form-control', 'placeholder'=>"اكتب الاسم"])}}
                         </div>

                         <div class="form-group">
                              {{Form::label('age', 'المواليد')}}
                              {{Form::text('age', $orphans->age, ['class'=>'form-control', 'placeholder'=>"اكتب المواليد"])}}
                         </div>

                         <div class="form-group">
                             {{Form::label('id_number', 'رقم الهوية')}}
                             {{Form::number('id_number', $orphans->id_number, ['class'=>'form-control', 'placeholder'=>"اكتب رقم الهوية"])}}
                         </div>

                         <div class="form-group">
                            {{Form::label('governorate', 'المحافظة')}}
                            {{Form::text('governorate', $orphans->governorate, ['class'=>'form-control', 'placeholder'=>"اكتب المحافظة"])}}
                         </div>

                         <div class="form-group">
                           {{Form::label('hobbies', 'الهوايات')}}
                           {{Form::text('hobbies', $orphans->hobbies, ['class'=>'form-control', 'placeholder'=>"مثال : كرة القدم , السباحة"])}}
                         </div>

                         <div class="form-group">
                           {{Form::label('case', 'الحالة الصحية')}}
                           {{Form::text('case', $orphans->case, ['class'=>'form-control', 'placeholder'=>"اكتب الحالة الصحية لليتيم"])}}
                         </div>

                         <div class="form-group">

                           {{Form::file('image', ['class'=>'form-control'])}}
                         </div>
                         {{Form::submit('تحديث', ['class'=>'btn btn-primary btn-lg'])}}
                    {!! Form::close() !!}

          </div>
     </div>
</div>

@endsection
