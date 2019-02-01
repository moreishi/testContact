@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>
    <a href="{{ route('create-contact') }}" class="btn btn-success mt-3">Add Contact</a>
    <Contacts />
@endsection