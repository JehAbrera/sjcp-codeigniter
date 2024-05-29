<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="blocks" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Home</span>
    </div>
    <div class=" flex justify-between items-center">
        <span class=" badge badge-success badge-outline p-4 font-bold text-2xl">Mission & Vision</span>
    </div>
    <section class="flex flex-col mt-4 gap-4">
        <?php foreach ($misvis as $item) { 
                $title = "";
                if($item['title'] == "Mission"){
                    $title = "Mission of the Church";
                } elseif ($item['title'] == "Vision"){
                    $title = "Vision of the Church";
                } else {
                    $title = "Vision of Archdiocese";
                }
            ?>
            <div class="w-full flex flex-col p-1 bg-zinc-200 rounded shadow-lg">
                <div class="col-span-2 flex justify-between items-center">
                    <div>
                        <span><strong><?=$title?></strong></span>
                    </div>
                    <div class="col-span-1 flex justify-end items-center gap-2">
                        <form action="/admin/faqs/edit" method="post" id="editForm-<?=$item['id']?>" enctype="multipart/form-data">
                            <label for="edit-<?= $item['id'] ?>" class="btn"><i data-lucide="pen-line"></i></label>
                            <input type="checkbox" id="edit-<?= $item['id'] ?>" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box max-w-2xl">
                                    <h3 class="font-bold text-lg text-center">Edit <?=$title?></h3>
                                    <label for="disc-<?= $item['id'] ?>" class="btn btn-error btn-circle fixed top-4 right-4"><i data-lucide="X"></i></label>
                                    <div class="gap-1">
                                        <div class="col-span-2 form-control">
                                            <div class="form-control">
                                                <label for="" class="label">
                                                    <span class="label-text"><?=$title?></span>
                                                </label>
                                                <textarea name="content" id="content" class="textarea textarea-bordered textarea-md w-full h-40" name="schedule"> <?= $item['content'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-action justify-center">
                                        <label for="clear-<?= $item['id'] ?>" class="btn btn-error btn-outline">Clear</label>
                                        <label for="save-<?= $item['id'] ?>" class="btn btn-success">Save</label>
                                    </div>
                                </div>
                            </div>
                            <input type="checkbox" id="save-<?= $item['id'] ?>" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box">
                                    <div class="flex justify-center">
                                        <i data-lucide="sticky-note" class="w-16 h-16"></i>
                                    </div>
                                    <h3 class="font-bold text-lg text-center">Post Faqs?</h3>
                                    <p class="py-4 text-center text-balance">Once posted, the details will be visible to all users.</p>
                                    <div class="modal-action justify-center">
                                        <label for="save-<?= $item['id'] ?>" class="btn btn-error btn-outline">No</label>
                                        <button type="submit" class="btn btn-success">Yes</button>
                                    </div>
                                </div>
                            </div>
                            <input type="checkbox" id="clear-<?= $item['id'] ?>" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box">
                                    <div class="flex justify-center">
                                        <i data-lucide="circle-x" class="w-16 h-16"></i>
                                    </div>
                                    <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                                    <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                                    <div class="modal-action justify-center">
                                        <label for="clear-<?=$item['id']?>" class="btn btn-error btn-outline">No</label>
                                        <button type="button" class="btn btn-success toggleAndResetButton" data-id="<?=$item['id']?>">Yes</button>
                                    </div>
                                </div>
                            </div>
                            <input type="checkbox" id="disc-<?= $item['id'] ?>" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box">
                                    <div class="flex justify-center">
                                        <i data-lucide="circle-x" class="w-16 h-16"></i>
                                    </div>
                                    <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                                    <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                                    <div class="modal-action justify-center">
                                        <label for="disc-<?= $item['id'] ?>" class="btn btn-error btn-outline">No</label>
                                        <button type="button" class="btn btn-success toggleCloseButton" data-id="<?= $item['id'] ?>">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</main>
<!-- Development version -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<!-- Production version -->
<script src="https://unpkg.com/lucide@latest"></script>

<script>
    lucide.createIcons();

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
</script>
</body>

</html>