<?php namespace App\Http\Middleware;

use Closure;


class Locale{

    public function handle($request, Closure $next)
    {
        $raw_locale = get('locale');     # Если пользователь уже был на нашем сайте,
        # то в сессии будет значение выбранного им языка.

        if (in_array($raw_locale, Config::get('app.locales'))) {  # Проверяем, что у пользователя в сессии установлен доступный язык
            $locale = $raw_locale;                                # (а не какая-нибудь бяка)
        }                                                         # И присваиваем значение переменной $locale.
        else $locale = Config::get('app.locale');                 # В ином случае присваиваем ей язык по умолчанию

        App::setLocale($locale);                                  # Устанавливаем локаль приложения

        return $next($request);                                   # И позволяем приложению работать дальше
    }

}