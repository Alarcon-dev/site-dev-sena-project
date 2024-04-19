@extends('layouts.master')
@section('content')
    @if ($resource)
        {{ $item['id_resources'] }}
    @endif
@endsection
