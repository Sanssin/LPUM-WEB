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
                        <form class="form-horizontal mt-3" action="{{ route('password.request') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" type="email" required=""
                                        placeholder="Email" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label for="password">Kata sandi baru</label>
                                    <input class="form-control" id="password" name="password" type="password"
                                        required="" placeholder="Kata sandi" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <label for="password_confirmation">Konfirmasi kata sandi</label>
                                    <input class="form-control" id="password_confirmation" name="password_confirmation"
                                        type="password" required="" placeholder="Konfirmasi kata sandi" />
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="col-xs-12">
                                    <button class="btn d-block w-100 btn-primary" type="submit">
                                        Ubah Password
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
