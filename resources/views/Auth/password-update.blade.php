@extends('Template.Auth.layout')

@section('main')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center
">
        <div class="auth-box p-4 bg-white rounded-3">
            <div>
                <div class="logo text-center">
                    <span class="db"><img src="{{ asset('assets/logo/Logo-lpum.png') }}" alt="logo"
                            style="max-width: 60px" /></span>
                    <h5 class="font-weight-medium mb-3 mt-1">Reset Password</h5>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        Sukses. Cek inbox email kamu!
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3" action="{{ route('forgot.request') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="email" type="email" required=""
                                        placeholder="Email" />
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="col-xs-12">
                                    <button class="btn d-block w-100 btn-primary" type="submit">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
