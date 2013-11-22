{% extends "base.php" %}

{% block title %}Step 1{% endblock %}

{% block content %}
<article class="uk-article">
    <h1 class="uk-article-title">Step 1</h1>
    <p class="uk-article-lead">Upload csv file from a provider.</p>
    <p>The file should be encoded in UTF-8. It should includes at least the 15 columns required by <a href="http://help.summercart.com/bg/article/AA-00546/importirane-na-produkti-prez-csv-fayl.html" target="_blank">Summercart</a>.</p>
    <form class="uk-form" action="{{ baseUrl }}step1" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend></legend>
            <input type="file" name="csv-file" />
            <button class="uk-button" type="submit">Upload</button>
        </fieldset>
    </form>
</article>
<hr class="uk-article-divider">
{% endblock %}