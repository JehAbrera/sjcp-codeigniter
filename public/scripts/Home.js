//
//
//
//

lucide.createIcons();

//for faqs
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggleAndResetButton').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.id;
            const checkbox = document.getElementById('clear-' + itemId);
            const edit = document.getElementById('edit-' + itemId);
            const form = document.getElementById('editForm-' + itemId);

            if (checkbox && add && form) {
                checkbox.checked = !checkbox.checked;
                edit.checked = !edit.checked;
                form.reset();
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