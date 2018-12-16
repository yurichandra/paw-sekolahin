@extends('mails.default')

@section('title', 'Welcome to Sekolahin | Email Verification')

@section('content')
    <p>
        Hello, welcome to sekolahin. Here are the following links to
        verify your account : <br> {{ route('user-verify', $user->tokens->first()->email) }}
        <br>
        <br>
        Thankyou,<br>
        Sekolahin
    </p>
@endsection
