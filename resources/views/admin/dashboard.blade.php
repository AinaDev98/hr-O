@extends('layout.admin_template')

@section('title')
    Tableau de bord
@endsection

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Tableau de bord</h2>
                    </div>
                </div>
            </div>

            
           
            @include('partials.footer')
        </div>
    </div>
</div>
@endsection()