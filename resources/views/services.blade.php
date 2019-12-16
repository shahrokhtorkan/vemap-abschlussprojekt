@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-toolbox mr-1"></i>{{ __('Leistungen') }}</div>
                            <div class="card-body">
                                <p><img src="../images/services.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image"></p>
                                <p>
                                    Therapie Aktiv Betreuungsprogramm<br>
                                    Der "Therapie Aktiv"-Arzt behandelt seine Patienten umfassend, kontrolliert regelmäßig die Füße, sorgt dafür, dass regelmäßig notwendige Blutparameter wie zB HbA1c bestimmt werden und veranlasst wichtige Untersuchungen wie zB jährliche Augenkontrollen.
                                </p>
                                <p>
                                    Marcoumar-Einstellung<br>
                                    Blutgerinnung ist für den Menschen überlebenswichtig. Bei einer Marcumartherapie wählen Ärzte deshalb den Mittelweg zwischen dem Schutz vor Blutgerinnseln und dem Blutungsrisiko durch Gerinnungshemmung. Die Einstellung der Dosis wird über die sogenannte Thromboplastinzeit (TPZ oder kurz „Quick-Test“) gesteuert. Der Arzt gibt sogenannten „Quick-Wert“, den der Test erreichen soll, vor.
                                </p>
                                <p>
                                    Schmerztherapie<br>
                                    Mit der Schmerztherapie werden akute und chronische Schmerzen behandelt sowie versucht die Ursache für das Auftreten der Schmerzen zu ergründen und zu beseitigen. Die Behandlung wird meistens von Schmerztherapeuten in Schmerzpraxen durchgeführt.
                                </p>
                                <p>
                                    Nahtentfernung<br>
                                    Die operative Entfernung von krebsverdächtigen Neubildungen, auffälligen Muttermalen und Probeentnahmen von unklaren Hautveränderungen führe ich ambulant in meiner Ordination durch.
                                </p>
                                <p>
                                    Verbandwechsel<br>
                                    Unter einem Verbandwechsel versteht man den Wechsel von Wundauflagen und Verbänden, mit denen eine Wunde versorgt wurde.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
