<?php echo js_tag('vendor/tiny_mce/tiny_mce'); ?>
<script type="text/javascript">
jQuery(window).load(function () {
  Omeka.wysiwyg({
    mode: 'specific_textareas',
    editor_selector: 'html-editor'
  });
});
</script>

<?php 
$page_path = get_option('honor_thy_contributors_page_path');
$view = get_view();
?>

<div class="field">
  <div class="two columns alpha">
    <?php echo $view->formLabel('page_path', 'Page path'); ?>
  </div>
  <div class="inputs five columns omega">
    <div class="input-block">
      <?php echo $view->formText('page_path', $page_path, array('class' => 'textinput')); ?>
      <p class="explanation">
        The path to the page listing the contributors. For example, if your site is hosted at <code>http://my-omeka-site.org/</code>, and the value of this field is <code>contributors/</code>, then your page will be displayed at <code>http://my-omeka-site.org/contributors/</code>.
      </p>
    </div>
  </div>
</div>
