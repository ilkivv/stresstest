<?php

function defaultPage($code,$error='', $url = '')
{

    $content = "<!DOCTYPE html>
<html lang=\"ru\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"views/css/styles.css\">
    <title>Index</title>
</head>

<body>


    <div class=\"stress-page\">
        <main class=\"main\">
            <div class=\"wrap\">
                <div id=\"stress-test-header\">
                    <h1 class=\"stress__title\">
                        Stress Test
                    </h1>
                   

	";

    if ($error) {
        $content .= "<div id='stresstest-default' style='color:red;'>".$error."</div>";
    } else {
        if ($code = 'error') {
            $content .= "<div class=\"stress__text\">
                        <p>Check your HTML mockups with random texts and different length</p>
                    </div>";
        } else {
            $content .= "<div id='stresstest-default'>wrong url</div>";
        }
        
    }


    //$content  .= form_html($url);

    $content .= "

	<div class=\"stress__captions\">
                        <p>
                            For any questions please write at <a href=\"mailto:hello@flyphant.com\">hello@flyphant.com</a>.
                        </p>
                        <p>
                            And, of course, it is public beta, so please be patient to any bugs :-D
                        </p>
                    </div>
                </div>
            </div>

        </main>
    </div>

	";

    return $content;

}

$textForReplace = "Вечер Анны Павловны был пущен. Веретена с разных сторон равномерно и не умолкая шумели. Кроме ma tante, около которой сидела только одна пожилая дама с исплаканным, худым лицом, несколько чужая в этом блестящем обществе, общество разбилось на три кружка. В одном, более мужском, центром был аббат; в другом, молодом, красавица-княжна Элен, дочь князя Василия, и хорошенькая, румяная, слишком полная по своей молодости, маленькая княгиня Болконская. В третьем Мортемар и Анна Павловна. Виконт был миловидный, с мягкими чертами и приемами, молодой человек, очевидно считавший себя знаменитостью, но, по благовоспитанности, скромно предоставлявший пользоваться собой тому обществу, в котором он находился. Анна Павловна, очевидно, угощала им своих гостей. Как хороший метрд`отель подает как нечто сверхъестественно-прекрасное тот кусок говядины, который есть не захочется, если увидать его в грязной кухне, так в нынешний вечер Анна Павловна сервировала своим гостям сначала виконта, потом аббата, как что-то сверхъестественно утонченное. В кружке Мортемара заговорили тотчас об убиении герцога Энгиенского. Виконт сказал, что герцог Энгиенский погиб от своего великодушия, и что были особенные причины озлобления Бонапарта. — Ah! voyons. Contez-nous cela, vicomte,  — сказала Анна Павловна, с радостью чувствуя, как чем-то à la Louis XV  отзывалась эта фраза, — contez-nous cela, vicomte. Виконт поклонился в знак покорности и учтиво улыбнулся. Анна Павловна сделала круг около виконта и пригласила всех слушать его рассказ. — Le vicomte a été personnellement connu de monseigneur,  — шепнула Анна Павловна одному. — Le vicomte est un parfait conteur,  — проговорила она другому. — Comme on voit l'homme de la bonne compagnie,  — сказала она третьему; и виконт был подан обществу в самом изящном и выгодном для него свете, как ростбиф на горячем блюде, посыпанный зеленью. Виконт хотел уже начать свой рассказ и тонко улыбнулся. — Переходите сюда, chère Hélène,  — сказала Анна Павловна красавице-княжне, которая сидела поодаль, составляя центр другого кружка. Княжна Элен улыбалась; она поднялась с тою же неизменяющеюся улыбкой вполне красивой женщины, с которою она вошла в гостиную. Слегка шумя своею белою бальною робой, убранною плющем и мохом, и блестя белизною плеч, глянцем волос и брильянтов, она прошла между расступившимися мужчинами и прямо, не глядя ни на кого, но всем улыбаясь и как бы любезно предоставляя каждому право любоваться красотою своего стана, полных плеч, очень открытой, по тогдашней моде, груди и спины, и как будто внося с собою блеск бала, подошла к Анне Павловне. Элен была так хороша, что не только не было в ней заметно и тени кокетства, но, напротив, ей как будто совестно было за свою несомненную и слишком сильно и победительно-действующую красоту. Она как будто желала и не могла умалить действие своей красоты. Quelle belle personne!  говорил каждый, кто ее видел. Как будто пораженный чем-то необычайным, виконт пожал плечами и о опустил глаза в то время, как она усаживалась перед ним и освещала и его всё тою же неизменною улыбкой. — Madame, je crains pour mes moyens devant un pareil auditoire,  сказал он, наклоняя с улыбкой голову. Княжна облокотила свою открытую полную руку на столик и не нашла нужным что-либо сказать. Она улыбаясь ждала. Во все время рассказа она сидела прямо, посматривая изредка то на свою полную красивую руку, которая от давления на стол изменила свою форму, то на еще более красивую грудь, на которой она поправляла брильянтовое ожерелье; поправляла несколько раз складки своего платья и, когда рассказ производил впечатление, оглядывалась на Анну Павловну и тотчас же принимала то самое выражение, которое было на лице фрейлины, и потом опять успокоивалась в сияющей улыбке. Вслед за Элен перешла и маленькая княгиня от чайного стола. — Attendez moi, je vais prendre mon ouvrage, — проговорила она. — Voyons, à quoi pensez-vous? — обратилась она к князю Ипполиту: — apportez-moi mon ridicule. Княгиня, улыбаясь и говоря со всеми, вдруг произвела перестановку и, усевшись, весело оправилась. — Теперь мне хорошо, — приговаривала она и, попросив начинать, принялась за работу. Князь Ипполит перенес ей ридикюль, перешел за нею и, близко придвинув к ней кресло, сел подле нее. Le charmant Hippolyte  поражал своим необыкновенным сходством с сестрою-красавицей и еще более тем, что, несмотря на сходство, он был поразительно дурен собой. Черты его лица были те же, как и у сестры, но у той все освещалось жизнерадостною, самодовольною, молодою, неизменною улыбкой жизни и необычайною, античною красотой тела; у брата, напротив, то же лицо было отуманено идиотизмом и неизменно выражало самоуверенную брюзгливость, а тело было худощаво и слабо. Глаза, нос, рот — все сжималось как будто в одну неопределенную и скучную гримасу, а руки и ноги всегда принимали неестественное положение. — Ce n'est pas une histoire de revenants?  — сказал он, усевшись подле княгини и торопливо пристроив к глазам свой лорнет, как будто без этого инструмента он не мог начать говорить. — Mais non, mon cher,  — пожимая плечами, сказал удивленный рассказчик. — C'est que je déteste les histoires de revenants,  — сказал он таким тоном, что видно было, — он сказал эти слова, а потом уже понял, что они значили. Из-за самоуверенности, с которой он говорил, никто не мог понять, очень ли умно или очень глупо то, что он сказал. Он был в темнозеленом фраке, в панталонах цвета cuisse de nymphe effrayée,  как он сам говорил, в чулках и башмаках. Vicomte  рассказал очень мило о том ходившем тогда анекдоте, что герцог Энгиенский тайно ездил в Париж для свидания с m-lle George,  и что там он встретился с Бонапарте, пользовавшимся тоже милостями знаменитой актрисы, и что там, встретившись с герцогом, Наполеон случайно упал в тот обморок, которому он был подвержен, и находился во власти герцога, которой герцог не воспользовался, но что Бонапарте впоследствии за это-то великодушие и отмстил смертью герцогу. Рассказ был очень мил и интересен, особенно в том месте, где соперники вдруг узнают друг друга, и дамы, казалось, были в волнении. — Charmant,  — сказала Анна Павловна, оглядываясь вопросительно на маленькую княгиню. — Charmant, — прошептала маленькая княгиня, втыкая иголку в работу, как будто в знак того, что интерес и прелесть рассказа мешают ей продолжать работу. Виконт оценил эту молчаливую похвалу и, благодарно улыбнувшись, стал продолжать; но в это время Анна Павловна, все поглядывавшая на страшного для нее молодого человека, заметила, что он что-то слишком горячо и громко говорит с аббатом, и поспешила на помощь к опасному месту. Действительно, Пьеру удалось завязать с аббатом разговор о политическом равновесии, и аббат, видимо заинтересованный простодушной горячностью молодого человека, развивал перед ним свою любимую идею. Оба слишком оживленно и естественно слушали и говорили, и это-то не понравилось Анне Павловне. — Средство — Европейское равновесие и droit des gens,  — говорил аббат. — Стоит одному могущественному государству, как Россия, прославленному за варварство, стать бескорыстно во главе союза, имеющего целью равновесие Европы, — и она спасет мир!— Как же вы найдете такое равновесие? — начал было Пьер; но в это время подошла Анна Павловна и, строго взглянув на Пьера, спросила итальянца о том, как он переносит здешний климат. Лицо итальянца вдруг изменилось и приняло оскорбительно притворно-сладкое выражение, которое, видимо, было привычно ему в разговоре с женщинами. — Я так очарован прелестями ума и образования общества, в особенности женского, в которое я имел счастье быть принят, что не успел еще подумать о климате, — сказал он. Не выпуская уже аббата и Пьера, Анна Павловна для удобства наблюдения присоединила их к общему кружку.";

