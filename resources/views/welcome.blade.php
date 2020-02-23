@extends('layouts.new')

@section('content')

<!-- section intro -->
<section id="intro">
    <ul id="slippry-slider">
        <li>
            <a href="#slide1"><img src="assets/img/slide/1.jpg" alt="Dobrodošli na web stranice Delte!"></a>
        </li>
        <li>
            <a href="#slide2"><img src="assets/img/slide/2.jpg"
                    alt="Posjetite nas i uživajte u mnogim PC i PS4 naslovima"></a>
        </li>
        <li>
            <a href="#slide3"><img src="assets/img/slide/3.jpg" alt="Gaming u  <span class='red'>♥</span> :)"></a>
        </li>
    </ul>
</section>
<!-- end intro -->

<!-- Section about -->

@if (Auth::check() && count( $venues ) != 0 )


@forelse ($venues as $venue)
<section id="about" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h3><span>Vaši bodovi : <text style="color:#ffcf40;"> {{$venue->pivot->points}} </text> </span></h3>
                </div>
                <div class="sub-heading">
                    <p>
                        Skupljene bodove moguće je izmjenite za neku od nagrada u poslovnici.
                    </p>
                    <p> <b> Bodovi se skupljaju uplatama na račun u igraonici </b> </p>
                    <p>30 min - <b> 30 bodova </b> </p>
                    <p>1 sat - <b>70 bodova</b></p>
                    <p>2 sata - <b>150 bodova</b></p>
                    <p>3 sata - <b>220 bodova</b></p>
                </div>
            </div>
        </div>

        <div class="text-center">

            <div class="card">
                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                <div class="card-body">
                    <h5 class="card-title">POPIS NAGRADA</h5>
                    {{-- <p class="card-text">Skupljene bodove izmjenite za nagrade u poslovnici :) </p>
            <p class="card-text">Ukupni bodovi: <b> {{$venue->pivot->points}} </b> </p> --}}
                    <br>

                </div>
                <ul class="list-group list-group-flush">

                    @forelse ($venue->rewards->sortBy('reward_points') as $reward)

                    <p> <b> {{$reward->name}} </b></p>
                    <p>Vrijednost nagrade : <b> {{$reward->reward_points}} </b> </p>

                    {{-- @if ($venue->pivot->points >=
           $reward->reward_points)

          <b> Čestitamo, imate dovoljno bodova za : {{$reward->name}} :) </b>
                    @else
                    <b> {{$reward->name}} </b>
                    @endif --}}

                    <li class="list-group-item" style="width:80%; margin:auto;">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                style="width: {{$venue->pivot->points / $reward->reward_points * 100}}%;"
                                aria-valuenow="{{$venue->pivot->points / $reward->reward_points * 100}}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <br>

                    @empty


                    @endforelse

                </ul>
                {{-- <div class="card-body"> --}}
                {{-- <a href="/venues/{{$venue->id}}/news" class="card-link">{{$venue->venueName}} Promocije i
                novosti</a> --}}
                {{-- <a href="#" class="card-link">Another link</a> --}}
                {{-- </div> --}}
            </div>
            <br>


            @empty
            Nemate bodova

            @endforelse
        </div>
    </div>

    </div>
</section>

@else

<section id="about" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h3><span>Point sistem</span></h3>
                </div>
                <div class="sub-heading">
                    <p>
                        <a href="http://www.delta-tenja.com/register">Registrirajte</a> se na stranici te igranjem u Delti
                         skupljate bodove koje mozete razmijeniti za nagrade.
                    </p>

                    <p> <b> Bodovi se skupljaju uplatama na račun u igraonici
                    </b> </p>
                    <p>30 min - <b> 30 bodova </b> </p>
                    <p>1 sat - <b>70 bodova</b></p>
                    <p>2 sata - <b>150 bodova</b></p>
                    <p>3 sata - <b>220 bodova</b></p>
                </div>
            </div>
        </div>
        @endif
        <!-- end section about -->
        <!-- section works -->
        <section id="works" class="section gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="heading">
                            <h3><span>Zaigrajte :) </span></h3>
                        </div>
                        <div class="sub-heading">
                            <p>
                                U ponudi su mnogi PS4 te PC naslovi. Izdvajamo
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="grid effect" id="grid">
                            <li>
                                <a class="fancybox" data-fancybox-group="gallery" title="Fortnite"
                                    href="assets/img/portfolio/1.jpg">
                                    <img src="assets/img/portfolio/1.jpg" alt="" />
                                </a>
                            </li>
                            <li><a href="assets/img/portfolio/2.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="PlayerUnknown's Battlegrounds"><img src="assets/img/portfolio/2.jpg"
                                        alt="" /></a></li>
                            <li><a href="assets/img/portfolio/3.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="FIFA 20"><img src="assets/img/portfolio/3.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/4.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="PES 20"><img src="assets/img/portfolio/4.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/5.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="GTA V"><img src="assets/img/portfolio/5.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/6.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="NBA 2K20"><img src="assets/img/portfolio/6.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/7.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="OVERWATCH"><img src="assets/img/portfolio/7.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/8.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Paladins"><img src="assets/img/portfolio/8.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/9.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Counter Strike GO"><img src="assets/img/portfolio/9.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/10.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Gran Turismo Sport"><img src="assets/img/portfolio/10.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/11.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Minecraft"><img src="assets/img/portfolio/11.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/12.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Left 4 Dead 2"><img src="assets/img/portfolio/12.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/13.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Call of duty BO 4"><img src="assets/img/portfolio/13.jpg" alt="" /></a></li>
                            <li><a href="assets/img/portfolio/14.jpg" class="fancybox" data-fancybox-group="gallery"
                                    title="Trackmania Turbo"><img src="assets/img/portfolio/14.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <!-- section works -->
        <!-- section contact -->
        <section id="contact" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="heading">
                            <h3><span>Kako do nas</span></h3>
                        </div>
                        <div class="sub-heading">
                            <p>
                                Nalazimo se u Tenju, na adresi Osječka 21b. Najbrži kontakt putem <a
                                    href="https://www.facebook.com/deltatenja/">facebook stranice</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                {{-- <div class="row"> --}}
            </div>
            {{-- <div class="col-md-6"> --}}
            <div style="width:50%; margin:auto;">
                <h4>Pronađite nas</h4>
            </div>
            <!-- map -->
            <div id="section-map" class="clearfix" style="width:70%; margin:auto;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.068904204493!2d18.735586049919128!3d45.50869153839411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475ce8cfe221f54f%3A0x495ab31cfb3fbb9d!2sDelta%20Tenja!5e0!3m2!1sen!2shr!4v1582300496675!5m2!1sen!2shr"
                    width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
    </div>
</section>
<!-- end section contact -->
@endsection
