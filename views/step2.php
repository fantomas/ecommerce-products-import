{% extends "base.php" %}

{% block title %}Step 2{% endblock %}

{% block content %}
<article class="uk-article">
    <h1 class="uk-article-title">Step 2</h1>
    <p class="uk-article-lead">Map Summercart columns with the columns from the provider</p>
    <p>Help text</p>
	{{filename}}
    <form id="step2" class="uk-form" action="/ecommerce-products-import/step2" method="POST">
        <div class="uk-grid">
            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[0] }}*" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[0] }}">
					{% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Required field. SKU number</div>
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[1] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[1] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!--<div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Layout modifiers can also be added to a <code>&lt;fieldset&gt;</code> element. This means, if you use fieldsets, you can have different form layouts for each fieldset.</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[2] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[2] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[3] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[3] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[4] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[4] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[5] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[5] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[6] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[6] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[7] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[7] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[8] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[8] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[9] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[9] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[10] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[10] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[11] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[11] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[12] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[12] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[13] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[13] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">

            <div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[14] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[14] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <!-- <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Sample info</div> -->
            <hr class="table-row">
			
			<div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[15] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[15] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> Main image url. This field will not be in csv export</div>
            <hr class="table-row">
			
			<div class="uk-width-1-4"><input class="uk-form-width-medium" type="text" placeholder="{{ csv_mapping[16] }}" disabled></div>
            <div class="uk-width-1-4">
                <select class="uk-form-width-medium" name="{{ csv_mapping[16] }}">
                    {% for key, field in csv_uploaded_columns %}
					<option value="{{ key }}">{{ field }}</option>
					{% endfor %}
                </select>
            </div>
            <div class="uk-width-1-2 notes"><span class="uk-badge">NOTE</span> One or more image urls divided by |. This field will not be in csv export</div>
            <hr class="table-row">
        </div>
		<button class="uk-button uk-button-primary uk-button-large uk-float-right" type="submit">Export</button>
    </form>

</article>
<hr class="uk-article-divider">
{% endblock %}