$textForReplaceShort = "Один доллар. Восемьдесят семь центов. Это было все. Из них шестьдесят центов. Монетками по одному центу. За каждую из этих монеток. Пришлось торговаться. С бакалейщиком. Зеленщиком. Мясником. Делла пересчитала три раза. Один доллар. Восемьдесят семь центов. А завтра рождество. Единственное. Что тут можно было сделать. Хлопнуться на старенькую кушетку. И зареветь. Именно так Делла и поступила. Откуда напрашивается философский вывод. Жизнь состоит из слез. Вздохов и улыбок. Причем вздохи преобладают.";

$url = $login = $password = '';

$default_url = 'http://sashatikhonov.com/en/';

$form_style = "
<link rel=\"stylesheet\" href=\"/views/css/styles.css\">
<script src=\"/views/js/bundle.js\"></script>
";

function form_html($url, $login = '', $password = '')
{
    $login = $login ?: ifSet($_COOKIE['login']);
    $password = $password ?: ifSet($_COOKIE['password']);


    return "
                    <form action=\"/\" class=\"stress-form\">
                        <div class=\"stress-form__switch\">
                            My page is
                            <div class=\"stress-form__formgroup stress-form__formgroup--inline\">
                                <input id=\"public\" name=\"page status\" type=\"radio\" class=\"stress-form__switch-input\" value=\"public\" checked>
                                <label for=\"public\" class=\"stress-form__switch-label\">public</label>
                            </div>
                            <div class=\"stress-form__formgroup stress-form__formgroup--inline\">
                                <input id=\"htaccess\" name=\"page status\" type=\"radio\" class=\"stress-form__switch-input\" value=\"public\">
                                <label for=\"htaccess\" class=\"stress-form__switch-label\"><span class=\"no-mobile\">behind </span>.htaccess<span class=\"no-mobile\"> authorisation</span>
                                </label>
                            </div>
                        </div>
                        <div class=\"stress-form__url\">
                            <input name='url' value='" . $url . "' type=\"text\" class=\"stress-form__input stress-form__input--url\" placeholder=\"URL\">
                            <!-- ._hidden -->
                            <div class=\"stress-form__htaccess\">
                                <input name='login' value='" . $login . "' type=\"text\" class=\"stress-form__input stress-form__input--login\" placeholder=\"Login\">
                                <input name='password' value='" . $password . "' type=\"text\" class=\"stress-form__input stress-form__input--password\" placeholder=\"Password\">
                            </div>
                            <input type='submit' value='Test' hidden>
                        </div>
                    </form>
	";

}

