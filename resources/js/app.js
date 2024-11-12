import './bootstrap';
import "flowbite";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.querySelectorAll(".ckeditor").forEach((element) => {
    ClassicEditor.create(element, {
        toolbar: {
            items: [
                "heading",
                "|",
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "|",
                "outdent",
                "indent",
                "|",
                "imageUpload",
                "blockQuote",
                "insertTable",
                "mediaEmbed",
                "undo",
                "redo",
            ],
        },
        height: "500px", // Atur tinggi editor
        width: "100%", // Atur lebar editor
        language: "en",
    }).catch((error) => {
        console.error(error);
    });
});
