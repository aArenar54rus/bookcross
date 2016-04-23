<?php namespace App\Http\Middleware;

use Closure;


class Locale{

    public function handle($request, Closure $next)
    {
        $raw_locale = get('locale');     # ���� ������������ ��� ��� �� ����� �����,
        # �� � ������ ����� �������� ���������� �� �����.

        if (in_array($raw_locale, Config::get('app.locales'))) {  # ���������, ��� � ������������ � ������ ���������� ��������� ����
            $locale = $raw_locale;                                # (� �� �����-������ ����)
        }                                                         # � ����������� �������� ���������� $locale.
        else $locale = Config::get('app.locale');                 # � ���� ������ ����������� �� ���� �� ���������

        App::setLocale($locale);                                  # ������������� ������ ����������

        return $next($request);                                   # � ��������� ���������� �������� ������
    }

}