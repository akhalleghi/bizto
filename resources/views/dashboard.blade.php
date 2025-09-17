<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>داشبورد | بیزتو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Vazirmatn', sans-serif; background: #f6f7fb; }
        .app-shell { min-height: 100vh; display: grid; grid-template-columns: 280px 1fr; }
        .sidebar { background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; position: sticky; top: 0; height: 100vh; }
        .sidebar .brand { padding: 1.25rem 1.25rem 0.5rem; }
        .sidebar .brand .logo { width: 42px; height: 42px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; background: rgba(255,255,255,.15); }
        .sidebar .nav-link { color: #e9eaf5; padding: .75rem 1rem; border-radius: 10px; display: flex; align-items: center; gap: .6rem; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.15); color: #fff; }
        .sidebar .section-title { font-size: .75rem; letter-spacing: .5px; opacity: .8; margin: 1rem 1rem .5rem; }
        .content { padding: 1.25rem 1.25rem; }
        .topbar { background: #fff; border-radius: 16px; padding: .9rem 1rem; box-shadow: 0 10px 20px rgba(0,0,0,.05); margin-bottom: 1rem; display: flex; align-items: center; justify-content: space-between; }
        .kpi { background: #fff; border: 1px solid rgba(0,0,0,.06); border-radius: 16px; padding: 1rem; box-shadow: 0 8px 20px rgba(0,0,0,.04); }
        .kpi .icon { width: 42px; height: 42px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; }
        .cardx { background: #fff; border: 1px solid rgba(0,0,0,.06); border-radius: 16px; box-shadow: 0 10px 24px rgba(0,0,0,.05); }
        .cardx .cardx-header { padding: .9rem 1rem; border-bottom: 1px solid rgba(0,0,0,.06); font-weight: 700; background: #fff; border-radius: 16px 16px 0 0; }
        .cardx .cardx-body { padding: 1rem; }
        .btn-glass { background: rgba(102,126,234,.12); color: #4f46e5; border: 1px solid rgba(102,126,234,.2); }
        .btn-glass:hover { background: rgba(102,126,234,.18); }
        .badge-soft { background: rgba(102,126,234,.12); color: #4f46e5; }
        .table > :not(caption) > * > * { padding: .75rem; }
        @media (max-width: 992px) {
            .app-shell { grid-template-columns: 1fr; }
            .sidebar { position: fixed; right: 0; width: 260px; transform: translateX(100%); transition: transform .25s ease; z-index: 1040; }
            .sidebar.show { transform: translateX(0); }
            .content { padding: 1rem; }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('appSidebar');
            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
        });
    </script>
</head>
<body>
<div class="app-shell">
    <aside id="appSidebar" class="sidebar">
        <div class="brand d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="logo text-warning"><i class="fas fa-rocket"></i></span>
                <span class="fw-bold">بیزتو</span>
            </div>
        </div>
        <div class="px-3 pb-3">
            <div class="section-title">منوی اصلی</div>
            <nav class="nav flex-column">
                <a class="nav-link active" href="#"><i class="fas fa-gauge"></i><span>داشبورد</span></a>
                <a class="nav-link" href="#"><i class="fas fa-bullhorn"></i><span>کمپین‌های پیامکی</span></a>
                <a class="nav-link" href="#"><i class="fab fa-instagram"></i><span>دستیار اینستاگرام</span></a>
                <a class="nav-link" href="#"><i class="fas fa-users"></i><span>باشگاه مشتریان</span></a>
                <a class="nav-link" href="#"><i class="fas fa-envelope-open-text"></i><span>خبرنامه</span></a>
                <a class="nav-link" href="#"><i class="fas fa-gear"></i><span>تنظیمات</span></a>
            </nav>
            <div class="section-title mt-3">حساب کاربری</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 text-start btn btn-link p-0"><i class="fas fa-right-from-bracket"></i><span class="ms-2">خروج</span></button>
            </form>
        </div>
    </aside>

    <main class="content">
        <div class="topbar">
            <div class="d-flex align-items-center gap-2">
                <button id="toggleSidebar" class="btn btn-sm btn-outline-secondary d-lg-none"><i class="fas fa-bars"></i></button>
                <div>
                    <div class="fw-bold">سلام {{ auth()->user()->first_name }} عزیز 👋</div>
                    <div class="text-muted small">به داشبورد بیزتو خوش آمدید</div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                @if(auth()->user()->subscription_type === 'free')
                    <a href="tel:+989137640338" class="btn btn-warning btn-sm text-dark fw-bold"><i class="fas fa-crown ms-1"></i>ارتقای اشتراک</a>
                @endif
                <span class="badge badge-soft">{{ $userType ?? 'کاربر' }}</span>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-6 col-lg-3">
                <div class="kpi">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">اعتبار پیامکی</div>
                            <div class="h4 mb-0">{{ $smsCredits ?? '—' }}</div>
                        </div>
                        <div class="icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-sms"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="kpi">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">کمپین‌های فعال</div>
                            <div class="h4 mb-0">{{ $activeCampaigns ?? '—' }}</div>
                        </div>
                        <div class="icon bg-success bg-opacity-10 text-success"><i class="fas fa-bullhorn"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="kpi">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">پست‌های زمان‌بندی‌شده</div>
                            <div class="h4 mb-0">{{ $scheduledPosts ?? '—' }}</div>
                        </div>
                        <div class="icon bg-danger bg-opacity-10 text-danger"><i class="fab fa-instagram"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="kpi">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">تعداد مشتریان</div>
                            <div class="h4 mb-0">{{ $customersCount ?? '—' }}</div>
                        </div>
                        <div class="icon bg-info bg-opacity-10 text-info"><i class="fas fa-users"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-lg-8">
                <div class="cardx h-100">
                    <div class="cardx-header">عملکرد پیامکی (۳۰ روز اخیر)</div>
                    <div class="cardx-body">
                        <div class="ratio ratio-21x9 bg-light rounded d-flex align-items-center justify-content-center text-muted">
                            <div><i class="fas fa-chart-line ms-2"></i> نمودار در حال توسعه...</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cardx h-100">
                    <div class="cardx-header">تولدهای نزدیک</div>
                    <div class="cardx-body">
                        @forelse(($upcomingBirthdays ?? []) as $item)
                            <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center" style="width:36px;height:36px"><i class="fas fa-user"></i></div>
                                    <div class="me-2">
                                        <div class="fw-bold">{{ $item['name'] }}</div>
                                        <div class="text-muted small">{{ $item['date'] }}</div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-sm btn-glass">ارسال تبریک</a>
                            </div>
                        @empty
                            <div class="text-muted">رویدادی یافت نشد.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-lg-4">
                <div class="cardx h-100">
                    <div class="cardx-header">اقدامات سریع</div>
                    <div class="cardx-body">
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary"><i class="fas fa-plus ms-1"></i>ساخت کمپین پیامکی جدید</a>
                            <a href="#" class="btn btn-outline-primary"><i class="fab fa-instagram ms-1"></i>افزودن پست زمان‌بندی‌شده</a>
                            <a href="#" class="btn btn-outline-secondary"><i class="fas fa-user-plus ms-1"></i>افزودن مشتری جدید</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="cardx h-100">
                    <div class="cardx-header">فعالیت‌های اخیر</div>
                    <div class="cardx-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>نوع</th>
                                        <th>شرح</th>
                                        <th>تاریخ</th>
                                        <th class="text-center">وضعیت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(($recentActivities ?? []) as $activity)
                                        <tr>
                                            <td>
                                                @if(($activity['type'] ?? '') === 'sms')
                                                    <span class="badge bg-primary">SMS</span>
                                                @elseif(($activity['type'] ?? '') === 'instagram')
                                                    <span class="badge bg-danger">Instagram</span>
                                                @else
                                                    <span class="badge bg-secondary">Other</span>
                                                @endif
                                            </td>
                                            <td>{{ $activity['title'] ?? '-' }}</td>
                                            <td>{{ $activity['date'] ?? '-' }}</td>
                                            <td class="text-center">
                                                @php($status = $activity['status'] ?? 'pending')
                                                <span class="badge {{ $status === 'success' ? 'bg-success' : ($status === 'failed' ? 'bg-danger' : 'bg-warning text-dark') }}">{{ $status }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-muted text-center py-4">موردی ثبت نشده است.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->user()->subscription_type === 'free')
            <div class="alert alert-info d-flex align-items-center justify-content-between">
                <div>برای دسترسی به همه قابلیت‌ها، اشتراک خود را به پلن سالانه ارتقا دهید.</div>
                <a href="tel:+989137640338" class="btn btn-sm btn-warning text-dark fw-bold">ارتقای اشتراک</a>
            </div>
        @endif
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
