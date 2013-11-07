<?php

/* index.php */
class __TwigTemplate_db7b84b00d23b5bea69cebca6568ada206bc84eeb99f69c9aac54cf2e3123bbe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php
/*
 * Copyright (c) 2013 Todor Georgiev
 * See the file license.txt for copying permission.
 * http://opensource.org/licenses/mit-license.php
 */

\$csv_mapping = array(
    'ProductCode',
    'ManufacturerName',
    'CategoryName',
    'CategoryBranch',
    'ProductIsActive',
    'ProductName',
    'ProductDescription',
    'ProductDescriptionXHTML',
    'ProductDetailedDescription',
    'ProductDetailedDescriptionXHTML',
    'ProductPrice',
    'ProductWeight',
    'ProductQuantity',
    'ProductIsEgood',
    'ProductClassName'
);
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <link rel=\"stylesheet\" href=\"css/uikit.almost-flat.min.css\" />
        <link rel=\"stylesheet\" href=\"css/styles.css\" />        
    </head>
    <body>
        <div class=\"uk-grid-preserve\">
            <div class=\"container uk-grid uk-width-7-10 uk-container-center\">
                <div class=\"sidebar uk-width-1-6\">
                    <ul class=\"uk-nav uk-nav-side\" data-uk-nav=\"\">
                        <li class=\"uk-nav-header\">Main menu</li>
                        <li><a href=\"\"><i class=\"uk-icon-upload\"></i> Upload</a></li>
                        <li><a href=\"\"><i class=\"uk-icon-list-ol\"></i> Map</a></li>
                        <li class=\"uk-nav-divider\"></li>
                        <li><a href=\"\"><i class=\"uk-icon-download\"></i> Export</a></li>
                    </ul>
                </div>
                <div class=\"content uk-width-5-6\">
                    <article class=\"uk-article\">
                        <h1 class=\"uk-article-title\">Step 1</h1>
                        <p class=\"uk-article-lead\">Upload csv file from a provider.</p>
                        <p>The file should be encoded in UTF-8. It should includes at least the 15 columns required by <a href=\"http://help.summercart.com/bg/article/AA-00546/importirane-na-produkti-prez-csv-fayl.html\" target=\"_blank\">Summercart</a>.</p>
                        <form class=\"uk-form\">
                            <fieldset>
                                <legend></legend>
                                <input type=\"file\" >
                                <button class=\"uk-button\" type=\"submit\">Upload</button>
                            </fieldset>
                        </form>
                    </article>
                    <hr class=\"uk-article-divider\">
                    
                    <article class=\"uk-article\">
                        <h1 class=\"uk-article-title\">Step 2</h1>
                        <p class=\"uk-article-lead\">Map Summercart columns with the columns from the provider</p>
                        <p>Help text</p>
                        <form id=\"step2\" class=\"uk-form\">
                            <div class=\"uk-grid\">
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[0]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><p class=\"uk-width-1-3\">test</p></div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[1]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Layout modifiers can also be added to a <code>&lt;fieldset&gt;</code> element. This means, if you use fieldsets, you can have different form layouts for each fieldset.</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[2]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[3]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[4]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[5]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[6]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[7]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[8]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[9]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[10]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[11]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[12]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[13]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                                
                                <div class=\"uk-width-1-4\"><input class=\"uk-form-width-medium\" type=\"text\" placeholder=\"<?= \$csv_mapping[14]; ?>\" disabled></div>
                                <div class=\"uk-width-1-4\">
                                    <select class=\"uk-form-width-medium\">
                                        <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                            <option value=\"<?= \$key; ?>\"><?= \$field; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=\"uk-width-1-2 notes\"><span class=\"uk-badge\">NOTE</span> Sample info</div>
                                <hr class=\"table-row\">
                            </div>
                        </form>

                    </article>
                    <hr class=\"uk-article-divider\">
                    
                    <article class=\"uk-article preview-csv\">
                        <h1 class=\"uk-article-title\">Step 3</h1>
                        <p class=\"uk-article-lead\">Preview import data</p>
                        <table class=\"uk-table uk-table-striped\">
                            <thead>
                                <tr>
                                    <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                        <th><?= \$field; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach (\$csv_mapping as \$key => \$field) : ?>
                                        <td><?= \$field; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </article>
                    <hr class=\"uk-article-divider\">
                </div>
            </div>
            
            
        </div>
        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
        <script src=\"js/uikit.min.js\"></script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
