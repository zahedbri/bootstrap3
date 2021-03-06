<?php $theme = get_option("bootswatch_theme_css_file", "bootswatch_theme"); ?>
<?php $themes = json_decode(file_get_contents(template_dir() . 'css/themes.json'), true);

$other_theme = array("name" => "Bootstra.386", "cssCdn" => template_url('css/styles/bootstra_386/css/bootstrap.css'));
$themes['themes'][] = $other_theme;


$other_theme = array("name" => "Violins", "cssCdn" => template_url('css/styles/violins/style.css'));
$themes['themes'][] = $other_theme;
?>
<script>

    $(document).ready(function () {
        $('input[type=radio][name=bootswatch_theme_css_file]').change(function () {

            if (this.value == '') {
                window.parent.$('head link#bootstrap_theme').attr('href', '<?php print template_url() ?>css/default.css');
            } else {
                window.parent.$('head link#bootstrap_theme').attr('href', this.value);
            }
        });
    });

</script>

<div class="">
    <h4>Theme Colors</h4>

    <div class="m-t-10">
        <label class="mw-ui-check m-b-10 mw-full-width">
            <input class="mw_option_field" option-group="bootswatch_theme" type="radio" <?php if ($theme == ''): ?> checked="" <?php endif; ?> name="bootswatch_theme_css_file" value="">
            <span></span><span>Default</span>
        </label>

        <?php foreach ($themes['themes'] as $item): ?>
            <label class="mw-ui-check m-b-10 mw-full-width">
                <input class="mw_option_field" option-group="bootswatch_theme" type="radio" <?php if ($theme == $item['cssCdn']): ?> checked="" <?php endif; ?> name="bootswatch_theme_css_file" value="<?php print $item['cssCdn'] ?>">
                <span></span><span><?php print $item['name'] ?></span>
            </label>
        <?php endforeach; ?>
    </div>
</div>
