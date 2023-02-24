<script>
    Dropzone.autoDiscover = false;
    const csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
    let uploadedDocumentMap = {};
    var dropzone = new Dropzone("div.create__file", {
        url: "files/upload",
        paramName: "file",
        addRemoveLinks: true,
        timeout: 5000,
        maxFilesize: 5, //MB
        maxFiles: 5,
        previewsContainer: ".dropzone-previews",
        createImageThumbnail: true,
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                alert("Достигнут лимит файлов.");
                this.removeFile(file);
                file.previewElement.remove();
            });
            this.on("addedfile", function(file) {
                const errorMsg = document.querySelector('.upload-error')
                if (errorMsg) errorMsg.remove();
            });
        },
        success: function(file, response) {
            document.querySelector('.create__task-form')
                .insertAdjacentHTML('beforeend',
                    '<input type="hidden" name="files[]" value="' +
                    response.folder +
                    '" data-filename="' + response.alias + '"/>'
                );
            uploadedDocumentMap[file.name] = response.alias;
        },
        error: function(file, response) {
            if (response.errors) {
                file.previewElement.remove();
                document.querySelector('.dropzone-previews')
                    .insertAdjacentHTML('afterend',
                        `<p class="upload-error">${response.message}</p>`
                    );
            }
            return false;
        },
        removedfile: function(file) {
            let name = '';

            if (typeof file.name !== 'undefined')
                name = file.name;
            else
                name = uploadedDocumentMap[file.name];

            const fileInput = document.querySelector('.create__task-form')
                .querySelector('input[name="files[]"][data-filename="' + name + '"]');

            if (fileInput) {
                const folderToDelete = fileInput.value;

                //Remove file from the server using AJAX library
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf_token,
                    },
                    type: 'POST',
                    url: 'files/delete',
                    data: {
                        folderName: folderToDelete,
                    },
                    success: function(data) {
                        file.previewElement.remove();
                        fileInput.remove();
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            }
        },
        headers: {
            'X-CSRF-TOKEN': csrf_token,
        },
    });
</script>
