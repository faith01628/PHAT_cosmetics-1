$(function () {
  $(".tags_selector").select2({
    tags: true,
    tokenSeparators: [',', ' ']
  })
  $(".select2_init").select2({
    placeholder: "Select a category",
    allowClear: true
  })
  $(".select3_init").select2({
    placeholder: "Select a brand",
    allowClear: true
  })

  //TINYMCE
  tinymce.init({
    selector: 'textarea.tinymce_editor_init',
    plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker tinydrive link',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents custom insertfile link media',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
    setup: (editor) => {
      editor.ui.registry.addButton('custom', {
        text: 'Custom browse',
        onAction: () => {
          editor.plugins.tinydrive.browse({
          }).then(() => {
            console.log('Tiny Drive dialog closed.');
          });
        }
      });
    }
  });




})