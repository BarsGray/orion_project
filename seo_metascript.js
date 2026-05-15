var start = new Date();
// javascript:o=document.createElement("script");o.setAttribute("src", "https://www.vzh.ru/wp-content/uploads/metascript.js");document.body.appendChild(o);void(0)
/*javascript:(function(){var script=document.createElement('script');script.src='https://googledrive.com/host/0B8b7gi0h5HCPODZncDFQWlk3cWs/dommonster.js?'+Math.floor((+new Date)/(864e5));document.body.appendChild(script);})()*/

function include(url) {
	var script = document.createElement('script');
	script.src = url;
	script.type = 'text/javascript';
	document.getElementsByTagName('head')[0].appendChild(script);
}

// include("https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/dragdrop1.js");
// include("https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/dragdrop2.js");

var allimages = document.getElementsByTagName("img");
var clear1 = document.getElementById('min_metascript');
var clear2 = document.getElementById('metascript');
if (clear1)
	document.body.removeChild(clear1);
if (clear2)
	document.body.removeChild(clear2);




var links = document.getElementsByTagName('a');
var titles = document.getElementsByTagName('title');
var metas = document.getElementsByTagName('meta');
var h1s = document.getElementsByTagName('h1');
var h2s = document.getElementsByTagName('h2');
var h3s = document.getElementsByTagName('h3');
var h4s = document.getElementsByTagName('h4');
var h5s = document.getElementsByTagName('h5');
var h6s = document.getElementsByTagName('h6');
var bs = document.getElementsByTagName('b');
var strong = document.getElementsByTagName('strong');
var canonical = document.getElementsByTagName('link');
var noindex = document.getElementsByTagName('noindex');
var allTags = document.body.getElementsByTagName('*');


var loc = location.href;
var buf;
var ch1 = 0;
var ch2 = 0;
var ch3 = 0;
var ch4 = 0;
var ch5 = 0;
var ch6 = 0;
var t;

var cb = 0;
var cstrong = 0;
var ci = 0;
var cem = 0;
var col = 0;
var cul = 0;
var ctable = 0;
var nope = "";
var tagb = document.getElementsByTagName('b');
var tagstrong = document.getElementsByTagName('strong');
var tagi = document.getElementsByTagName('i');
var tagem = document.getElementsByTagName('em');
var tagol = document.getElementsByTagName('ol');
var tagul = document.getElementsByTagName('ul');
var tagtable = document.getElementsByTagName('table');
for (var i = 0; i < tagb.length; i++) {
	cb++;
}
for (var i = 0; i < tagstrong.length; i++) {
	cstrong++;
}
for (var i = 0; i < tagi.length; i++) {
	ci++;
}
for (var i = 0; i < tagem.length; i++) {
	cem++;
}
for (var i = 0; i < tagol.length; i++) {
	col++;
}
for (var i = 0; i < tagul.length; i++) {
	cul++;
}
for (var i = 0; i < tagtable.length; i++) {
	ctable++;
}



/*Функция скрола вверх страницы при отработке плагина*/
function up() {
	var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
	if (top > 0) {
		window.scrollBy(0, -100);
		t = setTimeout('up()', 20);
	} else clearTimeout(t);
	return nope;
}
/*Конец Функция скрола вверх страницы при отработке плагина*/



//Поиск всех картинок и проверка наличия аттрибута аlt и title

var imgc = 0;
var altc = 0;
var titlec = 0;
var arr = [];
var titlearr = [];
var widthimg = [];
var heightimg = [];
var idimg = [];

for (var i = 0; i < allimages.length; i++) {
	if (allimages[i] != null) {
		imgc++;
	}
	if ((allimages[i].getAttribute('alt') == null) || (allimages[i].getAttribute('alt') == '') || (allimages[i].getAttribute('alt') == ' ')) {
		altc++;
		arr.push(allimages[i].src);
	}
	if ((allimages[i].getAttribute('title') == null) || (allimages[i].getAttribute('title') == '') || (allimages[i].getAttribute('title') == ' ')) {
		titlec++;
		titlearr.push(allimages[i].src);
	}

}


var ua = navigator.userAgent.toLowerCase();
var isOpera = (ua.indexOf('opera') > -1);
var isIE = (!isOpera && ua.indexOf('msie') > -1);
function getDocumentHeight() {
	return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollHeight : document.documentElement.scrollHeight, getViewportHeight());
}

