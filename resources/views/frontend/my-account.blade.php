@extends('layouts.frontend.app')

@section('css')

     

@endsection

@section('content')

	{{ Auth::user()->name }}

@endsection

@section('javascript')
    

@stop