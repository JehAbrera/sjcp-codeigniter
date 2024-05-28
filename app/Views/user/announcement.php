<main class=" w-full">
    <section class=" flex flex-wrap justify-center px-[10%] py-8 bg-zinc-100 gap-12 items-stretch">
    <?php foreach ($announce as $item) { ?>
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure class="aspect-video">
                <img src="<?= base_url('./images/delacruz.png') ?>" alt="announcement 1"
                    class="object-cover w-full h-full" />
            </figure>
            <div class="card-body">
                <h2 class="card-title"><?=$item['title']?></h2>
                <p><?=date('F d, Y', strtotime($item['date']))?> at <?=date('h:i a', strtotime($item['time']))?></p>
                <div class="card-actions justify-end">
                    <label for="modal<?=$item['id']?>" class="btn btn-primary">Learn more</label>
                </div>
            </div>
            <input type="checkbox" id="modal<?=$item['id']?>" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box max-w-[50rem]">
                    <figure class="aspect-video">
                        <img src="<?= base_url('./images/delacruz.png') ?>" alt="announcement 1"
                            class="object-cover w-full h-full" />
                    </figure>
                    <h3 class="font-bold text-lg text-center"> Event: <?=$item['title']?></h3>
                    <div class=" text-justify flex flex-col">
                        <span> <strong>Date &Time:</strong> <?=date('F d, Y', strtotime($item['date']))?> at <?=date('h:i a', strtotime($item['time']))?></span>
                    </div>
                    <div class=" flex flex-col text-justify">
                        <p> <?=$item['descr']?> </p>
                    </div>
                    <div class="modal-action justify-center">
                        <label for="modal<?=$item['id']?>" class="btn btn-outline btn-error">Close</label>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </section>
</main>