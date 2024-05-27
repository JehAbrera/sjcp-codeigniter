<main class=" w-full">
    <section class=" w-full grid grid-cols-1 md:grid-cols-2 px-[10%] lg:px-[15%] py-8 gap-10 bg-zinc-100">
        <?php foreach ($services as $item) { ?>
            <div class=" flex items-center justify-center">
                <div class=" card bg-base-100 shadow-xl image-full w-full aspect-video">
                    <?php
                        $path = $item['img'];
                    ?>
                    <figure><img src="<?= base_url('./'.$path) ?>" alt="Image" class=" object-cover w-full h-full" /></figure>
                    <label for="modal1" class="card-body items-center justify-center text-center cursor-pointer">
                        <h2 class="card-title"><?=$item['name']?></h2>
                    </label>
                    <input type="checkbox" id="modal1" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box max-w-[50rem]">
                            <h3 class="font-bold text-lg text-center"><?=$item['name']?></h3>
                            <div class=" text-justify flex flex-col">
                                <span><strong>Schedule:</strong></span>
                                <span> <?=$item['schedule']?></span>
                            </div>
                            <div class=" flex flex-col text-justify whitespace-pre-line">
                                <strong>Requirements:</strong>
                                <?=$item['req']?>

                                <strong>Notes:</strong>
                                <?=$item['notes']?>
                            </div>
                            <div class="modal-action justify-center">
                                <label for="modal1" class="btn btn-outline btn-error">Close</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </section>
</main>