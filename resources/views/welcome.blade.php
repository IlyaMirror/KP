<!DOCTYPE html>
<html>
<head>
    <title>Моя страница Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .button {
            display: block; 
            padding: 10px 20px;
            margin: 10px 0;
            color: #fff;
            background-color: #FF0000; 
            text-decoration: none;
            border-radius: 5px;
            text-align: center; 
        }
        .info {
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #FF0000;
            border-radius: 5px;
        }
        input {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать на мою страницу Laravel!</h1>

        <input id="key" type="text" placeholder="Введите ключ">
        <a href="#" onclick="storeSessionData()" class="button">Сохранить данные сессии</a>
        <a href="#" onclick="getSessionData()" class="button">Получить данные сессии</a>
        <a href="#" onclick="deleteSessionData()" class="button">Удалить данные сессии</a>
        <a href="#" onclick="storeCookieData()" class="button">Сохранить данные куки</a>
        <a href="#" onclick="getCookieData()" class="button">Получить данные куки</a>
        <a href="#" onclick="deleteCookieData()" class="button">Удалить данные куки</a>
        <a href="/get-all-cookies" class="button">Получить все куки</a>
    </div>
    <script>
        function storeSessionData() {
            var key = document.getElementById('key').value;
            window.location.href = '/store-session-data/' + key;
        }
        function getSessionData() {
            var key = document.getElementById('key').value;
            window.location.href = '/get-session-data/' + key;
        }
        function deleteSessionData() {
            var key = document.getElementById('key').value;
            window.location.href = '/delete-session-data/' + key;
        }
        function storeCookieData() {
            var name = document.getElementById('key').value;
            window.location.href = '/store-cookie-data/' + name;
        }
        function getCookieData() {
            var name = document.getElementById('key').value;
            window.location.href = '/get-cookie-data/' + name;
        }
        function deleteCookieData() {
            var name = document.getElementById('key').value;
            window.location.href = '/delete-cookie-data/' + name;
        }
    </script>
</body>
</html>