function getViewportHeight() {
	return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientHeight : document.body.clientHeight : (document.parentWindow || document.defaultView).innerHeight;

}
var realheight = getDocumentHeight();
var bgcolor;
var urlcar = 'https://image.freepik.com/free-vector/no-translate-detected_1319-133.jpg';
document.body.innerHTML += "<div id='min_metascript' class='draggable' style='display: none; cursor: url() 8 8, move;' ><a onclick='turn()' id='turn_min_metascript' style='cursor:pointer;' title='Развернуть MetaScript'><img src='' /></a>  MetaScript <img title='Закрыть MetaScript' onclick='clearall()' style='cursor:pointer;' src='' /></div>";
document.body.innerHTML += "<!--<link rel='shortcut icon' href=''/>--><link rel='stylesheet' href='' type='text/css' media='all' />" +
	"" + up() + "<div id='metascript' style='z-index: 999998; position: absolute;  top: 0; left: 0; width: 100%; height: " + realheight + "px; background-color: rgba(0,0,0,0.7); overflow: auto;' onclick='turn()'><div class='bor'>" +
	"<div id='h1h6' style='background-color:" + bgcolor + "; z-index: 9998; width: 900px; word-wrap: break-word; height: auto; margin: 70px 0 0 -330px; border-radius: 13px; padding: 0px; /*overflow: auto;*/ position: absolute; left: 42%; background: url(" + (bgcolor ? "" : urlcar) + ") repeat top center !important; color: black; font: 13px Arial !important; text-align: left !important;' onclick='arguments[0].stopPropagation();'>" +
	"<div id='test_metascript'style='padding: 18px; margin: 12px;overflow: none;'><div style='font-size: 14px;font-weight: bold; width: 478px;'>URL: " + loc + "</div><div id='metaclose' onclick='clearall()' style='float: right;margin-top: -29px;background:url(https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png) no-repeat;width:40px;height:40px;background-size:100% 100%;cursor:pointer;'></div><br>" +
	"</div></div></div></div>";
var container = document.getElementById('h1h6');
var test = document.getElementById('test_metascript');
test.innerHTML += "<div id='help_metascript' style='display: none;'></div>";
var helpdiv = document.getElementById('help_metascript');
helpdiv.innerHTML += "<span class='helpwrap_metascript'><span onclick='showhide()' style=' cursor: pointer; float: right; font-weight: bold;'>x</span><p><span style='font-size:14px'><strong>MetaScript</strong></span> - это скрипт предназначенный для быстрого и удобного анализа SEO-параметров на исследуемой странице<br />" +
	"Преимущество скрипта заключается в том, что он запускается прямо на странице, не создавая доп. вкладок в<br />" +
	"браузере. Скрипт предоставляется с открытым исходным кодом, поэтому, любой желающий может скачать его и внести свои&nbsp;корректировки,&nbsp;настроить внешний вид и выполнения скрипта под себя и свои нужды.</p>" +

	"<p>Примите свое участие в улучшении и поиске ошибок скрипта.<br />" +
	"Только вместе мы сможем создать удобный инструмент для ежедневной работы SEO-специалиста :)</p>" +

	"<p><span style='font-size:16px'><strong>MetaScript&#39;s HELP</strong></span><br />" +
	"<b>Скрипт умеет определять следующие параметры:</b></p>" +

	"<ol>" +
	"<li>URL страницы</li>" +
	"<li>Мета-теги:</li>" +
	"<ul style='list-style-type: square !important; margin-left: 25px !important;'>" +
	"<li>Title(кол-во симв.) | Description(кол-во симв.) | Keywords(кол-во симв.)</li>" +
	"</ul>" +
	"<li>Rel=canonical</li>" +
	"<li>Заголовки H1-H6 (Если заголовков &gt; 5, то остальные скрываются + создание таблицы всех заголовков)</li>" +
	"<li>Элементы оформления контента:" +
	"<ul style='list-style-type: square !important; margin-left: 25px !important;'>" +
	"<li>Наличие на странице мусорного кода из MS Word (по классам Mso..)</li>" +
	"<li>Наличие ссылки авторства Google+ (Наличие в ссылке plus.google.com + '?rel=author' или атрибут rel='author' или rel='publisher')</li>" +
	"<li>Количество тегов &lt;noindex&gt;</li>" +
	"<li>Кол-во таблиц &lt;table&gt;</li>" +
	"<li>Кол-во маркированных списков &lt;ul&gt;</li>" +
	"<li>Кол-во нумерованных списков &lt;ol&gt;</li>" +
	"<li>Кол-во тегов &lt;b&gt; и &lt;strong&gt;. Всего полужирных выделений</li>" +
	"<li>Кол-во тегов &lt;i&gt; и &lt;em&gt;. Всего курсивных выделений</li>" +
	"</ul>" +
	"</li>" +
	"<li>Исходящие ссылки на другие ресурсы (Если ссылок &gt; 5, то остальные скрываются + длинные ссылки обрезаются. Раскрываются по клику на ...&raquo;)</li>" +
	"<li>Кол-во изображений на странице:" +
	"<ul style='list-style-type: square !important; margin-left: 25px !important;'>" +
	"<li>Кол-во изображений без атриба alt</li>" +
	"<li>Кол-во изображений без атриба title</li>" +
	"</ul>" +
	"</li>" +
	"<li>Создание миниатюрных изображений без атрибутов alt и title, увеличение миниатюры<br />" +
	"при клике и всплывающая подсказка при наведении на миниатюру с адресом картинки.</li>" +
	"</ol>" +

	"<p><b>Выполняемые проверки на ошибки:</b></p>" +

	"<ol>" +
	"<li>Скрипт подсвечивает элемент с найденной ошибкой и добавляет всплывающую подсказу. Пример: <a class='podskazka' data-title='Найденна ошибка. Рекомендации'>Ошибка</a></li>" +
	"<li>Проверка Мета-тегов на наличие и превышение кол-ва символов." +
	"<ul style='list-style-type: square !important; margin-left: 25px !important;'>" +
	"<li>Title(&gt;70) | Description(&gt;200) | Keywords(&gt;100)</li>" +
	"</ul>" +
	"</li>" +
	"<li>Проверка наличия на странице 2 и более Rel=canonical</li>" +
	"<li>Проверка на наличие заголовков H1-H6, проверка наличия в заголовках стилей и классов, а также других тегов и</li>" +
	"<li>Проверка исходящих ссылок, если открыта и на наличие атрибута rel=&#39;nofollow&#39;</li>" +
	"</ol>" +

	"<p><br />" +
	"Если Вы нашли неисправность в работе скрипта или у Вас есть предложение, какую еще полезную информацию можно анализировать со страницы, " +
	"отправьте мне письмо с указанием анализируемой страницы и ошибки или Вашим предложением. E-mail: <strong><a style='color: #87CEEB !important;' href='mailto:3a.dmitriy@gmail.com'>3a.dmitriy@gmail.com</a></strong><br />" +
	"Буду рад взаимосотрудничествy и помощь в проекте. С Уважением, Дмитрий.</p></span>";




