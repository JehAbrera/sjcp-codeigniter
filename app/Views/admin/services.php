<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="blocks" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Services</span>
    </div>
    <div class=" flex justify-between items-center">
        <span class=" badge badge-success badge-outline p-4 font-bold text-2xl">Services List</span>
        <form action="/admin/services/add" id="addform" method="post" enctype="multipart/form-data">
            <label for="add" class=" btn bg-zinc-300"><i data-lucide="plus"></i>&nbsp;Add Services</label>
            <input type="checkbox" id="add" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box max-w-2xl">
                    <h3 class="font-bold text-lg text-center">Add Services</h3>
                    <label for="discard" class="btn btn-error btn-circle fixed top-4 right-4"><i
                            data-lucide="X"></i></label>
                    <div>
                        <div class=" grid grid-cols-3 gap-1">
                            <div class=" col-span-1">
                                <div class=" w-full aspect-square border flex justify-center items-center"
                                    id="imagePreview">

                                </div>
                            </div>
                            <div class=" col-span-2 form-control">
                                <div class=" form-control">
                                    <label for="" class=" label">
                                        <span class=" label-text">Service Name</span>
                                    </label>
                                    <input type="text" name="name" id="" class=" input input-bordered">
                                </div>
                                <div class=" form-control">
                                    <label for="" class=" label">
                                        <span class=" label-text">Upload Image</span>
                                    </label>
                                    <input type="file" name="upload" id="imageInput" class=" file-input file-input-bordered"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class=" form-control">
                                <label for="" class=" label">
                                    <span class=" label-text">Schedule</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="schedule" placeholder="Schedule here"></textarea>
                            </div>
                            <div class=" form-control">
                                <label for="" class=" label">
                                    <span class=" label-text">Requirements</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="req" placeholder="Requirements here"></textarea>
                            </div>
                            <div class=" form-control">
                                <label for="" class=" label">
                                    <span class=" label-text">Notes</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="notes" placeholder="Notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-action justify-center">
                        <label for="clear" class=" btn btn-error btn-outline">Clear</label>
                        <label for="save" class=" btn btn-success">Save</label>
                    </div>
                </div>
            </div>
            <input type="checkbox" id="save" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <div class=" flex justify-center">
                        <i data-lucide="sticky-note" class=" w-16 h-16"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center">Post Service?</h3>
                    <p class="py-4 text-center text-balance">Once posted, the service will be visible to all users.</p>
                    <div class="modal-action justify-center">
                        <label for="save" class="btn btn-error btn-outline">No</label>
                        <button type="submit" class=" btn btn-success">Yes</button>
                    </div>
                </div>
            </div>
            <input type="checkbox" id="clear" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <div class=" flex justify-center">
                        <i data-lucide="circle-x" class=" w-16 h-16"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                    <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                    <div class="modal-action justify-center">
                        <label for="clear" class="btn btn-error btn-outline">No</label>
                        <button type="button" class=" btn btn-success" id="toggleAndResetButton">Yes</button>
                    </div>
                </div>
            </div>
            <input type="checkbox" id="discard" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <div class=" flex justify-center">
                        <i data-lucide="circle-x" class=" w-16 h-16"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                    <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                    <div class="modal-action justify-center">
                        <label for="discard" class="btn btn-error btn-outline">No</label>
                        <button type="button" class=" btn btn-success" id="toggleClose">Yes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section class=" flex flex-col mt-4 gap-4">
        <?php
        if (session()->has('serveSuc')) { ?>
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?= session()->serveSuc ?></span>
            </div>
        <?php }
        if (session()->has('serveErr')) { ?>
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?= session()->serveErr ?></span>
            </div>
        <?php }
        ?>
        <?php foreach ($services as $item) { ?>
            <div class="w-full grid grid-cols-4 p-1 bg-zinc-200 rounded shadow-lg">
                <div class="col-span-3 flex items-center">
                    <span><strong><?= $item['name'] ?></strong></span>
                </div>
                <div class="col-span-1 flex justify-end items-center gap-2">
                    <form action="/admin/services/edit" method="post" id="editForm-<?= $item['id'] ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <label for="edit-<?= $item['id'] ?>" class="btn"><i data-lucide="pen-line"></i></label>
                        <input type="checkbox" id="edit-<?= $item['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box max-w-2xl">
                                <h3 class="font-bold text-lg text-center">Edit Services</h3>
                                <label for="disc-<?= $item['id'] ?>" class="btn btn-error btn-circle fixed top-4 right-4"><i
                                        data-lucide="X"></i></label>
                                <div>
                                    <div class=" grid grid-cols-3 gap-1">
                                        <div class=" col-span-1">
                                            <div class=" w-full aspect-square border flex justify-center items-center"
                                                id="imagePreview">

                                            </div>
                                        </div>
                                        <div class=" col-span-2 form-control">
                                            <div class=" form-control">
                                                <label for="" class=" label">
                                                    <span class=" label-text">Service Name</span>
                                                </label>
                                                <input type="text" name="name" id="" class=" input input-bordered" value="<?= $item['name'] ?>">
                                            </div>
                                            <div class=" form-control">
                                                <label for="" class=" label">
                                                    <span class=" label-text">Upload Image</span>
                                                </label>
                                                <input type="file" name="upload" id="imageInput" class=" file-input file-input-bordered"
                                                    accept="image/*" value="<?= $item['img'] ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class=" form-control">
                                            <label for="" class=" label">
                                                <span class=" label-text">Schedule</span>
                                            </label>
                                            <textarea class="textarea textarea-bordered" name="schedule" placeholder="Schedule here"> <?= $item['schedule'] ?></textarea>
                                        </div>
                                        <div class=" form-control">
                                            <label for="" class=" label">
                                                <span class=" label-text">Requirements</span>
                                            </label>
                                            <textarea class="textarea textarea-bordered" name="req" placeholder="Requirements here"><?= $item['req'] ?></textarea>
                                        </div>
                                        <div class=" form-control">
                                            <label for="" class=" label">
                                                <span class=" label-text">Notes</span>
                                            </label>
                                            <textarea class="textarea textarea-bordered" name="notes" placeholder="Notes"><?= $item['notes'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-action justify-center">
                                    <label for="clear2-<?= $item['id'] ?>" class="btn btn-error btn-outline">Clear</label>
                                    <label for="save2-<?= $item['id'] ?>" class="btn btn-success">Save</label>
                                </div>
                            </div>
                        </div>
                        <input type="checkbox" id="save2-<?= $item['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div class="flex justify-center">
                                    <i data-lucide="sticky-note" class="w-16 h-16"></i>
                                </div>
                                <h3 class="font-bold text-lg text-center">Post Services?</h3>
                                <p class="py-4 text-center text-balance">Once posted, the services will be visible to all users.</p>
                                <div class="modal-action justify-center">
                                    <label for="save2-<?= $item['id'] ?>" class="btn btn-error btn-outline">No</label>
                                    <button type="submit" class="btn btn-success">Yes</button>
                                </div>
                            </div>
                        </div>
                        <input type="checkbox" id="clear2-<?= $item['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div class="flex justify-center">
                                    <i data-lucide="circle-x" class="w-16 h-16"></i>
                                </div>
                                <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                                <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                                <div class="modal-action justify-center">
                                    <label for="clear2-<?= $item['id'] ?>" class="btn btn-error btn-outline">No</label>
                                    <button type="button" class="btn btn-success toggleAndResetButton"
                                        data-id="<?= $item['id'] ?>">Yes</button>
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
                                    <button type="button" class="btn btn-success toggleCloseButton"
                                        data-id="<?= $item['id'] ?>">Yes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <label for="delete-<?= $item['id'] ?>" class="btn"><i data-lucide="trash-2"></i></label>
                    <input type="checkbox" id="delete-<?= $item['id'] ?>" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg text-center">Are you sure you want to delete this service?</h3>
                            <p class="py-4 text-center text-balance">This will delete the services permanently. You cannot undo
                                this action.</p>
                            <form method="post" action="/admin/services/delete" class="modal-action justify-center">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <label for="delete-<?= $item['id'] ?>" class="btn btn-error btn-outline">No</label>
                                <button type="submit" class="btn btn-success">Yes</button>
                            </form>
                        </div>
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
<script src="<?= base_url('./scripts/Admin.js') ?>"></script>
</body>

</html>