@extends('layouts.app')

@section('title' , 'Home')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-4xl text-center font-bold mt-4">Welcome to Sue Cooks</h1>
        <i>Bull & kabwoy😎😎</i>
        <ul>
            <li>Tailwind and livewire configured</li>
            <li>After running <b>php artisan serve</b> run <b>npm run dev</b> to start thr front end bundling server</li>
        </ul>
    </div>

@endsection
