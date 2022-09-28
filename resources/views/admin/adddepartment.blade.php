@extends('layout.admin_template')

@section('title')
    Ajouter un département
@endsection

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Nouveau département</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-5">

                    @include('partials._success')

                    @include('partials._errors')

                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['url' => '/administration/department/add', 'method' => 'POST']) !!}

                            @csrf
                                {{ Form::label('department_name', 'Nom du département :', ['class' => 'form-label']) }}
                                {{ Form::text('department_name', null, ['class' => 'form-control']) }}
                                <hr>
                                {{ Form::submit('Enregistrer', ['class' => 'btn btn-primary d-flex ml-auto p-2']) }}

                            {!! Form::close() !!}
                        </div>
                      </div>

                </div> 
                <div class="col-md-3"></div>
            </div>
           
            @include('partials.footer')
        </div>
    </div>
</div>

@endsection