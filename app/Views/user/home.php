<main class=" w-full">
    <section role="timearea" class=" flex flex-col gap-4 py-2 px-4 bg-zinc-100">
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
    <section role="faq" class=" grid grid-cols-1 md:grid-cols-2 gap-2 bg-slate-950 text-zinc-100 py-2">
        <div class=" flex flex-col justify-around px-4 items-center md:items-start gap-4 md:gap-0">
            <div class=" flex flex-col gap-4 items-center md:items-start py-3 md:p-0">
                <span class=" font-semibold text-xl">Frequently Asked Questions</span>
                <p class=" text-center md:text-left">
                    Got a question? Check out our Frequently Asked Questions
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
    <section role="services" class=" grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-950 bg-zinc-100 py-2">
        <div class=" flex justify-center items-center">
            <img class=" block w-4/5" src="<?= base_url('./images/services.png') ?>" alt="image" srcset="">
        </div>
        <div class=" flex flex-col justify-around px-4 items-center md:items-end gap-4 md:gap-0">
            <div class=" flex flex-col gap-4 items-center md:items-start py-3 md:p-0">
                <span class=" font-semibold text-xl">Services</span>
                <p class=" text-center md:text-left">
                    View what services we have to offer—and their requirements
                    and other notes—on our Services page.
                </p>
            </div>
            <div>
                <button type="button" class=" btn text-zinc-100 bg-slate-950">Services</button>
            </div>
        </div>
    </section>
    <section role="announcements" class=" grid grid-cols-1 md:grid-cols-2 gap-2 bg-slate-950 text-zinc-100 py-2">
        <div class=" flex flex-col justify-around px-4 items-center md:items-start gap-4 md:gap-0">
            <div class=" flex flex-col gap-4 items-center md:items-start py-3 md:p-0">
                <span class=" font-semibold text-xl">Announcements</span>
                <p class=" text-center md:text-left">
                    Check out any church events or announcements
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
    <section role="about" class=" grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-950 bg-zinc-100 py-2">
        <div class=" flex justify-center items-center">
            <img class=" block w-4/5" src="<?= base_url('./images/events.png') ?>" alt="image" srcset="">
        </div>
        <div class=" flex flex-col justify-around items-center md:items-end gap-4 md:gap-0 px-4">
            <div class=" flex flex-col gap-4 items-center md:items-start py-3 md:p-0">
                <span class=" font-semibold text-xl">About Us</span>
                <p class=" text-center md:text-left">
                    Read about our history and staff to learn more regarding
                    SJCP on our About Us page.
                </p>
            </div>
            <div>
                <button type="button" class=" btn text-zinc-100 bg-slate-950">About Us</button>
            </div>
        </div>
    </section>
    <section role="saint" class=" grid grid-cols-1 md:grid-cols-2 bg-slate-950 text-zinc-100">
        <div class=" flex justify-center items-center mt-2 md:mt-0">
            <img src="<?= base_url("./images/delacruz.png") ?>" alt="image" srcset="" class=" block w-full h-full">
        </div>
        <div class=" flex flex-col gap-2 p-4 justify-center">
            <span class=" font-semibold text-xl">St. John of the Cross</span>
            <p class=" text-justify text-xs lg:text-base">
                St. John of the Cross, born as Juan de Yepes y Álvarez, was a Roman Catholic saint who was a major 
                figure of the Counter-Reformation. He was also a renowned mystic and a Carmelite friar who is considered, 
                along with Saint Teresa of Ávila, as a founder of the Discalced Carmelites. Born into a family of descendents 
                of Jewish converts to Christianity, John endured a very difficult childhood. He lost his father early on in 
                his life and grew up in abject poverty. John was sent to a school for poor children where he studied Christian 
                doctrine and also served as acolyte at a nearby monastery of Augustinian nuns. On growing up he studied the 
                humanities at a Jesuit school and went on to enter the Carmelite Order, adopting the name John of St. Matthias. 
                He was eventually ordained a priest. The celebrated mystic, St. Teresa of Ávila solicited his help in the restoration 
                of Carmelite life to its original observance of austerity, and together they became the founders of the Discalced 
                Carmelites. St. John was also a poet and holds an important position in Spanish literature.
            </p>
        </div>
    </section>
    <section role="misvis" class=" flex items-center justify-center py-8 bg-zinc-100">
        <div class=" join join-vertical w-[90%] md:w-3/5 bg-slate-950 text-zinc-100">
            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Mission of the Parish
                </div>
                <div class="collapse-content">
                    <p class=" text-justify">
                        People of faith who received God's calling to the Parish of St. John of the Cross, serve to achieve the following:
                        (1) Continuous study of the Word of God, live it and spread it in modern evangelization to be an example to others towards the kingdom of God in the context of the Small Christian Community.
                        (2) Let the will of God be fulfilled to all by proper teaching, doing, administering and promoting all the parish programs.
                        (3) Strengthen the good relationship between the Church, the community, and various Organizations in society in order to provide proper service, and meet the needs of the people, especially the poor.
                        (4) Continue the renovation and upgrading of the church and chapels by having modern facilities that are tailored to the needs of the members of the Parish of St. John of the Cross.
                    </p>
                </div>
            </div>
            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Vision of the Archdiocese
                </div>
                <div class="collapse-content">
                    <p class=" text-justify">
                        A country called by the Father to Jesus Christ to be a community of people with life events. Witnessing the reign of God living the Paschal Mystery in the power of the Holy Spirit along with the Blessed Mother, the Virgin Mary.
                    </p>
                </div>
            </div>
            <div class="collapse collapse-arrow join-item border border-base-300">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Vision of the Parish
                </div>
                <div class="collapse-content">
                    <p class=" text-justify">
                        A faithful Christian community called by the Father, in communion with Jesus Christ and guided by the Holy Spirit to become a model of love for the word and deed rooted in deep faith, continually shaped by Christian wisdom, and spreading the word of God in modern evangelization. A community thriving in all aspects of life, actively engaging with society towards the fulfillment of life with the help of Mother Mary and San Juan de la Cruz.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>