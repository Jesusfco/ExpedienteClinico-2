@extends('layouts.aplication')

@section('title', 'MI PERFIL') 

@section('content')


    <h1>{{ Auth::user()-fullName() }}</h2>

        