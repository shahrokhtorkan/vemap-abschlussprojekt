@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-clinic-medical mr-1"></i>{{ __('Impressum') }}</div>
                            <div class="card-body">
                                <p><img src="../images/imprint.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image"></p>
                                <p>Information gemäß §5 E-Commerce-Gesetz, §14 Unternehmensgesetzbuch und §63
                                    Gewerbeordnung sowie Offenlegung laut §25 Mediengesetz:
                                </p>
                                <dt>Name und Anschrift</dt>
                                <dt class="mb-2">Dr. med. univ. Richard Zauner</dt>
                                <p>Simmeringer Hauptstrasse<br>
                                    A-1110 Wien<br>
                                    Telefon: +43 / 123 123 123 123<br>
                                    Fax: +43 / 123 123 123 123<br>
                                    E-Mail: ordination[at]example.com</P>
                                <dt>Berufsbezeichnung</dt>
                                <p>Arzt für Allgemeinmedizin, verliehen in Österreich Bundesgesetz über die Ausübung des ärztlichen Berufes (ÄrzteG 1998): ersichtlich unter www.ris.bka.gv.at</p>
                                <dt>Kammerzugehörigkeit</dt>
                                <p>Österreichische Ärztekammer, Weihburggasse 10-12, A-1010 Wien ( www.aek.or.at )</p>
                                <dt>Für den Inhalt verantwortlich</dt>
                                <p>Dr. med. univ. Richard Zauner</p>
                                <dt>Konzept, Design und Realisation</dt>
                                <p>Sharokh Torkan<br>
                                    Lubomir Mitana<br>
                                    Adnan Alazaat</p>
                                <dt>Technologie</dt>
                                <p>Laravel, laravel.com</p>
                                <dt>Fotos</dt>
                                <p>Pexels, www.pexels.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