function form_html_result($url, $login = '', $password = '')
{
    $login = $login ?: ifSet($_COOKIE['login']);
    $password = $password ?: ifSet($_COOKIE['password']);


    return "
<div id=\"stress-test-panel\" class=\"stress-process\">
        <form class=\"stress-process__form\" method='post' action='/'>
            <input name='url' type=\"text\" class=\"stress-process__input\" value='" . $url . "'>
            <input name='home' type='submit' class=\"stress-process__reset\">
        </form>
    </div>
	
	";

}


// Functions

function replaceURLs($html, $host, $path)
{


    $html = preg_replace_callback(
        '@(((href|src)=("|\'))([^"]+\.(png|jpg|gif|js|js\?[\w\d\=\$]+|svg|ico|css|css\?[\w\d]+))("|\'))@',
        function ($matches) {
            global $host, $path;
            if (substr($matches[5], 0, 1) == '/' && substr($matches[5], 1, 1) != '/') {
                $result = $matches[2] . "http://" . $host . $matches[5] . $matches[7];
            } else {
                if (substr($matches[5], 0, 3) == '../') {
                    $result = $matches[2] . "http://" . $host . $path . $matches[5] . $matches[7];
                } else {
                    if (substr($matches[5], 0, 2) == '//' || substr($matches[5], 0, 7) == 'http://' || substr($matches[5], 0, 8) == 'https://') {
                        $result = $matches[2] . $matches[5] . $matches[7];
                    } else {
                        $result = $matches[2] . "http://" . $host . "/" . $matches[5] . $matches[7];
                    }
                }
            }
            return $result;
        },
        $html
    );


    return $html;

}