function monster() {
	document.getElementById('jr_results').style.display = '';

}


function showhide() {
	if (document.getElementById('help_metascript').style.display != "none") {
		document.getElementById('help_metascript').style.display = 'none';
	}
	else {
		document.getElementById('help_metascript').style.display = '';
	}
}

function clearall() {
	if (document.getElementById('help_metascript').style.display == 'none') {
		var etot = document.getElementById('metascript');
		var etot2 = document.getElementById('min_metascript');
		document.body.removeChild(etot);
		document.body.removeChild(etot2);
	}

	else {
		document.getElementById('help_metascript').style.display = 'none';
	}
}

function turn() {
	if (document.getElementById('metascript').style.display == 'none') {
		document.getElementById('metascript').style.display = '';
		document.getElementById('min_metascript').style.display = 'none';
		up();
	}
	else {
		document.getElementById('metascript').style.display = 'none';
		document.getElementById('min_metascript').style.display = '';

	}
}

var escclose = document.getElementById('metascript');
window.onkeyup = function (event) {
	if (event.keyCode == 27) {
		document.body.removeChild(escclose);
	}
}

function EscapeHtml(html) {
	return html.split("&").join("&amp;").split("<").join("&lt;").split(">").join("&gt;")
}
var keytit = 0;
var texttit = 0;


function Counth(elements) {
	if (!elements.length) return 0;
	for (var i = 0; i < elements.length; i++) {
		var check = elements[i].tagName;
		switch (check) {
			case 'H1':
				ch1 += 1;
				break;

			case "H2":
				ch2 += 1;
				break;

			case "H3":
				ch3 += 1;
				break;

			case "H4":
				ch4 += 1;
				break;

			case "H5":
				ch5 += 1;
				break;

			case "H6":
				ch6 += 1;
				break;

			default:
				break;
		}
	}
}
Counth(h1s);
Counth(h2s);
Counth(h3s);
Counth(h4s);
Counth(h5s);
Counth(h6s);
var summ = ch1 + ch2 + ch3 + ch4 + ch5 + ch6;
var hcount = 0;
var innercount = 0;


for (var i = 0; i < titles.length; i++) {

	var keytit = 'yes';
	var texttit = titles[i].innerHTML.replace(/<\/?[^>]+(>|$)/g, "");
	var strlen = texttit.length;
}


if (keytit == 'yes') {
	if ((texttit == null) || (texttit == '') || (texttit == ' ')) {
		test.innerHTML += "<strong><a class='podskazka' data-title='Тэг Title отсутсвует! Небходимо срочно заполнить! Наиболее эффективная длина заголовка страницы около 10-70 символов, включая пробелы. Следите, чтобы title были короткими и убедитесь, что они содержат ваши лучшие ключевые слова. Каждая страница должна иметь свой собственный Уникальный титул. Помните! Title - должен отображать весь смысл того, что находится у вас на странице.' style='text-decoration: none; color: red !important; background-color: #FFFF00 !important; cursor: help !important;'>Title:</a></strong> отсутствует<br>";
	}
	else {
		test.innerHTML += "<div style='color: black; font: 13px Arial;' ><strong>Title (<a  " + (strlen > 60 ? "class='podskazka'" : "") + " " + (strlen > 60 ? "data-title='Заголовок страницы слишком длинный, используйте заголовки до 60 символов для придания большей релевантности странице'" : "") + " >" + strlen + "</a>):</strong>&nbsp;" + texttit + "<br/></div>";
	}
}
else {
	test.innerHTML += "<strong><a class='podskazka' data-title='Тэг Title отсутсвует! Небходимо срочно заполнить! Наиболее эффективная длина заголовка страницы около 10-70 символов, включая пробелы. Следите, чтобы title были короткими и убедитесь, что они содержат ваши лучшие ключевые слова. Каждая страница должна иметь свой собственный Уникальный титул. Помните! Title - должен отображать весь смысл того, что находится у вас на странице.' style='color: #000000;    text-decoration: none; color: red !important; background-color: #FFFF00 !important; cursor: help !important; cursor: text;'>Title:</a></strong> отсутствует<br>";
}

