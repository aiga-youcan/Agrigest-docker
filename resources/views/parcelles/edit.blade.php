@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8 col-lg-6">

        <div class="card shadow border-0">

            <div class="card-header bg-warning text-dark text-center">
                <h3 class="mb-0">✏️ Modifier une parcelle</h3>
            </div>

            <div class="card-body p-4">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('parcelles.update',$parcelle->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom</label>
                        <input type="text" class="form-control" name="nom"
                               value="{{ old('nom',$parcelle->nom) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Culture</label>
                        <input type="text" class="form-control" name="culture"
                               value="{{ old('culture',$parcelle->culture) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Superficie (ha)</label>
                        <input type="number" step="0.01" class="form-control"
                               name="superficie"
                               value="{{ old('superficie',$parcelle->superficie) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date de plantation</label>
                        <input type="date" class="form-control"
                               name="date_plantation"
                               value="{{ old('date_plantation',$parcelle->date_plantation) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Statut</label>

                        <select name="statut" class="form-select">

                            <option value="Préparation" {{ $parcelle->statut=='Préparation' ? 'selected' : '' }}>
                                Préparation
                            </option>

                            <option value="Plantée" {{ $parcelle->statut=='Plantée' ? 'selected' : '' }}>
                                Plantée
                            </option>

                            <option value="Récoltée" {{ $parcelle->statut=='Récoltée' ? 'selected' : '' }}>
                                Récoltée
                            </option>

                        </select>

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                            ← Retour
                        </a>

                        <button class="btn btn-warning">
                            💾 Modifier
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection