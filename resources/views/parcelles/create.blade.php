@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8 col-lg-6">

        <div class="card shadow border-0">

            <div class="card-header bg-success text-white text-center">
                <h3 class="mb-0">🌱 Ajouter une parcelle</h3>
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

                <form action="{{ route('parcelles.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom</label>
                        <input
                            type="text"
                            name="nom"
                            class="form-control"
                            value="{{ old('nom') }}"
                            placeholder="Nom de la parcelle">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Culture</label>
                        <input
                            type="text"
                            name="culture"
                            class="form-control"
                            value="{{ old('culture') }}"
                            placeholder="Ex : Blé, Maïs...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Superficie (ha)</label>
                        <input
                            type="number"
                            step="0.01"
                            name="superficie"
                            class="form-control"
                            value="{{ old('superficie') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date de plantation</label>
                        <input
                            type="date"
                            name="date_plantation"
                            class="form-control"
                            value="{{ old('date_plantation') }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Statut</label>

                        <select name="statut" class="form-select">
                            <option value="Préparation">Préparation</option>
                            <option value="Plantée">Plantée</option>
                            <option value="Récoltée">Récoltée</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                            ← Retour
                        </a>

                        <button type="submit" class="btn btn-success">
                            💾 Enregistrer
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection