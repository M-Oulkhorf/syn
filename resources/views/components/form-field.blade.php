<!--
Le composant form-field est conçu pour générer dynamiquement différents types de champs de formulaire (input, select, textarea, radio).
Il permet une personnalisation facile grâce à des paramètres, tout en intégrant des styles Bootstrap.
-->

@props([
    'name',   
    'label',  
    'value' => '', 
    'type' => 'text',
    'required' => false, 
    'options' => [], 
    'style' => '', 
    'disabled' => false 
])

<!--
Le conteneur principal du champ utilise une disposition responsive (col-md-5) pour une meilleure adaptation sur différentes tailles d'écran.
-->
<div class="col-md-5">
    <div class="form-group">
        <!-- Étiquette associée au champ -->
        <label for="{{ $name }}" style="font-size: 1rem;">
            <strong>{{ $label }}</strong>
            <!-- Ajout d'une étoile rouge si le champ est requis -->
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>

        <!-- Gestion des différents types de champs -->
        @if ($type === 'select')
            <!-- Champ de sélection avec options dynamiques -->
            <select name="{{ $name }}" id="{{ $name }}" 
                class="form-control @error($name) is-invalid @enderror" 
                {{ $required ? 'required' : '' }} 
                {{ $disabled ? 'disabled' : '' }}
                style="{{ $style }}; font-size: 1rem;">
                <option value="">Sélectionnez une option</option>
                @foreach ($options as $optionValue => $optionLabel)
                    <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                        {{ $optionValue." - ".$optionLabel }}
                    </option>
                @endforeach
            </select>
        @elseif ($type === 'textarea')
            <!-- Champ de zone de texte -->
            <textarea name="{{ $name }}" id="{{ $name }}" 
                class="form-control @error($name) is-invalid @enderror" 
                {{ $required ? 'required' : '' }} 
                {{ $disabled ? 'disabled' : '' }}
                style="{{ $style }}; font-size: 1rem;">{{ old($name, $value) }}</textarea>
        @elseif ($type === 'radio')
            <!-- Groupe de boutons radio avec options dynamiques -->
            @foreach ($options as $radioValue => $radioLabel)
                <div class="custom-control custom-radio">
                    <input type="radio" name="{{ $name }}" id="{{ $name }}-{{ $radioValue }}" value="{{ $radioValue }}" 
                        class="custom-control-input" 
                        {{ old($name, $value) == $radioValue ? 'checked' : '' }} 
                        {{ $disabled ? 'disabled' : '' }}>
                    <label class="custom-control-label" for="{{ $name }}-{{ $radioValue }}" style="font-size: 1rem;">{{ $radioLabel }}</label>
                </div>
            @endforeach
        @else
            <!-- Champ de saisie standard -->
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" 
                class="form-control @error($name) is-invalid @enderror" 
                {{ $required ? 'required' : '' }} 
                {{ $disabled ? 'disabled' : '' }}
                style="{{ $style }}; font-size: 1rem;">
        @endif

        <!-- Message d'erreur lié à la validation -->
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
