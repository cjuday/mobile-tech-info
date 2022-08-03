<script>
function img_handler(blobInfo, success, failure) {
  var xhr, formData;

  xhr = new XMLHttpRequest();
  xhr.withCredentials = false;
  xhr.open('POST', '{{ route("img_upload") }}');
  var token = '{{ csrf_token() }}';
  xhr.setRequestHeader("X-CSRF-Token", token);

  xhr.onload = function() {
    var json;

    if (xhr.status === 403) {
      failure('HTTP Error: ' + xhr.status, { remove: true });
      return;
    }

    if (xhr.status < 200 || xhr.status >= 300) {
      failure('HTTP Error: ' + xhr.status);
      return;
    }

    json = JSON.parse(xhr.responseText);

    if (!json || typeof json.location != 'string') {
      failure('Invalid JSON: ' + xhr.responseText);
      return;
    }

    success(json.location);
  };

  xhr.onerror = function () {
    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
  };

  formData = new FormData();
  formData.append('file', blobInfo.blob(), blobInfo.filename());

  xhr.send(formData);
};
</script>
<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="
        tinymce.init({
            target: $refs.tinymce,
            themes: 'modern',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image code charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | image link',
  link_assume_external_targets: true,
  image_title: true,
  automatic_uploads: true,
  image_upload_url: 'upload',
  file_picker_types: 'image',
  media_live_embeds: true,
  images_upload_handler: img_handler,
            setup: function(editor) {
                editor.on('blur', function(e) {
                    value = editor.getContent()
                })

                editor.on('init', function (e) {
                    if (value != null) {
                        editor.setContent(value)
                    }
                })

                function putCursorToEnd() {
                    editor.selection.select(editor.getBody(), true);
                    editor.selection.collapse(false);
                }

                $watch('value', function (newValue) {
                    if (newValue !== editor.getContent()) {
                        editor.resetContent(newValue || '');
                        putCursorToEnd();
                    }
                });
            }
        })
    "
    wire:ignore
>
    <div>
        <input
            x-ref="tinymce"
            type="textarea"
            {{ $attributes->whereDoesntStartWith('wire:model') }}
        >
    </div>
</div>
