<main class="w-full flex items-center justify-center">
    <section role="container" class=" flex flex-col py-8 w-2/3">
        <div class="flex py-4">
            <p>Status: </p>

            <?php //form_open('myreservation/status') ?>
            <button type="submit" value="Pending">Pending</button>
            <button type="submit" value="Accepted">Accepted</button>
            <button type="submit" value="Completed">Completed</button>
            <button type="submit" value="Declined">Declined</button>
            <button type="submit" value="Canceled">Canceled</button>
            <? // form_close() ?>

        </div>
        <div class="bg-zinc-100 w-full p-4 grid grid-cols-2">
            <div>
                <b>SJCP11345678</b>
                <p>Wedding</p>
                <a href="#">View More</a>
            </div>
            <div>
                <p>Date of Event: </p>
                <p>January 04, 2003</p>
                <button name="cancelRes">Cancel</button>
            </div>
        </div>
    </section>
</main>