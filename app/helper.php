<?php

use Morilog\Jalali\Jalalian;

function redirect($page, $session = [])
{
    $_SESSION[key($session)] = $session[key($session)];
    header("Location:" . URL_ROOT . $page);
    exit;
}
function translatePointType($type)
{
    return match ($type) {
        'birthday_bonus' => 'هدیه تولد',
        default => $type,
    };
}

function translateUserRole($role)
{
    return match ($role) {
        'user' => 'کاربر عادی',
        'admin' => 'مدیر',
        default => $role,
    };
}
function toShamsi($dateTime, $format = 'Y/m/d')
{
    if (empty($dateTime)) {
        return '-';
    }
    return Jalalian::forge($dateTime)->format($format);
}

function getSidebarClasses($itemPath)
{
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $rootPath = defined('URL_ROOT') ? parse_url(URL_ROOT, PHP_URL_PATH) : '/';
    $relativePath = str_replace($rootPath, '', $currentUri);
    $relativePath = trim($relativePath, '/');
    $itemPath = trim($itemPath, '/');
    if ($relativePath === $itemPath) {
        return [
            'a' => 'bg-coral-50 text-ink border border-coral-100 font-medium',
            'span' => 'bg-coral-400'
        ];
    }
    return [
        'a' => 'hover:bg-bg text-muted hover:text-ink transition border border-transparent',
        'span' => 'bg-border'
    ];
}

function timeAgo($datetime)
{
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    // استخراج مقادیر در متغیرهای مجزا برای جلوگیری از خطای PHP 8.2
    $y = $diff->y;
    $m = $diff->m;
    $d = $diff->d;
    $h = $diff->h;
    $i = $diff->i;
    $s = $diff->s;

    // محاسبه هفته
    $w = floor($d / 7);
    $d -= $w * 7;

    $string = [
        'سال' => $y,
        'ماه' => $m,
        'هفته' => $w,
        'روز' => $d,
        'ساعت' => $h,
        'دقیقه' => $i,
        'ثانیه' => $s,
    ];

    $resultStr = '';
    foreach ($string as $text => $value) {
        if ($value > 0) {
            $resultStr = $value . ' ' . $text;
            break; // فقط بزرگترین واحد زمانی را می‌گیریم
        }
    }

    if (!$resultStr) {
        return 'همین الان';
    }

    $resultStr .= ' پیش';

    // تبدیل اعداد انگلیسی به فارسی
    $persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($englishDigits, $persianDigits, $resultStr);
}

function getSidebarStatus($itemPath)
{
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $rootPath = defined('URL_ROOT') ? parse_url(URL_ROOT, PHP_URL_PATH) : '/';
    $relativePath = trim(str_replace($rootPath, '', $currentUri), '/');
    $itemPath = trim($itemPath, '/');

    // منطق جدید برای تشخیص Active
    if ($itemPath === 'admin-panel') {
        // برای داشبورد: فقط اگر مسیر دقیقاً برابر admin-panel بود
        $isActive = ($relativePath === $itemPath);
    } else {
        // برای بقیه: اگر مسیر دقیقاً برابر بود یا با آن شروع می‌شد (برای زیرمنوها)
        $isActive = ($relativePath === $itemPath) || ($itemPath !== '' && strpos($relativePath, $itemPath) === 0);
    }

    if ($isActive) {
        return [
            'btn' => 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral',
            'icon' => 'text-white',
            'isActive' => true
        ];
    }

    return [
        'btn' => 'text-muted hover:bg-indigo-50 hover:text-indigo-600',
        'icon' => 'text-muted group-hover:text-indigo-500',
        'isActive' => false
    ];
}
