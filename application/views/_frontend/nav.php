<select class="form-control" onchange="ChangeLanguage()" id="languages">
  <option value="th" <?= ($this->session->userdata('languages') == 'th')? 'selected':'' ?> >ภาษาไทย</option>
  <option value="en" <?= ($this->session->userdata('languages') == 'en')? 'selected':'' ?> >English</option>
</select>

<select class="form-control" onchange="ChangeTheme()" id="themes">
  <option value="bootstrap5" <?= ($this->session->userdata('theme') == 'bootstrap5')? 'selected':'' ?> >Bootstrap v5</option>
  <option value="bootstrap4" <?= ($this->session->userdata('theme') == 'bootstrap4')? 'selected':'' ?> >Bootstrap v4</option>
  <option value="bootstrap3" <?= ($this->session->userdata('theme') == 'bootstrap3')? 'selected':'' ?>>Bootstrap v3.3.5</option>
  <option value="semantic2" <?= ($this->session->userdata('theme') == 'semantic2')? 'selected':'' ?>>Semantic v2.2.13</option>
</select>
<script>
  function ChangeTheme()
  {
    var theme = $("#themes").val();
    $.ajax({
      type: "GET",
      url:  "<?= base_url('site/change_theme'); ?>",
      data: { theme: theme },
      cache: false,
      dataType: "json",
      success: function(msg) {
          console.log(msg);
          location.reload();
      },
      error: function (msg) {
          console.log(msg);
          location.reload();
      },
    });
  }
  function ChangeLanguage()
  {
    var language = $("#languages").val();
    $.ajax({
      type: "GET",
      url:  "<?= base_url('site/change_languages'); ?>",
      data: { language: language },
      cache: false,
      dataType: "json",
      success: function(msg) {
          console.log(msg);
          location.reload();
      },
      error: function (msg) {
          console.log(msg);
          location.reload();
      },
    });
  }
</script>