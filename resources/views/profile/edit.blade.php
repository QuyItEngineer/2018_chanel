@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['profile.update'], 'method' => 'post', 'files' => true]) !!}

                        @include('profile.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
