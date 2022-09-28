@extends('layout.admin_template')
@section('title')
    Ajouter un employer
@endsection

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Nouvelle employer</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">

                    @include('partials._success')

                    @include('partials._errors')

                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['url' => '/administration/employed/register', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            @csrf
                            
                            <h4 class="mb-3">Information personnel</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('civility', 'Civilité :', ['class' => 'form-label']) }}
                                    <select class="form-control mb-1" id="civility" name="civility" plac>
                                        <option selected value="">-- choisissez la civilité --</option>
                                        <option value="Monsieur">Monsieur</option>
                                        <option value="Madame">Madame</option>
                                        <option value="Mademoiselle">Mademoiselle</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('birthday', 'Date de naissance :', ['class' => 'form-label']) }}
                                    {{ Form::date('birthday', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('profile_image', 'Photo d\'identité :', ['class' => 'form-label']) }}
                                    {{ Form::file('profile_image', ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('firstname', 'Nom de famille :', ['class' => 'form-label']) }}
                                    {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('lastname', 'Prénom :', ['class' => 'form-label']) }}
                                    {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('phone', 'Numero de télephone :', ['class' => 'form-label']) }}
                                    {{ Form::number('phone', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('address', 'Adresse :', ['class' => 'form-label']) }}
                                    {{ Form::text('address', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <h4 class="mt-4 mb-3">Information individuel dans l'entreprise <span class="text-danger">*</span></h4>
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('category', 'Catégorie de l\'employer :', ['class' => 'form-label']) }}
                                    {{ Form::select('category', $categories, null, ['placeholder' => '-- Choisissez la catégorie --', 'class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('department', 'Département de l\'employé :', ['class' => 'form-label']) }}
                                    {{ Form::select('department', $departments, null, ['placeholder' => '-- Choisissez le departement --', 'class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('function', 'Poste de l\'employer :', ['class' => 'form-label']) }}
                                    {{ Form::select('function', $posts, null, ['placeholder' => '-- Choisissez le poste --', 'class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('matricule', 'Numero matricule :', ['class' => 'form-label']) }}
                                    {{ Form::text('matricule', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <h4 class="mt-4 mb-3">Information de connexion <span class="text-danger">*</span></h4>
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('email', 'Adresse email :', ['class' => 'form-label']) }}
                                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('password', 'Mot de passe :', ['class' => 'form-label']) }}
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                </div>
                            </div>
                                
                                
                                <hr>
                                {{ Form::submit('Enregistrer', ['class' => 'btn btn-primary d-flex ml-auto p-2']) }}
                            
                            {!! Form::close() !!}
                        </div>
                      </div>

                </div> 
            </div>
           
            @include('partials.footer')
        </div>
    </div>
</div>

@endsection