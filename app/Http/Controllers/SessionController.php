<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    // Метод для сохранения данных в сессии
    public function storeSessionData(Request $request, $key)
    {
        $request->session()->put($key, 'value'); // Записываем значение в сессию
        return response('Data has been added to session: ' . $key . ' = value'); // Возвращаем ответ о добавлении данных в сессию
    }

    // Метод для получения данных из сессии
    public function getSessionData(Request $request, $key)
    {
        $value = $request->session()->get($key, 'No data found for this key'); // Получаем значение из сессии
        return response('Session data: ' . $key . ' = ' . $value); // Возвращаем ответ с данными из сессии
    }

    // Метод для удаления данных из сессии
    public function deleteSessionData(Request $request, $key)
    {
        $value = $request->session()->get($key, 'No data found for this key'); // Получаем значение из сессии
        $request->session()->forget($key); // Удаляем данные из сессии
        return response('Data has been removed from session: ' . $key . ' = ' . $value); // Возвращаем ответ об удалении данных из сессии
    }

    // Метод для сохранения данных в куки
    public function storeCookieData(Request $request, $key)
    {
        $minutes = 60; // Время жизни куки в минутах
        $response = new Response('Hello World'); // Создаем новый ответ
        $response->withCookie(cookie($key, 'value', $minutes)); // Устанавливаем куки
        return $response->setContent('Cookie has been set: ' . $key . ' = value'); // Возвращаем ответ о установке куки
    }

   // Метод для получения данных из куки
public function getCookieData(Request $request, $key)
{
    // Проверяем существование куки с заданным именем
    if ($request->hasCookie($key)) {
        // Если куки существует, получаем его значение
        $value = $request->cookie($key);
        // Формируем строку ответа с именем куки и его значением
        $response = 'Cookie name: ' . $key . ', Value: ' . $value;
    } else {
        // Если куки с заданным именем не существует, формируем строку ответа об этом
        $response = 'Cookie with name ' . $key . ' not found';
    }
    return response($response); // Возвращаем ответ с данными из куки или сообщением о его отсутствии
}

// Метод для удаления куки
public function deleteCookieData(Request $request, $key)
{
    // Проверяем существование куки с заданным именем
    if ($request->hasCookie($key)) {
        // Удаляем куки
        Cookie::forget($key);
        // Устанавливаем куки в ответе как пустое значение с истекшим сроком действия
        $response = response('Cookie with name ' . $key . ' has been deleted')->withCookie(cookie()->forget($key));
    } else {
        // Если куки с заданным именем не существует, формируем строку ответа об этом
        $response = response('Cookie with name ' . $key . ' not found');
    }
    return $response; // Возвращаем ответ с сообщением о удалении или сообщением о его отсутствии
}




    // Метод для получения всех куки
    public function getAllCookies()
    {
        $cookies = $_COOKIE; // Получаем все куки из глобальной переменной
        $output = 'All cookies:<br>'; // Создаем строку для вывода всех куки
        foreach ($cookies as $key => $value) {
            $output .= 'Name: ' . $key . ', Value: ' . $value . '<br>'; // Формируем строку для каждого куки
        }
        return response($output); // Возвращаем ответ со всеми куки
    }
}
