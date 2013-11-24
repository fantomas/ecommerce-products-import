{% extends "base.php" %}

{% block title %}Download{% endblock %}

{% block content %}
<article class="uk-article">
    <h1 class="uk-article-title">Download</h1>
    <p class="uk-article-lead">Info {{message}}</p>
    <ul>
        <li>CSV file: {{code}}.csv</li>
        <li>Images downloaded: {{images_downloaded}}</li>
        <li>Images to download: {{images_todownload}}</li>
    </ul>
    <p>Download package: {% if zip_file %}<a href="{{zip_file}}">{{code}}.zip</a>{% endif %}</p>
</article>
<hr class="uk-article-divider">
{% endblock %}