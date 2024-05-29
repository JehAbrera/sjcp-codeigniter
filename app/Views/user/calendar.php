<main class="w-full h-screen flex justify-center items-center">
    <?php
    if ($step == 1) { ?>
        <div class="w-full h-full flex justify-center items-center">
            <div class="card w-2/5 text-center bg-zinc-100 p-9">
                <?= form_open('calendar/step1') ?>
                <div>
                    <p class="mb-4">Step 1 of 2:</p>
                    <b class="card-title">Select an Event to Reserve</b>
                </div>
                <select class="select select-bordered join-item w-full mb-8" name="selectEvent" id="selectEvent"
                    onchange="showdocument()" required>
                    <option disabled selected value="">Select Event</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Baptism">Baptism</option>
                    <option value="Funeral Mass/Blessing">Funeral Mass/Blessing</option>
                    <option value="Mass Intention">Mass Intention</option>
                    <option value="Blessing">Blessing</option>
                    <option value="Document Request">Document Request</option>
                </select>
                <select class="select select-bordered join-item w-full mb-8 hidden" name="selectDocument"
                    id="selectDocument">
                    <option disabled selected value="">Select Document</option>
                    <option value="Baptismal Certificate">Baptismal Certificate</option>
                    <option value="Wedding Certificate">Wedding Certificate</option>
                    <option value="Confirmation Certificate">Confirmation Certificate</option>
                    <option value="Good Moral Certificate">Good Moral Certificate</option>
                    <option value="Permit and No Record">Permit and No Record</option>
                </select>

                <div class="card-actions flex justify-center items-center">
                    <button type="submit" name="next" class="btn btn-success text-zinc-100">Next <i
                            data-lucide="chevron-right"></i></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($step == 2) { ?>
                <!-- for calendar-->
                <div class="lg:w-full md:w-9/12 sm:w-10/12 mx-auto h-screen flex flex-col gap-8 p-10">
                    <div class="w-full">
                <?= form_open('calendar/back') ?>
                        <button type="submit" class=" btn btn-error btn-outline w-fit" name="submit" value="Back"><i
                                data-lucide="chevron-left"></i> Back</button>
                <?= form_close() ?>
                    </div>
                    
                    <div class="w-full">
                        <p>Step 2 of 2:</p>
                        <b class="card-title">Select Date to Reserve</b>
                    </div>
                    <div class="w-full flex gap-8">
                        <div class="w-2/3">
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="flex items-center justify-between px-6 py-3 bg-gray-700">
                                    <button id="prevMonth" class="text-white">Previous</button>
                                    <h2 id="currentMonth" class="text-white"></h2>
                                    <button id="nextMonth" class="text-white">Next</button>
                                </div>
                        <?= form_open('calendar/step3') ?>
                                <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
                                    <!-- Calendar Days Go Here -->
                                </div>
                                <input type="hidden" name="daySelected" id="daySelected" value="<?= session()->get('day') ?>">
                                <input type="hidden" id="event" name="event" value="<?= session()->get('event') ?>">
                                <input type="hidden" name="month" id="month" value="<?= session()->get('month') ?>">
                                <input type="hidden" name="year" id="year" value="<?= session()->get('year') ?>">
                        <?= form_close() ?>
                            </div>
                        </div>
                        <div class="flex flex-col gap-8 w-2/6">
                    <?= form_open('calendar/step4') ?>
                            <div>
                                <b class="card-title">Check available time slots</b>
                            </div>
                            <div class="w-full px-4">
                                <ul class=" flex flex-col w-full gap-2">
                                <?php
                                if (session()->get('isClose') == "true") {
                                    echo "Cannot Schedule Event for this day of the week";
                                } else {
                                    $event = session()->get('event');
                                    if ($event == "Document Request" || $event == "Blessing") { ?>
                                            <input type="radio" id="rdbless" name="avTime" value="" class="hidden peer"
                                                onclick="btnEnable()" required />
                                            <label for="rdbless"
                                                class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-zinc-100 hover:bg-slate-950">
                                                <p><?= session()->get('message') ?></p>
                                            </label>
                                <?php } else if (session()->get('event') == "Wedding" || session()->get('event') == "Baptism" || session()->get('event') == "Funeral Mass/Blessing" || session()->get('event') == "Mass Intention") {
                                        $time = session()->get('try');
                                        $timeArray = explode(',', $time, -1);
                                        if (count($timeArray) != 0) {
                                            foreach ($timeArray as $row) { ?>
                                                        <li>
                                                            <input type="radio" id="<?= $row ?>" name="avTime" value="<?= $row ?>" class="hidden peer"
                                                                onclick="btnEnable()" required />
                                                            <label for="<?= $row ?>"
                                                                class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-zinc-100 hover:bg-slate-950">
                                                                <p><?= date('g:i A', strtotime($row)) ?></p>
                                                            </label>
                                                        </li>
                                        <?php }
                                        } else {
                                            echo "No Available Time Slots";
                                        }
                                    }
                                }
                                ?>
                                </ul>
                            </div>
                            <div class="w-full flex mt-auto">
                                <button type="submit" name="toReserve" class="btn" id="btnReserve" disabled> Reserve Event</button>
                            </div>
                    <?= form_close() ?>
                        </div>
                    </div>

                </div>

    <?php } ?>

</main>
<!-- calling script file for calendar -->
<script src="<?= base_url('./scripts/Calendar.js') ?>"></script>