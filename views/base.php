<!DOCTYPE html>
<html>
    <head>
        {% block head %}
        <title>{% block title %}{% endblock %}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/uikit.almost-flat.min.css" />
        <link rel="stylesheet" href="css/styles.css" />            
        {% endblock %}
    </head>
    <body>
        <div class="uk-grid-preserve">
            <div class="container uk-grid uk-width-7-10 uk-container-center">
                <div class="sidebar uk-width-1-6">
                    {% block menu %}
                    <ul class="uk-nav uk-nav-side" data-uk-nav="">
                        <li class="uk-nav-header">Main menu</li>
                        <li><a href="./step1"><i class="uk-icon-upload"></i> Upload</a></li>
                        <li><a href="./step2"><i class="uk-icon-list-ol"></i> Map</a></li>
                    </ul>
                    {% endblock %}
                </div>
                <div class="content uk-width-5-6">
                    {% block content %}{% endblock %}                    
                </div>
            </div>


        </div>
        {% block footer %}
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/uikit.min.js"></script>
        {% endblock %}
    </body>
</html>