@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height mt-5">
        <div class="content">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-10 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-question-circle mr-1"></i>{{ __('Anfragen') }}</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3 class="mb-4">Anfragen</h3>

                                <h5>Sie haben neue Kontaktanfragen</h5>
                                @if(!empty($inquiries))
                                    <table class="table table-bordered table-hover table-sm table-responsive-sm mb-3">
                                        <tr>
                                            <th>Leistung</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telefon</th>
                                            <th>Datum</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                        @foreach($inquiries as $q)
                                            <tr>
                                                <td>{{ $q->service }} </td>
                                                <td>{{ $q->name }} </td>
                                                <td><a href="mailto:{{ $q->email }}" class="text-dark">{{ $q->email }}</a></td>
                                                <td>{{$q->phone}}</td>
                                                <td>{{$q->created_at}}</td>
                                                <td class="text-center">
                                                    <form method="post"  action="{{ route('update',$q)}}">
                                                        @csrf
                                                        <input class="form-check-input" type="hidden" name="status" value="0" checked/>
                                                        @if ($q->status == 0)
                                                            <input type="submit" value="erledigt" class="btn btn-success mt-1">
                                                        @else
                                                            <input type="submit" value="offen" class="btn btn-primary mt-1">
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p>Keine Kontakt vorhanden.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