function replaceLinksInCSS($html, $host, $path)
{

    $html = preg_replace_callback(
        '@((url\(["|\']*){1}(.*?)(["|\']*\)))@',
        function ($matches) {
            global $host, $path;
            if (substr($matches[3], 0, 5) == 'data:' || substr($matches[3], 0, 2) == '//') {
                $result = $matches[2] . $matches[3] . $matches[4];
            } else {
                if (substr($matches[3], 0, 2) == '..') {
                    $result = $matches[2] . "http://" . $host . substr($matches[3], 2) . $matches[4];
                } else {
                    if (substr($matches[3], 0, 1) == '/' && substr($matches[3], 1, 2) != '/') {
                        $result = $matches[2] . "http://" . $host . $path . $matches[3] . $matches[4];
                    } else {
                        if (substr($matches[3], 0, 2) == '//' || substr($matches[3], 0, 7) == 'http://' || substr($matches[3], 0, 8) == 'https://') {
                            $result = $matches[2] . $matches[3] . $matches[4];
                        } else {
                            $result = $matches[2] . "http://" . $host . "/" . $path . $matches[3] . $matches[4];
                        }
                    }
                }
            }
            return $result;
        },
        $html
    );

    return $html;

}

function replaceCSSLinksWithStyle($html, $host, $path)
{

    $html = preg_replace_callback(
        '@(<link.*?href=["|\']{1})(.*?\.css)(["|\']{1}.*?[stylesheet|canonical]{1}.*?>)@',
        function ($matches) {
            $cssUrl = $matches[2];
            if (substr($cssUrl, 0, 4) != 'http') {
                $cssUrl = 'http:' . $cssUrl;
            }
            return "<style type='text/css'>\n" . replaceLinksInCSS(file_get_contents($cssUrl)) . "\n</style>\n";
        },
        $html
    );

    $html = preg_replace_callback(
        '@(<link.*?[stylesheet|canonical]{1}.*?href=["|\']{1})(.*?\.css(.*?)*)(["|\']{1}.*?>)@',
        function ($matches) {
            $cssUrl = $matches[2];
            if (substr($cssUrl, 0, 4) != 'http') {
                $cssUrl = 'http:' . $cssUrl;
            }
            return "<style type='text/css'>\n" . replaceLinksInCSS(file_get_contents($cssUrl)) . "\n</style>\n";
        },
        $html
    );

    return $html;

}

function addForm($html, $url)
{

    $html = preg_replace_callback(
        '/(<\/h1>)/i',
        function ($matches) {
            global $url;
            return $matches[1] . "\n" . form_html($url);
        },
        $html
    );

    /*$html = preg_replace_callback(
        '/(<\/head>)/i',
        function ($matches) {
            global $form_style;
            return $form_style . "\n" . $matches[1];
        },
        $html
    );*/

    return $html;

}

function replace_links($html)
{
    $html = preg_replace_callback(
        '@(<a.*?href=["|\']{1})(.*?)(["|\']{1}.*?>)@',
        function ($matches) {
            //print_r($matches[2]);
            $newUrl = str_replace($_COOKIE['host'], $_SERVER['HTTP_HOST'], $matches[2]);
            $newUrl = str_replace('https://', 'http://', $newUrl);
            return $matches[1] . $newUrl . $matches[3];
        },
        $html
    );


    return $html;
}

function toScheme($url)
{
    $parsed = parse_url(trim($url));

    if (empty($parsed['scheme'])) {
        $url = 'http://' . ltrim($url, '/');
    }

    return $url;
}

function getMimeType($r, $t = 'file')
{
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    return ($t == 'str') ? $finfo->buffer($r) : $finfo->file($r);
}

function is_url($uri)
{
    if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $uri)) {
        return $uri;
    } else {
        return false;
    }
}

function ifSet(&$value)
{

    if (isset($value)) {
        return $value;
    }

    return null;

}