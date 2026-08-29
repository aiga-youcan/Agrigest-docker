@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8 col-lg-6">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">👁️ Détails de la parcelle</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th>Nom</th>
                        <td>{{ $parcelle->nom }}</td>
                    </tr>

                    <tr>
                        <th>Culture</th>
                        <td>{{ $parcelle->culture }}</td>
                    </tr>

                    <tr>
                        <th>Superficie</th>
                        <td>{{ $parcelle->superficie }} ha</td>
                    </tr>

                    <tr>
                        <th>Date de plantation</th>
                        <td>{{ $parcelle->date_plantation }}</td>
                    </tr>

                    <tr>
                        <th>Statut</th>
                        <td>

                            @if($parcelle->statut=="Préparation")
                                <span class="badge bg-warning text-dark">
                                    {{ $parcelle->statut }}
                                </span>

                            @elseif($parcelle->statut=="Plantée")
                                <span class="badge bg-success">
                                    {{ $parcelle->statut }}
                                </span>

                            @else
                                <span class="badge bg-primary">
                                    {{ $parcelle->statut }}
                                </span>

                            @endif

                        </td>

                    </tr>

                </table>

                <div class="d-flex justify-content-between mt-4">

                    <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                        ← Retour
                    </a>

                    <a href="{{ route('parcelles.edit',$parcelle->id) }}" class="btn btn-warning">
                        ✏️ Modifier
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection