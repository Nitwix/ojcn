const toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike', 'link'],
    [{ 'header': [1,2,3,4] }],
    [{'list': 'bullet'}]
];

const options = {
    debug: 'warn',
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: 'Text par défaut',
    theme: 'snow'
};

var quill = new Quill('#editor', options);

function saveHTML(page){
    if(!confirm("Etes-vous sûr de vouloir enregistrer les modifications?")){
        console.log("not saved");
        return;
    }

    $.post("includes/saveHTML.php",{
        quill_html: quill.root.innerHTML,
        page: page
    }, (response) => {
        console.log(response);
    });
}

function sendNewsletter(){
    if (!confirm("Etes-vous sûr de vouloir envoyer la newsletter?")) {
        console.log("not sent");
        return;
    }

    $.post("includes/send_newsletter.php", {
        quill_html: quill.root.innerHTML
    }, (response) => {
        console.log(response);
    });
}