@extends('layouts.layout')

@section('content')
<div class="flex w-1/2 mx-auto flex-col">
    <div class="text-2xl pb-2">{{ __('Login') }}</div>

    <div class="flex">
        <form method="POST" action="{{ route('login') }}" class="flex flex-col border-red-500">
            @csrf

            <div class="flex pb-2">
                <div class="">
                    <input id="email" type="email" class="px-4 py-2 border rounded {{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="email">

                    @if ($errors->has('email'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="flex pb-2">
                <div class="">
                    <input id="password" type="password" class="px-4 py-2 border rounded {{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required placeholder="password">

                    @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="border rounded px-4 py-2 hover:bg-green-dark hover:text-white hover:border-green-dark">
                {{ __('Login') }}
            </button>
        </form>
    </div>
</div>
@endsection
