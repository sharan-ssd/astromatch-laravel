<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SuggestController; 
use Illuminate\Support\Facades\Artisan;

Route::get('/run-queue', function () {
    Artisan::call('queue:work', [
        '--tries' => 3,
        '--once' => true,
    ]);

    return response()->json([
        'status' => 'Queue worker executed once',
        'output' => Artisan::output(),
    ]);
});


Route::get('locale/{locale}', function ($lang) {
    $available = config('app.available_locales', ['en']);
    if (in_array($lang, $available)) {
        session(['locale' => $lang]);
        session()->save();
    }
    return back();
})->name('locale');



Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/user/action', [UserController::class, 'handleRequest']);

Route::match(['get', 'post'], '/', [HomeController::class, 'index']);

//Route::match(['POST', 'GET'], '/submit-horoscope', [HomeController::class, 'submitHoroscope']);

Route::post('/submit-horoscope', [HomeController::class, 'submitHoroscope']);
Route::get('/process-horoscope', [HomeController::class, 'processHoroscope']);
Route::get('/payfor-horoscope', [HomeController::class, 'planlisting']);

Route::post('/payment/create-order', [PaymentController::class, 'createOrder']);
Route::post('/payment/capture-payment', [PaymentController::class, 'capturePayment']);
Route::post('/api/validate-coupon', [PaymentController::class, 'validateCoupon']);


Route::get('/plan_details', function () {
    return view('frontend.plans.plan_listing');
});

Route::get('/marriagereport-loader', function () {
    if (!session()->has('cachedHoroscope')) {
        return redirect('/');
    }
    return view('frontend.reports.report_loader');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/newhoroscope', [DashboardController::class, 'newhoroscope']);

Route::get('/faq', function () {
    return view('/frontend.faq.faq');
});


Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/edit-profile', [HomeController::class, 'editprofile']);
Route::get('/horoscopelist', [HomeController::class, 'horoscopelist']);

Route::get('/faq', function () {
    return view('/frontend.faq.faq');
});

Route::get('/marriagereport', [ReportsController::class, 'basicReport']);
Route::get('/report/basic_report', [ReportsController::class, 'basicReport_poll']);
Route::get('/premimum/intent', [ReportsController::class, 'premimum_report_intent']);

Route::get('/marriagereportcomplete', [ReportsController::class, 'completeReport']);
Route::get('/view/basicReportPDF', [ReportsController::class, 'basicReportPDF']);
Route::get('/view/premimumReportPDF', [ReportsController::class, 'premimumReportPDF']);

// apis
Route::get('/api/suggest', [SuggestController::class, 'suggest']);


Route::get('/new-tamil', function () {
    $filePath = public_path('sample-reports/Tamil-New Alliance Match Making Report.pdf');

    if (!file_exists($filePath)) {
        abort(404, 'Report not found.');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="Tamil-New Alliance Match Making Report.pdf"',
    ]);
});

Route::get('/new-english', function () {
    $filePath = public_path('sample-reports/New Alliance Match Making Report.pdf');

    if (!file_exists($filePath)) {
        abort(404, 'Report not found.');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="New Alliance Match Making Report.pdf"',
    ]);
});

Route::get('/new-hindi', function () {
    $filePath = public_path('sample-reports/Hindi-New Alliance Match Making Report.pdf');

    if (!file_exists($filePath)) {
        abort(404, 'Report not found.');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="Hindi-New Alliance Match Making Report.pdf"',
    ]);
});

Route::get('/new-telugu', function () {
    $filePath = public_path('sample-reports/Telugu-New Alliance Match Making Report.pdf');

    if (!file_exists($filePath)) {
        abort(404, 'Report not found.');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="Telugu-New Alliance Match Making Report.pdf"',
    ]);
});

Route::get('/new-kannada', function () {
    $filePath = public_path('sample-reports/Kannada-New Alliance Match Making Report.pdf');

    if (!file_exists($filePath)) {
        abort(404, 'Report not found.');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="Kannada-New Alliance Match Making Report.pdf"',
    ]);
});

Route::get('/new-malayalam', function () {
    $filePath = public_path('sample-reports/Malayalam-New Alliance Match Making Report.pdf');

    if (!file_exists($filePath)) {
        abort(404, 'Report not found.');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="Malayalam-New Alliance Match Making Report.pdf"',
    ]);
});