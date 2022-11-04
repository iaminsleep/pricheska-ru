<script src="{{ asset('public/assets/ckeditor5/build/ckeditor.js') }}"></script>
<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'alignment',
                    'bold',
                    'italic',
                    'fontSize',
                    'link',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo'
                ]
            },
            language: 'ru',
            image: {
                resizeUnit: "%",
                resizeOptions: [{
                        name: 'resizeImage:original',
                        value: null
                    },
                    {
                        name: 'resizeImage:50',
                        value: '50'
                    },
                    {
                        name: 'resizeImage:75',
                        value: '75'
                    }
                ],
                toolbar: [
                    'resizeImage',
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side'
                ],
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            ckfinder: {
                uploadUrl: '/public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            }
        })
        .catch(error => {
            console.log(error);
        });
</script>
