@extends('layouts.app')

@section('content')
<div class="flex flex-col w-1/2 mx-auto">
    <div class="flex">
        <form method="POST" action="{{ route('login') }}" class="flex flex-col border-red-500">
            @csrf

            <div class="flex pb-2">
                <div class="">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="email">

                    @if ($errors->has('email'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="flex pb-2">
                <div class="">
                    <input id="password" type="password" name="password" required placeholder="password">

                    @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                {{ __('Login') }}
            </button>
        </form>
    </div>
</div>
@endsection
