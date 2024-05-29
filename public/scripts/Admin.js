


lucide.createIcons();


document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggleAndResetButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const checkbox = document.getElementById('clear-' + itemId);
            const open = document.getElementById('open-' + itemId);
            const form = document.getElementById('form-' + itemId);

            if (checkbox && open && form) {
                checkbox.checked = !checkbox.checked;
                form.reset();
                open.checked = !open.checked;
            } else {
                console.error('One or more elements not found for item ID:', itemId);
            }
        });
    });

    document.querySelectorAll('.toggleCloseButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const form = document.getElementById('form-' + itemId);

            if (form) {
                form.reset();
            } else {
                console.error('Form element not found for item ID:', itemId);
            }
        });
    });
});

let imagePreview = document.getElementById('imagePreview');

document.getElementById('imageInput').addEventListener('change', function (event) {
    const file = event.target.files[0];

    // Clear any previous preview
    imagePreview.innerHTML = '';

    // Ensure a file is selected and it is an image
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            imagePreview.appendChild(img);
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.innerHTML = 'No image selected or file type not supported.';
    }
});

document.getElementById('toggleAndResetButton').addEventListener('click', function () {
    // Toggle the checkbox
    const checkbox = document.getElementById('clear');
    const add = document.getElementById('add');
    checkbox.checked = !checkbox.checked;

    // Reset the form
    document.getElementById('addform').reset();

    add.checked = !add.checked;
    imagePreview.innerHTML = '';
});
document.getElementById('toggleClose').addEventListener('click', function () {
    // Reset the form
    document.getElementById('addform').reset();
    document.getElementById('addempform').reset();
}); 
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggleAndResetButton').forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.dataset.id;
            const checkbox = document.getElementById('clear2-' + itemId);
            const add = document.getElementById('edit-' + itemId);
            const form = document.getElementById('editForm-' + itemId);
            let imagePreview = document.getElementById('imagePreview-' + itemId);

            if (checkbox && add && form && imagePreview) {
                checkbox.checked = !checkbox.checked;
                form.reset();
                add.checked = !add.checked;
                imagePreview.innerHTML = '';
            } else {
                console.error('One or more elements not found for item ID:', itemId);
            }
        });
    });

    document.querySelectorAll('.toggleCloseButton').forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.dataset.id;
            const form = document.getElementById('editForm-' + itemId);

            if (form) {
                form.reset();
            } else {
                console.error('Form element not found for item ID:', itemId);
            }
        });
    });
    // Function to handle image preview
    function handleImagePreview(event) {
        const input = event.target;
        const file = input.files[0];
        const previewId = input.getAttribute('data-preview');
        const imagePreview = document.getElementById(previewId);

        // Clear any previous preview
        imagePreview.innerHTML = '';

        // Ensure a file is selected and it is an image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = 'No image selected or file type not supported.';
        }
    }

    // Attach event listeners to all file inputs with the class 'image-input'
    document.querySelectorAll('.image-input').forEach(input => {
        input.addEventListener('change', handleImagePreview);
    });
});



///
//
// for dashboard



//
//
//
//
//for faqs
document.getElementById('toggleAndResetButton').addEventListener('click', function() {
    // Toggle the checkbox
    const checkbox = document.getElementById('clear');
    const add = document.getElementById('add');
    checkbox.checked = !checkbox.checked;

    // Reset the form
    document.getElementById('addform').reset();

    add.checked = !add.checked;
    imagePreview.innerHTML = '';
});

document.getElementById('toggleClose').addEventListener('click', function() {
    // Reset the form
    document.getElementById('addform').reset();
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggleAndResetButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const checkbox = document.getElementById('clear2-' + itemId);
            const add = document.getElementById('edit-' + itemId);
            const form = document.getElementById('editForm-' + itemId);
            let imagePreview = document.getElementById('imagePreview-' + itemId);

            if (checkbox && add && form && imagePreview) {
                checkbox.checked = !checkbox.checked;
                form.reset();
                add.checked = !add.checked;
                imagePreview.innerHTML = '';
            } else {
                console.error('One or more elements not found for item ID:', itemId);
            }
        });
    });

    document.querySelectorAll('.toggleCloseButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const form = document.getElementById('editForm-' + itemId);

            if (form) {
                form.reset();
            } else {
                console.error('Form element not found for item ID:', itemId);
            }
        });
    });

    // Function to handle image preview
    function handleImagePreview(event) {
        const input = event.target;
        const file = input.files[0];
        const previewId = input.getAttribute('data-preview');
        const imagePreview = document.getElementById(previewId);

        // Clear any previous preview
        imagePreview.innerHTML = '';

        // Ensure a file is selected and it is an image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = 'No image selected or file type not supported.';
        }
    }

    // Attach event listeners to all file inputs with the class 'image-input'
    document.querySelectorAll('.image-input').forEach(input => {
        input.addEventListener('change', handleImagePreview);
    });
});



//
//
//
//for records

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggleAndResetButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const checkbox = document.getElementById('clear-' + itemId);
            const open = document.getElementById('open-' + itemId);
            const form = document.getElementById('form-' + itemId);

            if (checkbox && open && form) {
                checkbox.checked = !checkbox.checked;
                form.reset();
                open.checked = !open.checked;
            } else {
                console.error('One or more elements not found for item ID:', itemId);
            }
        });
    });

    document.querySelectorAll('.toggleCloseButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const form = document.getElementById('form-' + itemId);

            if (form) {
                form.reset();
            } else {
                console.error('Form element not found for item ID:', itemId);
            }
        });
    });
});