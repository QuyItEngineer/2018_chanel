@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chanel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chanel, ['route' => ['chanels.update', $chanel->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('chanels.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection