{% extends "base.php" %}

{% block title %}Step 2{% endblock %}

{% block content %}
<article class="uk-article">
    <h1 class="uk-article-title">Step 2</h1>
    <p class="uk-article-lead">Map Summercart columns with the columns from the provider</p>
    <p>Help text</p>
	{{filename}}
    <form id="step2" class="uk-form">
        <div class="uk-grid">
            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[0] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
					{% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><p class="uk-width-1-3">test</p></div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[1] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Layout modifiers can also be added to a <code>&lt;fieldset&gt;</code> element. This means, if you use fieldsets, you can have different form layouts for each fieldset.</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[2] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[3] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[4] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[5] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[6] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[7] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[8] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[9] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[10] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[11] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[12] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[13] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[14] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium">
                    {% for key, field in csv_mapping %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div>
            <hr class="table-row">
        </div>
    </form>

</article>
<hr class="uk-article-divider">
{% endblock %}