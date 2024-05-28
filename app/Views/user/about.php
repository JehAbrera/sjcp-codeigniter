<main class="w-full">
    <?php foreach ($about as $item) { ?>
        <section role="history" class="flex flex-col md:flex-col bg-zinc-100 text-black py-2">
            <div class="flex flex-col md:flex-row">
                <?php
                    $path = $item['img'];
                ?>
                <div class=" flex justify-center items-center w-full md:w-2/5">
                    <div class=" flex justify-center items-center w-full md:w-4/5"> 
                        <img class="w-3/5 md:w-1/2" src="<?= base_url('./'.$path) ?>" alt="image" srcset="">
                    </div>
                </div>
                <div class="flex flex-col justify-around items-center md:items-start gap-4 md:gap-0 w-full md:w-1/2 px-8">
                    <div class=" flex flex-col gap-4 items-center md:items-start py-3 md:p-0">
                        <span class=" font-semibold text-xl"><?= $item['title'] ?></span>
                        <p class="text-justify"> <?= $item['des'] ?> </p>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <section role="map" class="flex bg-zinc-100 text-black py-2">
        <div class="flex flex-col p-8 w-full">
            <h2> Map (Google Maps)</h2>
            <div class=" border-2 border-black">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.952147477856!2d121.05812207465668!3d14.544729178442969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c893b4f02ca1%3A0x571d8fe4a87168cf!2s9%20Sampaguita%20St%2C%20Taguig%2C%201218%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1700128810775!5m2!1sen!2sph" height="450" class=" w-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>