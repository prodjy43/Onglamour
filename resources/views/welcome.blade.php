@extends('default')

@section('content')
    <section class="box special">
        <header class="major">
            <h2>Bienvenur sur le site Onglamour</h2>
            <p>Ou tout ce que vous voulez sur vos ongles devien possible<br />
            et tout ça as un prix abordable de tous.</p>
        </header>
        <span class="image featured"><img src="images/banner.jpg" alt="" height="350px"/></span>
    </section>

    <section class="box special features">
        <div class="features-row">
            <section>
                <span class="icon major fa-info accent2"></span>
                <h3>Informations</h3>
                <p>Bonjour mesdames, je m'appelle <strong>Daniela Biedermann</strong> et j'habite au <strong>Ch.Du Mont de Pitié 16 à Cortaillod</strong>.<br>Si vous voulez me joindre vous pouvez me contacter par téléphone <strong>à partir de 11h au (+41) 79/769.27.64</strong> ou sur facebook à ce lien : <a href="http://www.facebook.com/onglamour23">www.facebook.com/onglamour23</a></p>
            </section>
            <section>
                <span class="icon major fa-child accent3"></span>
                <h3>Enfants</h3>
                <p>Pour les enfants il est possible de faire un <strong><br>remplissage et déco pour 20.-</strong>.<br> <strong>Vernis sans gel.</strong></p>
            </section>
        </div>
        <div class="features-row">
            <section>
                <span class="icon major fa-female accent4"></span>
                <h3>Etudiantes</h3>
                <p><strong>Pose complète : 50.-</strong><br>
                <strong>Remplissage : 30.-</strong><br>
                <strong>Déco : 5.-</strong><br>
                <strong>Pieds : 20.-</strong><br>
                <strong>Pieds + Mains : rabais 5.-</strong><br>
                <strong>Dépose de gel : 10.-</strong></p>
            </section>
            <section>
                <span class="icon major fa-user accent5"></span>
                <h3>Adultes</h3>
                <p><strong>Pose complète : 70.-</strong><br>
                <strong>Remplissage : 50.-</strong><br>
                <strong>Déco : 10.-</strong><br>
                <strong>Pieds : 30.-</strong><br>
                <strong>Pieds + Mains : rabais 5.-</strong><br>
                <strong>Dépose de gel : 10.-</strong></p>
            </section>
        </div>
    </section>

    <div class="row">
    @foreach ($news as $data)
        <div class="6u 12u(narrower)">

            <section class="box special">
                <span class="image featured"><img src="{{ elixir('images/upload/'.$data['image']) }}" alt="{{ elixir('images/upload/'.$data['image']) }}" /></span>
                <h3>{{ $data->title }}</h3>
                <p>{!! nl2br($data->content) !!}</p>
                <ul class="actions">
                    <li><a href="/blog/{{ $data->slug }}" class="button alt">Voir la news</a></li>
                </ul>
            </section>

        </div>
    @endforeach
    </div>
    <div class="row">
        <div class="12u 12u(mobilep)" style="text-align: center;">
            <a href="/blog" class="button">Voir toutes les news</a>
        </div>
    </div>
@stop