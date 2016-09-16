<!DOCTYPE HTML>
<!--
    Alpha by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Onglamour - {{ $title }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="{{ elixir('js/ie/html5shiv.js') }}"></script><![endif]-->
        <link rel="stylesheet" href="{{ elixir('css/main.css') }}" />
        <!--[if lte IE 8]><link rel="stylesheet" href="{{ elixir('css/ie8.css') }}" /><![endif]-->
    </head>
    <body class="landing">
        <div id="page-wrapper">

            <!-- Header -->
                <header id="header" class="alt">
                    <h1><a href="/">Onglamour</h1>
                    <nav id="nav">
                        <ul>
                            <li><a href="/">Acceuil</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/galerie">Galerie</a></li>
                            <li><a href="/rdv/nouveau-rendez-vous">Rendez-vous</a></li>
                            @if (Auth::check())
                                <li><a href="/account/{{ Auth::user()->nom }}/{{ Auth::user()->prenom }}">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</a></li>
                                @if (Auth::user()->grade_id === 2)
                                    <li><a href="#!" class="icon fa-angle-down">Administration</a>
                                        <ul>
                                            <li><a href="/admin/user">Gestion utilisateur</a></li>
                                            <li><a href="/admin/rendez-vous">Voir rendez-vous</a></li>
                                            <li><a href="/admin/news">Gestion des news</a></li>
                                            <li><a href="/admin/galerie">Ajouter photos (Galerie)</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li><a href="/account/logout">Déconnexion</a></li>
                            @else
                                <li><a href="/account/register" class="button special">Inscription</a></li>
                                <li><a href="/account/login" class="button">Connexion</a></li>
                            @endif
                        </ul>
                    </nav>
                </header>

            <!-- Banner -->
                <section id="banner">
                    <h2>Onglamour</h2>
                    <p>Un endroit ou vous trouverez de nombreuses idées de déco sans cesse renouvelées</p>
                </section>

            <!-- Main -->
                <section id="main" class="container">
					@yield('content')
                </section>

            <!-- Footer -->
                <footer id="footer">
                    <ul class="icons">
                        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    </ul>
                    <ul class="copyright">
                        <li>&copy; Onglamour. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </footer>

        </div>

        <!-- Scripts -->
            <script src="{{ elixir('js/jquery.min.js') }}"></script>
            <script src="{{ elixir('js/jquery.dropotron.min.js') }}"></script>
            <script src="{{ elixir('js/jquery.scrollgress.min.js') }}"></script>
            <script src="{{ elixir('js/skel.min.js') }}"></script>
            <script src="{{ elixir('js/util.js') }}"></script>
            <!--[if lte IE 8]><script src="{{ elixir('js/ie/respond.min.js') }}"></script><![endif]-->
            <script src="{{ elixir('js/main.js') }}"></script>

    </body>
</html>