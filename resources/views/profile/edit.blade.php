@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ویرایش پروفایل</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">نام</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control"
                                           name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">نام خانوادگی</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control"
                                           name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                </div>
                            </div>

                            <!-- بقیه فیلدها -->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ذخیره تغییرات
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
