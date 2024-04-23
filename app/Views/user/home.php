<main class=" w-full">
    <section role="timearea" class=" flex flex-col gap-4 py-2 px-4">
        <div class=" flex justify-center">
            <span class=" text-3xl font-semibold">Join us for Church</span>
        </div>
        <div class=" flex flex-col gap-4">
            <div class=" flex flex-col gap-2 items-start">
                <span class=" font-semibold text-xl">Saint John of the Cross Parish</span>
                <p class=" text-start">Monday-Friday 6:00 PM, Saturday 6:00AM, Sunday: Tagalog 6:00 AM, English 7:30 AM, Children's Mass 9:00 AM, Tagalog 4:30 PM, Youth and Young Adult Mass 6:00 PM</p>
            </div>
            <div class=" flex flex-col gap-2 items-end">
                <span class=" font-semibold text-xl">Anticipated Masses</span>
                <p class=" text-end">Saturday: San Pancratio Chapel 5:00PM, Fatima Chapel 6:10PM, San Isidro Chapel 7:15PM, Sunday: Sto. Niño Chapel 5:00PM</p>
            </div>
        </div>
        <div class=" flex justify-center">
            <button type="button" class=" btn bg-slate-950 text-zinc-100">View Live</button>
        </div>
    </section>
    <section role="faq" class=" grid grid-cols-1 md:grid-cols-2 gap-2 bg-slate-950 text-zinc-100">
        <div class=" flex flex-col justify-around px-4">
            <div class=" flex flex-col gap-4">
                <span class=" font-semibold text-xl">Frequently Asked Questions</span>
                <p>Got a question? Check out our Frequently Asked Questions
                    to see if we have an answer to your question!
                </p>
            </div>
            <div>
                <button type="button" class=" btn bg-zinc-100 text-slate-950">FAQs</button>
            </div>
        </div>
        <div class=" flex justify-center items-center">
            <img class=" block w-4/5" src="<?= base_url('./images/faq.png') ?>" alt="image" srcset="">
        </div>
    </section>
    <section role="services" class=" grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-950 bg-zinc-100">
        <div class=" flex justify-center items-center">
            <img class=" block w-4/5" src="<?= base_url('./images/services.png') ?>" alt="image" srcset="">
        </div>
        <div class=" flex flex-col justify-around items-end px-4">
            <div class=" flex flex-col gap-4">
                <span class=" font-semibold text-xl">Services</span>
                <p>View what services we have to offer—and their requirements
                    and other notes—on our Services page.
                </p>
            </div>
            <div>
                <button type="button" class=" btn text-zinc-100 bg-slate-950">Services</button>
            </div>
        </div>
    </section>
    <section role="announcements" class=" grid grid-cols-1 md:grid-cols-2 gap-2 bg-slate-950 text-zinc-100">
        <div class=" flex flex-col justify-around px-4">
            <div class=" flex flex-col gap-4">
                <span class=" font-semibold text-xl">Announcements</span>
                <p>Check out any church events or announcements
                    that we may have on our Announcements page.
                </p>
            </div>
            <div>
                <button type="button" class=" btn bg-zinc-100 text-slate-950">Announcements</button>
            </div>
        </div>
        <div class=" flex justify-center items-center">
            <img class=" block w-4/5" src="<?= base_url('./images/announcement.png') ?>" alt="image" srcset="">
        </div>
    </section>
    <section role="about" class=" grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-950 bg-zinc-100">
        <div class=" flex justify-center items-center">
            <img class=" block w-4/5" src="<?= base_url('./images/events.png') ?>" alt="image" srcset="">
        </div>
        <div class=" flex flex-col justify-around items-end px-4">
            <div class=" flex flex-col gap-4">
                <span class=" font-semibold text-xl">About Us</span>
                <p>Read about our history and staff to learn more regarding
                    SJCP on our About Us page.
                </p>
            </div>
            <div>
                <button type="button" class=" btn text-zinc-100 bg-slate-950">About Us</button>
            </div>
        </div>
    </section>
    <section role="saint"></section>
    <section role="misvis"></section>
</main>