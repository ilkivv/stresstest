<?php

$cookieExpireTime = time() + 3600; // 1 year

// Predefines
require $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

// Actions
//unset($_COOKIE['host']);
if (!isset($_REQUEST["url"]) && (isset($_COOKIE['host']) && $_COOKIE['host'])) {
    $_REQUEST["url"] = $_COOKIE['host'];
}

$cleared = false;/*
if ($_POST['url']) {
    $ch = curl_init($_POST['url']);
    
    // Запускаем
    curl_exec($ch);
    
    // Проверяем наличие ошибок
    if (!curl_errno($ch)) {
        $info = curl_getinfo($ch);
        
        print_r($info);
        die();
}*/
//var_dump($_REQUEST["url"]);die;
if (isset($_REQUEST["url"]) && trim($_REQUEST["url"]) != '') {
    $parsed = parse_url(toScheme($_REQUEST["url"]));

    if (isset($_COOKIE['host']) && $_COOKIE['host'] != $parsed['host']) {
        setcookie("host", "", -1);
        setcookie("login", "", -1);
        setcookie("password", "", -1);
        $cleared = true;
    }

    $url = toScheme($_REQUEST["url"]);

    setcookie('host', $parsed['host'], $cookieExpireTime, '/');

    if (isset($_REQUEST['path']) && $_REQUEST['path']) {
        $url = rtrim($url, '/') . DIRECTORY_SEPARATOR . $_REQUEST['path'];
    }

    if (is_url($url)) {
        $login = ifSet($_REQUEST['login']) ?: ifSet($_COOKIE['login']);
        $password = ifSet($_REQUEST['password']) ?: ifSet($_COOKIE['password']);
        $auth = base64_encode($login . ":" . $password);

        if ($cleared) {
            $login = $password = '';
        }

        $parse = parse_url($url);
        $host = $parse['host'];
        $path = $parse['path'];

        if ($_REQUEST['login'] && $_REQUEST['password']) {
            setcookie('login', $_REQUEST['login'], $cookieExpireTime, "/");
            setcookie('password', $_REQUEST['password'], $cookieExpireTime, "/");

            $context = stream_context_create([
                "http" => [
                    "header" => "Authorization: Basic $auth"
                ]
            ]);
            $html = @file_get_contents($url, false, $context);
        } else {
            $context = stream_context_create([
                "http" => [
                    "header" => "Authorization: Basic $auth"
                ]
            ]);

            $html = @file_get_contents($url, false, $context);
        }
        //var_dump($http_response_header);

        if (!$html && !stristr($http_response_header[0], "401")) {
            setcookie("host", "", -1);
            setcookie("login", "", -1);
            setcookie("password", "", -1);
            header("location: /?");
        }
        if (stristr($http_response_header[0], "401")) {
            setcookie("host", "", -1);
            setcookie("login", "", -1);
            setcookie("password", "", -1);
            $html = defaultPage('default',$http_response_header[0]);
        
            $html = addForm($html, $url);
            echo $html;
            die();
        }
        
        // $html = str_replace($host, $_SERVER['HTTP_HOST'], $html);
        $html = replace_links($html);

        if ($html && getMimeType($html, 'str') == 'text/html') {

            $html = str_replace("</html>", "", $html);

            $html .= (form_html($url, $login, $password) . $form_style);

//            $html = preg_replace_callback(
//                '/(<\/head>)/i',
//                function ($matches) {
//                    global $url;
//                    return $matches[1] . "\n" . form_html($url);
//                },
//                $html
//            );
//
//            $html = preg_replace_callback(
//                '/(<\/head>)/i',
//                function ($matches) {
//                    global $form_style;
//                    return $form_style . "\n" . $matches[1];
//                },
//                $html
//            );

            $textAsReplaceParts = explode('. ', $textForReplace);

            $textAsReplaceShortParts = explode('. ', $textForReplaceShort);

            $html = preg_replace_callback(
                '@([^title|script|style|\!]*>)([a-z0-9а-яA-ZА-Я]+.*?)(<){1}@i',
                function ($matches) {
// 				echo $matches[2] . "\n";
                    global $textAsReplaceParts, $textAsReplaceShortParts;
                    if (strlen($matches[2]) > 20) {
                        return $matches[1] . $textAsReplaceParts[rand(0, count($textAsReplaceParts))] . $matches[3];
                    } else {
                        return $matches[1] . $textAsReplaceShortParts[rand(0, count($textAsReplaceShortParts))] . $matches[3];
                    }
                },
                $html
            );

            $html = replaceURLs($html, $host, $path);
        } elseif ($html) {
            header('Content-Type: ' . getMimeType($html, 'str'));
            echo $html;
            exit;
        }

// 		$html = replaceCSSLinksWithStyle($html, $host, $path);

    } else {

        $html = defaultPage('error');

        $url = "";

        $html = addForm($html, $url);

    }
} else {

    $url = "";

    $html = defaultPage('default');

    $html = addForm($html, $url);
}

echo $html;