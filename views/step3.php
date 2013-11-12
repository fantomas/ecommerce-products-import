{% extends "base.php" %}

{% block title %}Step 3{% endblock %}

{% block content %}
<article class="uk-article preview-csv">
    <h1 class="uk-article-title">Step 3</h1>
    <p class="uk-article-lead">Preview import data</p>
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <?php foreach ($csv_mapping as $key => $field) : ?>
                    <th><?= $field; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($csv_mapping as $key => $field) : ?>
                    <td><?= $field; ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</article>
<hr class="uk-article-divider">
{% endblock %}