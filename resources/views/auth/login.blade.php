@extends('layouts.app')

@section('content')
<div class="flex flex-col w-1/2 mx-auto">
    <div class="pb-2 text-2xl">{{ __('Login') }}</div>

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

            <button type="submit" class="px-4 py-2 border rounded hover:bg-green-600 hover:text-white hover:border-green-600">
                {{ __('Login') }}
            </button>
        </form>
    </div>
</div>
@endsection
