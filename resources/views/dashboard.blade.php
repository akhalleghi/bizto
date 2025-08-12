@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">داشبورد</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4> سلام {{ auth()->user()->first_name }} عزیز!</h4>
                        <p>شما به عنوان {{ $userType }} وارد شده‌اید.</p>
                        @if(auth()->user()->subscription_type === 'free')
                            <div class="alert alert-info">
                                <p>شما از نسخه رایگان استفاده می‌کنید. برای دسترسی به امکانات بیشتر می‌توانید اشتراک خود را ارتقا دهید.</p>
                                <a href="#" class="btn btn-primary">ارتقای اشتراک</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
