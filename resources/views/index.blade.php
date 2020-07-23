@extends('layout.site')
@section('titulo','Home')



@if (Auth::check())

@section('sair','Sair')

@else

@section('login','Login')
@section('cadastro','Cadastro')

@endif




@section('navbar')

@include('layout._includes.navbar')

@endsection

@section('conteudo')


<h3>Index</h3>





@endsection
