<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web taques</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="">Web taques</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                            @endauth
                    @endif
                    </ul>
                </div>
            </div>
        </nav>

        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Benvingut a la web taques</h1>
                <p class="lead">Una plataforma web per a l'intercanvi d'imatges de taques entre metge i pacient</p>
                <a class="btn btn-lg btn-light" href="{{ route('login') }}">Inicia sessió</a>
            </div>
        </header>

        <section id="about">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Sobre la web</h2>
                        <p class="lead">La pàgina web proporciona les següents funcionalitats als usuaris: </p>
                        <ul>
                            <li>Permet als pacients pujar imatges de taques</li>
                            <li>Permet als metges fer un control exhaustiu de l'evolució de les taques</li>
                            <li>Favoreix la comunicació entre metge-pacient</li>
                            <li>Utilitza un model de xarxes neuronals per a analitzar les taques i obtenir un diangòstic</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Web taques 2022</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