var des = 0;
var keyword = 0;
var container = document.getElementById('h1h6');
var test = document.getElementById('test_metascript');
for (var i = 0; i < metas.length; i++) {

	if (metas[i].getAttribute("name") && metas[i].getAttribute("name").toLowerCase() == "description") {
		var desclen = EscapeHtml(metas[i].getAttribute("content")).length;
		des = 'yes';
		var contdes = EscapeHtml(metas[i].getAttribute("content"));
	}
	if (metas[i].getAttribute("name") && metas[i].getAttribute("name").toLowerCase() == "keywords") {
		var keylen = EscapeHtml(metas[i].getAttribute("content")).length;
		keyword = 'yes';
		var contkey = EscapeHtml(metas[i].getAttribute("content"));
	}

}
if (des == 'yes') {
	if ((contdes == null) || (contdes == '') || (contdes == ' ')) {
		test.innerHTML += "<strong><a class='podskazka' data-title='Описание страницы отсутствует! Рекомендуется использовать привлекательное описание, содержащее 1-2 ключевых слова, длиной до 200 символов' style='color: #000000;    text-decoration: none; color: red !important; background-color: #FFFF00 !important; cursor: help !important; cursor: text;'>Description:</a></strong> отсутствует<br>";
	} else {
		test.innerHTML += "<div style='color: black; font: 13px Arial;'><strong>Description (<a  " + (desclen > 200 ? "class='podskazka'" : "") + " " + (desclen > 200 ? "data-title='Описание страницы слишком длинное! Желательно сделать описание как можно более привлекательным для человека, содержащее 1-2 ключевых слова, длиной до 200 символов'" : "") + " >" + desclen + "</a>):</strong>&nbsp;" + contdes + "<br/></div>";
	}
}
else {
	test.innerHTML += "<strong><a class='podskazka' data-title='Описание страницы отсутствует! Рекомендуется использовать привлекательное описание, содержащее 1-2 ключевых слова, длиной до 200 символов' style='color: #000000;    text-decoration: none; color: red !important; background-color: #FFFF00 !important; cursor: help !important; cursor: text;'>Description:</a></strong> отсутствует<br>";
}

if (keyword == 'yes') {
	if ((contkey == null) || (contkey == '') || (contkey == ' ')) {
		test.innerHTML += "<strong><a class='podskazka' data-title='Элемент отсутствует! Рекомендуется указывать 4-6 основных ключевых слов страницы через запятую, объемом до 100 символов' style='color: #000000;    text-decoration: none; color: red !important; background-color: #FFFF00 !important; cursor: help !important; cursor: text;'>Keywords:</a></strong> отсутствует<br>";
	} else {
		test.innerHTML += "<div style='color: black; font: 13px Arial;'><strong>Keywords (<a  " + (keylen > 100 ? "class='podskazka'" : "") + " " + (keylen > 100 ? "data-title='Указано слишком много ключевых слов, рекомендуется использывать 4-6 основных слов объемом до 100 символов'" : "") + " >" + keylen + "</a>):</strong>&nbsp;" + contkey + "<br/></div>";
	}
}
else {
	test.innerHTML += "<strong><a class='podskazka' data-title='Элемент отсутствует! Рекомендуется указывать 4-6 основных ключевых слов страницы через запятую, объемом до 100 символов' style='color: #000000;    text-decoration: none; color: red !important; background-color: #FFFF00 !important; cursor: help !important; cursor: text;'>Keywords:</a></strong> отсутствует<br>";
}

var pluslink;
var canonicalc = 0;
for (var i = 0; i < canonical.length; i++) {
	if (canonical[i].rel == 'canonical') {
		canonicalc++;
		test.innerHTML += "<br/><b><a class='" + (canonicalc > 1 ? "podskazka" : "") + "' data-title='" + (canonicalc > 1 ? "На странице обнаружен второй тег " + canonical[i].outerHTML + ", что является недопустимым. Необходимо оставить только один." : "") + "' >Rel=canonical:</a></b> <a style='color: green; text-decoration: underline !important;' href='" + canonical[i].href + "'>" + canonical[i].href + "</a>";
	}

	/*if(canonical[i].href.host == 'plus.google.com')
	pluslink = 'yes';*/

	if ((canonical[i].href.indexOf('plus.google.com') + 1) && ((canonical[i].href.indexOf('rel=author') + 1) || (canonical[i].rel.toLowerCase() == 'publisher') || (canonical[i].rel.toLowerCase() == 'author')))
		pluslink = 'yes';


	if ((i == canonical.length - 1) && (canonicalc != 0)) {
		test.innerHTML += "<br/><br/>";
	}
	else {
		if (i == canonical.length - 1)
			test.innerHTML += "<br/>";
	}
}


test.innerHTML += "<span style='font-size: 15px; font-weight: bold;'>Заголовки H1-H6</span> " + (summ != 0 ? "<a id='toggle' onclick='collapsElement3();' style='cursor:pointer !important;color: green !important;font-size: 11px !important;border-bottom: 1px dashed !important; background-color: transparent !important;'>Показать таблицу</a><br/>" : "") + "";




//Формирование таблицы H-заголовков

function collapsElement3() {
	if (document.getElementById('toggle').innerHTML == 'Показать таблицу') {
		document.getElementById('toggle').innerHTML = 'Скрыть таблицу';
	}
	else {
		document.getElementById('toggle').innerHTML = 'Показать таблицу';
	}
	if (document.getElementById('tableH').style.display != "none") {
		document.getElementById('tableH').style.display = 'none';
	}
	else {
		document.getElementById('tableH').style.display = '';
	}
}
test.innerHTML += "<div id='tableH' style='display: none'></div>";
var tablica = document.getElementById('tableH');
tablica.innerHTML += "<br><table  cellpadding='0' cellspacing='0' style='width: 100%; text-align: center;'>" +
	"<tbody>" +
	"<tr>" +
	"<td>" +
	"<b><a " + (ch1 > 1 ? "class='podskazka'" : "") + " " + (ch1 > 1 ? "data-title='На странице найдено " + ch1 + " тега H1, что является недоспустимым. Оставьте только один тег H1.'" : "") + ">H1</a></b></td>" +
	"<td>" +
	"<b>H2</b></td>" +
	"<td>" +
	"<b>H3</b></td>" +
	"<td>" +
	"<b>H4</b></td>" +
	"<td>" +
	"<b>H5</b></td>" +
	"<td>" +
	"<b>H6</b></td>" +
	"</tr>" +
	"<tr>" +
	"<td>" + ch1 + "</td>" +
	"<td>" + ch2 + "</td>" +
	"<td>" + ch3 + "</td>" +
	"<td>" + ch4 + "</td>" +
	"<td>" + ch5 + "</td>" +
	"<td>" + ch6 + "</td>" +
	"</tr>" +
	"</tbody>" +
	"</table><br/>";


for (var j = 1; j < 7; j++) {
	var helement = document.getElementsByTagName('h' + j);
	for (var i = 0; i < helement.length; i++) {

		if (!helement.length) break;
		var hint = EscapeHtml(helement[i].innerHTML);
		var text = helement[i].innerHTML.replace(/<\/?[^>]+(>|$)/g, "");
		var red = text != helement[i].innerHTML;

		hcount++;
		if (helement[i].tagName == 'H1') {
			var h1prishel = 'yes';
		} else { h1prishel = 'no' }
		if ((text.replace(/\s/g, "") == "") || (/^\s*&nbsp;\s*$/.test(text) == true)) {
			var pusto = 1;
		} else { pusto = 0; }


		if (helement[i].outerHTML) {
			helement[i].outerHTML = helement[i].outerHTML.replace(/'/g, '"');
		}


		test.innerHTML += "<div style='color: black; font: 13px Arial;' ><strong><a class='" + (red || (ch1 > 1 && h1prishel == 'yes') || (pusto == 1) || (helement[i].attributes.length != 0) ? "podskazka" : "") + "' " + (red || (ch1 > 1 && h1prishel == 'yes') || (pusto == 1) || (helement[i].attributes.length != 0) ? "data-title='" + ((pusto == 1) ? "Тег Пустой" : "") + " " + (ch1 > 1 && h1prishel == 'yes' ? "На странице найдено " + ch1 + " тега H1, что является недоспустимым. Оставьте только один тег H1." : "") + " " + (red ? "Внутри тега " + helement[i].tagName + " обнаружены вложенные теги: " + helement[i].outerHTML + "." : "") + " " + ((helement[i].attributes.length != 0) ? "Тег " + (red ? "" : "" + helement[i].tagName + "") + " содержит посторонние атрибуты" + (red ? "" : ": " + helement[i].outerHTML + "") + ", что недопустимо. Стиль оформления тегов необходимо указывать в подключаемом файле стилей .css" : "") + "'" : "") + " >" + helement[i].tagName + ":</a></strong>&nbsp;" + text + "<br/>";
	}
}


/*if(hcount > 5){
test.innerHTML += "<a id='toggleHideh' onclick='collapsElementHideh();' style='cursor:pointer !important;color: green !important;font-size: 11px !important;border-bottom: 1px dashed !important; background-color: transparent !important;'>Показать остальные</a><br/>";}*/

if (summ == 0) {
	test.innerHTML += "<br/>Заголовки отсутствуют<br>";
}

function collapsElementHideh() {

	if (document.getElementById('toggleHideh').innerHTML == 'Показать остальные') {
		document.getElementById('toggleHideh').innerHTML = 'Скрыть остальные';
	}
	else {
		document.getElementById('toggleHideh').innerHTML = 'Показать остальные';
	}

	if (document.getElementById('5moreh').style.display != "none") {
		document.getElementById('5moreh').style.display = 'none';
	}
	else {
		document.getElementById('5moreh').style.display = '';
	}
}



/* ЭЛЕМЕНТЫ ОФОРМЛЕНИЯ */

var kolb = document.getElementsByTagName('b').length;
var kolstrong = document.getElementsByTagName('strong');
var summbs = cb + cstrong;
var summiem = ci + cem;
test.innerHTML += "<br><span style='font-size: 15px; font-weight: bold;'>Элементы оформления контента</span><!--  <a id='toggleOform' onclick='collapsElementOform();' style='cursor:pointer !important;color: green !important;font-size: 11px !important;border-bottom: 1px dashed !important; background-color: transparent !important;'>Показать</a>-->";
test.innerHTML += "<div id='oform' ></div>";
var ofo = document.getElementById('oform');




function collapsElementOform() {

	if (document.getElementById('toggleOform').innerHTML == 'Показать') {
		document.getElementById('toggleOform').innerHTML = 'Скрыть';
	}
	else {
		document.getElementById('toggleOform').innerHTML = 'Показать';
	}

	if (document.getElementById('oform').style.display != "none") {
		document.getElementById('oform').style.display = 'none';
	}
	else {
		document.getElementById('oform').style.display = '';
	}
}

/* ОПРЕДЕЛЕНИЕ КОЛИЧЕСТВА ТЕГОВ NOINDEX НА СТРАНИЦЕ*/
var noindcount = 0;
for (var i = 0; i < noindex.length; i++) {
	noindcount++;
}
var classes = 0;
var first3 = 0;
for (var i = 0; i < allTags.length; i++) {
	classes = allTags[i].className;
	first3 = allTags[i].className.slice(0, 3).toLowerCase();
	if (first3 == 'mso') {
		var trashsource = 'yes';
	}
}

ofo.innerHTML += "<table  cellpadding='0' cellspacing='0' style='width: 100%;'>" +
	"<tbody>" +
	"<tr>" +
	"<tr>" +
	"<td>Мусорный код из MS Word: " + (trashsource ? "<b>Обнаружен</b>" : "<b>Нет</b>") + "</td>" +
	"<td id='gplus'></td>" +
	"</tr>" +
	"<td>Количество тегов <span style='color:red;'>&lt;noindex&gt;</span>: <b>" + noindcount + "</b><br/>Кол-во таблиц &lt;table&gt;: <b>" + ctable + "</b></td>" +
	"<td>Маркированных списков &lt;ul&gt;: <b>" + cul + "</b><br>Нумерованных списков &lt;ol&gt;: <b>" + col + "</b></td>" +

	"</tr>" +
	"<tr>" +
	"<td>Тегов &lt;b&gt;: <b>" + cb + "</b> | Тегов &lt;strong&gt;: <b>" + cstrong + "</b></td>" +
	"<td>Тегов &lt;i&gt;: <b>" + ci + "</b> | Тегов &lt;em&gt;: <b>" + cem + "</b></td>" +
	"</tr>" +
	"</tbody>" +
	"</table>";

/* Функция проверки адреса ссылки на внешний ресурс */
function isExternal(url) {
	var match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
	if (typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol) return url;
	if (typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":(" + { "http:": 80, "https:": 443 }[location.protocol] + ")?$"), "") !== location.host) return url;
	return false;
}

test.innerHTML += "<br><span style='font-size: 15px; font-weight: bold;'>Исходящие cсылки на другие ресурсы</span> <span id='allextlinks'></span><br>";



function collapsElement2() {
	if (document.getElementById('tooglelink').innerHTML == 'Показать остальные') {
		document.getElementById('tooglelink').innerHTML = 'Скрыть остальные';
	}
	else {
		document.getElementById('tooglelink').innerHTML = 'Показать остальные';
	}
	if (document.getElementById('morelink').style.display != "none") {
		document.getElementById('morelink').style.display = 'none';
	}
	else {
		document.getElementById('morelink').style.display = '';
	}
}

/*Блок вывода найденых ссылок на странице и проверки наличия атрибута nofollow*/
var exp = 'java';
var countlink = 0, allnofollow = 0, allopen = 0;
var stape = 0;
var pluscheck;
for (var i = 0; i < links.length; i++) {
	var chword = links[i].href.slice(0, 4);
	if ((exp != chword) && (links[i].href != 'mailto:3a.dmitriy@gmail.com')) {
		var extlinks = isExternal(links[i].href);
		if (extlinks != false) {
			if ((links[i].host == 'plus.google.com') /*&& (links[i].rel.toLowerCase() == 'publisher')*/)
				pluscheck = 'yes';
			var anchor = EscapeHtml(links[i].innerHTML);

			countlink++;
			if (countlink > 5) {
				stape++;
				if (stape == 1) {

					test.innerHTML += "<div id='morelink' style='display: none'></div>";
					var more = document.getElementById('morelink');
				}
				if (links[i].rel == "nofollow") {
					allnofollow++;
					more.innerHTML += "<b>" + countlink + ".</b> <span id='metaextlink' onclick='showfulllikn(this)'>" + (links[i].href.length > 45 ? "" + links[i].host + "<span id='hreeef'><span id='morehref' style='display:none' >" + links[i].pathname + links[i].search + "</span><span id='moreshow' >...&raquo;</span></span>" : "" + links[i].href + "") + "&nbsp;-&nbsp;<span style='color: red;'>nofollow</span> | <b>Анкор:</b> " + anchor + "<br/>";
				}
				else {
					allopen++;
					more.innerHTML += "<b>" + countlink + ".</b> <span class='podskazka' data-title='Обнаружена открытая исходящая ссылка на внешний ресурс! Рекомендуется поместить данные ссылки в теги <noindex> и добавить к ссылкам атрибут rel=&#34;nofollow&#34;. Убедитесь, что ссылаетесь на авторитетный ресурс.'><span id='metaextlink' onclick='showfulllikn(this)'>" + (links[i].href.length > 45 ? "" + links[i].host + "<span id='hreeef'><span id='morehref' style='display:none' >" + links[i].pathname + links[i].search + "</span><span id='moreshow' >...&raquo;</span></span></span>" : "" + links[i].href + "</span>") + "</span> | <b>Анкор:</b> " + anchor + "<br/>";
				}
			}
			else {
				if (links[i].rel == "nofollow") {
					allnofollow++;
					test.innerHTML += "<b>" + countlink + ".</b> <span id='metaextlink' onclick='showfulllikn(this)'>" + (links[i].href.length > 45 ? "" + links[i].host + "<span id='hreeef'><span id='morehref' style='display:none' >" + links[i].pathname + links[i].search + "</span><span id='moreshow' >...&raquo;</span></span>" : "" + links[i].href + "") + "&nbsp;-&nbsp;<span style='color: red;'>nofollow</span> | <b>Анкор:</b> " + anchor + "</span><br/>";
				} else {

					var hello = links[i].getElementsByTagName('img').length;
					if (hello == 1) {
						var extimg = links[i].getElementsByTagName('img');
					}
					allopen++;
					test.innerHTML += "<b>" + countlink + ".</b> <span class='podskazka' data-title='Обнаружена открытая исходящая ссылка на внешний ресурс! Рекомендуется поместить данные ссылки в теги <noindex> и добавить к ссылкам атрибут rel=&#34;nofollow&#34;. Убедитесь, что ссылаетесь на авторитетный ресурс.'><span id='metaextlink' onclick='showfulllikn(this)'>" + (links[i].href.length > 45 ? "" + links[i].host + "<span id='hreeef'><span id='morehref' style='display:none' >" + links[i].pathname + links[i].search + "</span><span id='moreshow' >...&raquo;</span></span></span>" : "" + links[i].href + "</span>") + "</span> | <b>Анкор:</b> " + anchor + "<br/>";

				}
			}

		}
		if (i == links.length - 1) {
			if ((allnofollow != 0) || (allopen != 0)) {
				document.getElementById('allextlinks').innerHTML = "( <span style='color:red;'>Nofollow:</span> <b>" + allnofollow + "</b> | Открытых: <b>" + allopen + "</b> )";
			}
			{
				if (countlink == 0)
					test.innerHTML += "Исходящих ссылок на странице не обнаружено.<br/>";
			}

		}

	}
}
if (countlink > 5) {
	test.innerHTML += "<a id='tooglelink' onclick='collapsElement2();' class='podskazka' data-title='Отобразить остальные найденные ссылки' style='cursor:pointer !important;color: green !important;font-size: 11px !important;border-bottom: 1px dashed !important; background-color: transparent !important;'>Показать остальные</a><br/><br/>";
}
else
	test.innerHTML += "<br/>";


