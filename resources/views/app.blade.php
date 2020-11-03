&lt;!DOCTYPE html&gt;
&lt;html lang="{{ app()-&gt;getLocale() }}"&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
 
    &lt;!-- CSRF Token --&gt;
    &lt;meta name="csrf-token" content="{{ csrf_token() }}"&gt;
 
    &lt;title&gt;Laravel 7 Loadmore with Vue Js&lt;/title&gt;
 
    &lt;!-- Styles --&gt;
    &lt;link href="{{ asset('css/app.css') }}" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id="app"&gt;&lt;/div&gt;
 
    &lt;script src="{{ asset('js/app.js') }}"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;