<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la etiqueta']) !!}
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la etiqueta', 'readonly']) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">

    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