function showfulllikn(elem) {
	xxx = elem.children[0].children[0];
	xxx.style.display = '';
	xx2 = elem.children[0].children[1];
	xx2.innerHTML = '';
}


if (pluscheck || pluslink) {
	document.getElementById('gplus').innerHTML = "<b><font color='#0000FF'>G</font><font color='#A52A2A'><span style='color: #ff0000;'>o</span></font><font color='#FF8C00'>o</font><font color='#0000FF'>g</font><font color='#008000'>l</font><font color='#A52A2A'>e</font></b>+: <b>Есть</b>";
}
else {
	document.getElementById('gplus').innerHTML = "Google+: <b>Нет</b>";
}






test.innerHTML += "<span style='font-size: 15px; font-weight: bold;'>Количество изображений - " + imgc + "</span><br/>";
test.innerHTML += "изображений без alt - <b>" + altc + "</b> <a id='togglealt' onclick='collapsElement();' class='podskazka' data-title='Миниатюры найденных изображений на странице без атрибута alt' style='cursor:pointer !important;color: green !important;font-size: 11px !important;border-bottom: 1px dashed !important; background-color: transparent !important;'>Показать миниатюры</a> <br/>";
test.innerHTML += "изображений без title - <b>" + titlec + "</b> <a id='toggletitle' onclick='collapsElement4();' class='podskazka' data-title='Миниатюры найденных изображений на странице без атрибута title'  style='cursor:pointer !important;color: green !important;font-size: 11px !important;border-bottom: 1px dashed !important; background-color: transparent !important;'>Показать миниатюры</a> <br/>";


function collapsElement() {
	if (document.getElementById('togglealt').innerHTML == 'Показать миниатюры') {
		document.getElementById('togglealt').innerHTML = 'Скрыть миниатюры';
	}
	else {
		document.getElementById('togglealt').innerHTML = 'Показать миниатюры';
	}

	if (document.getElementById('007').style.display != "none") {
		document.getElementById('007').style.display = 'none';
	}
	else {

		document.getElementById('007').style.display = '';
	}
}

test.innerHTML += "<div id='007' style='display: none; overflow: auto !important;'></div>";

var imgdiv = document.getElementById('007');

var bigsize = "350"; //Размер большой картинки
var smallsize = "50"; //Размер маленькой картинки
function changeSizeImage(im) {
	if (im.width == bigsize) {
		im.width = smallsize;
		im.style.border = 'none;';
	}
	else {
		im.width = bigsize;
		im.style.border = '8px solid #FFFFFF;';

	}
}


