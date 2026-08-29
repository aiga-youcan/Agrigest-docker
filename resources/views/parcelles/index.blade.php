@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des parcelles</h2>

    <a href="{{ route('parcelles.create') }}" class="btn btn-success">
        + Ajouter une parcelle
    </a>
</div>

<form method="GET" action="{{ route('parcelles.index') }}" class="row g-2 align-items-center mb-3">
    <div class="col-auto">
        <input
            type="text"
            name="q"
            value="{{ $q }}"
            class="form-control"
            placeholder="Rechercher par nom ou culture">
    </div>

    <div class="col-auto">
        <select name="statut" class="form-select">
            <option value="">Tous</option>
            <option value="en culture" {{ $statut == 'en culture' ? 'selected' : '' }}>en culture</option>
            <option value="récoltée" {{ $statut == 'récoltée' ? 'selected' : '' }}>récoltée</option>
            <option value="en jachère" {{ $statut == 'en jachère' ? 'selected' : '' }}>en jachère</option>
        </select>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>

    <div class="col-auto">
        <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">Réinitialiser</a>
    </div>
</form>

<table class="table table-bordered table-hover bg-white shadow">

    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Culture</th>
            <th>Superficie</th>
            <th>Date</th>
            <th>Statut</th>
            <th width="220">Actions</th>
        </tr>
    </thead>

    <tbody>

    @forelse($parcelles as $parcelle)

        <tr>

            <td>{{ $parcelle->id }}</td>

            <td>{{ $parcelle->nom }}</td>

            <td>{{ $parcelle->culture }}</td>

            <td>{{ $parcelle->superficie }} ha</td>

            <td>{{ $parcelle->date_plantation }}</td>

            <td>
                <span class="badge bg-success">
                    {{ $parcelle->statut }}
                </span>
            </td>

            <td>

                <a href="{{ route('parcelles.show',$parcelle->id) }}"
                   class="btn btn-info btn-sm">
                    Voir
                </a>

                <a href="{{ route('parcelles.edit',$parcelle->id) }}"
                   class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <form action="{{ route('parcelles.destroy',$parcelle->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Supprimer cette parcelle ?')">

                        Supprimer

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="7" class="text-center">
                Aucune parcelle trouvée.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection