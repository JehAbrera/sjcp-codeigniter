<main class="w-full">
    <section role="misvis" class=" flex items-center justify-center py-8 bg-zinc-100">
        <div class=" join join-vertical w-[90%] md:w-6/12 bg-zinc-100 text-black">
            <?php foreach ($faqs as $item) { ?>
                <div class="collapse collapse-arrow join-item">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-medium border-b-2 border-black py-6">
                        <b><?=$item['question']?></b>
                    </div>
                    <div class="collapse-content">
                        <p class=" text-justify pl-8 pt-4 whitespace-pre-line"><?=$item['answer']?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>