for (var i = 0; i < arr.length; i++) {
	imgdiv.innerHTML += "<div><img src='" + arr[i] + "' title='" + arr[i] + "' width='50px' style='margin:10px !important; float:left !important; cursor:pointer !important; border: 1px solid #FFFFFF !important; box-shadow: 0 0 4px #FFFFFF !important; overflow: auto !important;' onclick='changeSizeImage(this)'/><div style='display: none; width=100%'>" + arr[i] + "</div></div>";
}


function collapsElement4() {
	if (document.getElementById('toggletitle').innerHTML == 'Показать миниатюры') {
		document.getElementById('toggletitle').innerHTML = 'Скрыть миниатюры';
	}
	else {
		document.getElementById('toggletitle').innerHTML = 'Показать миниатюры';
	}
	if (document.getElementById('008').style.display != "none") {
		document.getElementById('008').style.display = 'none';
	}
	else {

		document.getElementById('008').style.display = '';
	}
}

test.innerHTML += "<div id='008' style='display: none; overflow: auto !important;'></div>";

var titlediv = document.getElementById('008');

for (var i = 0; i < titlearr.length; i++) {
	titlediv.innerHTML += "<img src='" + titlearr[i] + "' title='" + titlearr[i] + "' width='50px' style='margin:10px !important; float:left !important; cursor:pointer !important; border: 1px solid #FFFFFF !important; box-shadow: 0 0 4px #FFFFFF !important; overflow: auto !important;' onclick='changeSizeImage(this)'/>";
}


/*Копирование в Буфер Обмена */
//test.innerHTML += "<script type='text/javascript' src='https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/jquery.zclip.js'></script>";

/*
test.innerHTML += "<p id='description'>test</p><a id='copy-description'>click</a>";


var defer2 = $.Deferred();
$(defer2.resolve());


$.when(defer, defer2).done(function(){
		$('a#copy-description').zclip({
				path:'https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/ZeroClipboard.swf',
				copy: function () {
				console.log('click');
				return $('p#description').text();
				}
		});
});
*/

/*
$(document).ready(function(){

		$('a#copy-description').zclip({
				path:'https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/ZeroClipboard.swf',
				copy:$('p#description').text()
		});
});*/

/*
var defer8 = $.Deferred();
$(defer8.resolve());

$.when(defer9, defer8).done(function(){
	
	var clip = new ZeroClipboard.Client();
	ZeroClipboard.setMoviePath('https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/metascript/zeroclipboard/ZeroClipboard.swf');
	clip.setText('Этот текст окажется в буфере');
	clip.glue('copyButton');
	});
	
test.innerHTML += "<button id='copyButton'>Копировать в буфер</button>";	
*/
/*
//test.innerHTML += "<input type='text' id='inputId' />";
//test.innerHTML += "<input type='button' id='buttonId' data-clipboard-target='inputId' name='Копировать'/>";

//var clip = new ZeroClipboard.Client();
//ZeroClipboard.setMoviePath('https://googledrive.com/host/0B8b7gi0h5HCPOVh2cWRmaWlvc00/metascript/zeroclipboard/ZeroClipboard.swf');
//clip.setText('Этот текст окажется в буфере');
//clip.glue('copyButton');
*/

// Объявим глобальные переменные
// Переменная состояния, по умолчанию ничего не двигается = false



var ball = document.getElementById('min_metascript');

ball.onmousedown = function (e) {
	var self = this;
	e = fixEvent(e);

	var coords = getCoords(this);

	var shiftX = e.pageX - coords.left;
	var shiftY = e.pageY - coords.top;


	this.style.position = 'absolute';
	document.body.appendChild(this);
	moveAt(e);

	this.style.zIndex = 1000; // над другими элементами

	function moveAt(e) {
		self.style.left = e.pageX - shiftX + 'px';
		self.style.top = e.pageY - shiftY + 'px';
	}

	document.onmousemove = function (e) {
		e = fixEvent(e);
		moveAt(e);
	};

	this.onmouseup = function () {
		document.onmousemove = self.onmouseup = null;
	};

}

ball.ondragstart = function () {
	return false;
};


test.innerHTML += "<style>#test_metascript{border: none; border-radius: 30px;}</style>";

/*
var openstat = { counter: 2356028, next: openstat };
(function(d, t, p) {
var j = d.createElement(t); j.async = true; j.type = "text/javascript";
j.src = ("https:" == p ? "https:" : "http:") + "//openstat.net/cnt.js";
var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
})(document, "script", document.location.protocol);
 */



var end = new Date();
var end_speed = (end.getTime() - start.getTime()) / 1000;
test.innerHTML += "<span id='mailto_metascript'></span>";
test.innerHTML += "<span id='speedtime_metascript' style='display:none;'><span style='font-size:10px; font-weight:bold;   float: right;'>© 2014 by <a class='mailto' data-title='Если вы нашли неисправность в работе скрипта, отправьте мне письмо с указанием анализируемой страницы и ошибки.' href='mailto:3a.dmitriy@gmail.com'>3a.dmitriy</a></span></br><span style='float: right !important; font-size: 9px; !important;'>Скрипт сгенерирован за " + end_speed + " сек</span></span>";