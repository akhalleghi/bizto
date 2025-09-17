<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>۴۰۴ - صفحه پیدا نشد | بیزتو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Vazirmatn', sans-serif; background: linear-gradient(135deg,#667eea,#764ba2); min-height: 100vh; display: flex; align-items: center; }
        .card { border: none; border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,.15); overflow: hidden; }
        .illustration { background: rgba(255,255,255,.08); }
        .btn-warning { background: linear-gradient(135deg,#ffc107,#ff8c00); border: none; color: #000 !important; }
        .btn-outline-light:hover { background: rgba(255,255,255,.12); }
        .code { font-weight: 800; font-size: 5rem; background: linear-gradient(135deg,#fff,#ffe08a); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                        <div class="mb-3"><span class="badge bg-light text-dark fw-bold">بیزتو</span></div>
                        <div class="code">۴۰۴</div>
                        <h1 class="h3 fw-bold mt-2">اوه! صفحه‌ای که به دنبالش بودید پیدا نشد.</h1>
                        <p class="text-muted mt-3 mb-4">ممکن است آدرس را اشتباه وارد کرده باشید یا صفحه حذف شده باشد. می‌توانید به صفحه اصلی برگردید یا جستجو کنید.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ url('/') }}" class="btn btn-warning">
                                <i class="fas fa-home me-2"></i> صفحه اصلی
                            </a>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-light text-white">
                                <i class="fas fa-arrow-right me-2"></i> بازگشت
                            </a>
                        </div>
                        <div class="mt-4">
                            <form class="input-group" action="{{ url('/') }}" method="get" role="search">
                                <input type="text" name="q" class="form-control" placeholder="به دنبال چه هستید؟">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 illustration d-flex align-items-center justify-content-center p-5 bg-dark bg-opacity-10">
                        <div class="text-center text-white">
                            <i class="fas fa-compass fa-7x text-warning"></i>
                            <p class="mt-3 mb-0">نگران نباشید، شما را به مقصد می‌رسانیم.</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-white-50 mt-4 mb-0">کد خطا: ۴۰۴ | Bizto</p>
        </div>
    </div>
    
    @if(app()->hasDebugModeEnabled() && config('app.debug'))
        <div class="alert alert-warning mt-4" dir="ltr">
            <strong>Debug mode is ON:</strong> You are seeing the custom 404 page.
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



