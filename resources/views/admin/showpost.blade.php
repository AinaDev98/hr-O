@extends('layout.admin_template')

@section('title')
    Liste des postes
@endsection
{!! Form::hidden('', $increment = 1) !!}

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Liste des postes</h2>
                    </div>
                </div>
            </div>

            @include('partials._success')
            @include('partials._errors')

            <table class="table table-light mt-4">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Intitulé de poste</th>
                        <th scope="col">Créer le</th>
                        <th scope="col">Modifier le</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $posts as $post )
                    <tr>
                        <td>{{$increment}}</td>
                        <td>{{$post->post_name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <div class="text-center">
                                <a href="{{URL::to('/administration/function/edit/'.$post->id)}}" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <a href="{{URL::to('/administration/function/delete/'.$post->id)}}" class="btn btn-outline-danger btn-sm" id="delete">
                                    <i class="fas fa-trash"></i> Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>
                    {!! Form::hidden('', $increment = $increment + 1) !!}
                @endforeach
                </tbody>
            </table>
            <div class="text-center mt-4">
                {{$posts->links()}}
            </div>
            @include('partials.footer')
        </div>
    </div>
</div>

@endsection