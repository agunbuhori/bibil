@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Verify @endslot
  @slot('subtitle') verifikasi user @endslot
  @endcomponent

  <section class="content">
      <div class="callout callout-info">
        <h4>{{ __('Verify Your Email Address') }}</h4>
        @if (session('resent'))
        <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
        @endif
        <p>
          {{ __('Before proceeding, please check your email for a verification link.') }}
          {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </p>
      </div>
  </section>
@endsection