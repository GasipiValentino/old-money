
@extends('layouts.main')


@section('title', 'Inicio de sesión')


@section('content')
<div class="w-full max-w-sm p-4 mx-auto my-8 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    {{-- @if (session('feedback.message'))
    <div class="w-96 mt-8 mx-auto flex items-center p-4 mb-4 text-sm text-{{session()->get('feedback.color')}}-800 border border-{{session()->get('feedback.color')}}-300 rounded-lg bg-{{session()->get('feedback.color')}}-50 dark:bg-gray-800 dark:text-white dark:border-{{session()->get('feedback.color')}}-800" role="alert">
            {{ session('feedback.message') }}
        </div>
    @endif --}}
    <form class="space-y-6" action="{{ route('auth.login.process') }}" method="POST">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Inicia sesión</h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ old('email') }}" />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" /*required*/ />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Recordame</label>
            </div>
            <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">¿Contraseña olvidada?</a>
        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            ¿No estás registrado? <a href="{{ route('auth.register.form') }}"" class="text-blue-700 hover:underline dark:text-blue-500">Crea una cuenta</a>
        </div>
    </form>
</div>


@endsection