@extends('layouts.master')
@section('title', 'Author')
@section('content')
<h3>Author</h3>

 <a href="/login"><button>Login</button></a>
 <a href="/register"><button>Register</button></a>
 @if (session('message'))
    <p>{{ session('message') }}
@endif
@endsection
