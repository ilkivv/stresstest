<?php


$cookieExpireTime = time() + 3600; // 1 year

// Predefines
require $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

if (!isset($_REQUEST['url']) && (isset($_COOKIE['host']) && $_COOKIE['host'])) {
        $_REQUEST['url'] = $_COOKIE['host'];
}

$cleared = false;

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

        if (!$html && !stristr($http_response_header[0], "401")) {
            setcookie("host", "", -1);
            setcookie("login", "", -1);
            setcookie("password", "", -1);
            $html = defaultPage('url');
            $html = addForm($html, $url);
            echo $html;
            die();
        }
        if (stristr($http_response_header[0], "401")) {
            setcookie("host", "", -1);
            setcookie("login", "", -1);
            setcookie("password", "", -1);
            $html = defaultPage('error',$http_response_header[0]);
            $html = addForm($html, $url);
            echo $html;
            die();
        }

        $html = replace_links($html);

        if ($html && getMimeType($html, 'str') == 'text/html') {

            $textAsReplaceParts = explode('. ', $textForReplace);

            $textAsReplaceShortParts = explode('. ', $textForReplaceShort);

            $html = preg_replace_callback(
                '@([^title|script|style|\!]*>)([a-z0-9а-яA-ZА-Я]+.*?)(<){1}@i',
                function ($matches) {

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
            $html = str_replace("</body>", "", $html);

            $html .= (form_html_result($url, $login, $password) . $form_style);
        } elseif ($html) {
            header('Content-Type: ' . getMimeType($html, 'str'));
            echo $html;
            exit;
        }

    } else {

        $html = defaultPage('url');

        //$url = "";

        $html = addForm($html, $url);
    }
} else {

    $url = "";

    $html = defaultPage('default');

    $html = addForm($html, $url);
}

echo $html;