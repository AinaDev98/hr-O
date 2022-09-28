<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Logiciel de Ressource Humaines">
    <meta name="author" content="MadaDev Software by ainaDev">

    <!-- Title Page-->
    <title>@yield('title') - hr-O</title>

    @include('partials.stylesheet')

</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
        @include('partials.header_mobile')
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
        @include('partials.sidebar')
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
            @include('partials.header_desktop')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
            @yield('content')
        <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>

</div>

@include('partials.script')

<script>
    @if (Session::has('success'))
        toastr.success("{{ session('success') }}")
    @endif
    
    $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Voulez-vous supprimer cette element ?", function(confirmed){
      if (confirmed){
          window.location.href = link;
        };
      });
    });
</script>

</body>

</html>
