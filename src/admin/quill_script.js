const options = {
    debug: 'warn',
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike']
        ]
    },
    placeholder: 'Text par défaut',
    theme: 'snow'
};

var quill = new Quill('#editor', options);