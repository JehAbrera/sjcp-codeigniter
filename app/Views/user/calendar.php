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
                <select class="select select-bordered join-item w-full mb-8" name="selectEvent" required>
                    <option disabled selected value="">Select Event</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Baptism">Baptism</option>
                    <option value="Funeral">Funeral</option>
                    <option value="Mass Intention">Mass Intention</option>
                    <option value="Blessing">Blessing</option>
                </select>

                <div class="card-actions flex justify-center items-center">
                    <button type="submit" name="next" class="btn btn-success text-zinc-100">Next <i
                            data-lucide="chevron-right"></i></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($step >= 2) { ?>
            <!-- for calendar-->
            <div class="lg:w-full md:w-9/12 sm:w-10/12 mx-auto h-screen flex flex-col gap-8 p-10">
                <div class="w-full">
                <?= form_open('calendar/step2') ?>
                    <button type="submit" class=" btn btn-error btn-outline w-fit" name="submit" value="Back"><i
                            data-lucide="chevron-left"></i> Back</button>
                <?= form_close() ?>
                <?= session()->get('event') ?>
                <?= session()->get('day') ?>
                <?= session()->get('month') ?>
                <?= session()->get('year') ?>
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
                        <?= form_open('calendar/step2') ?>
                            <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
                                <!-- Calendar Days Go Here -->
                            </div>
                            <input type="hidden" name="daySelected" id="daySelected" value="<?= session()->get('day') ?>">
                            <input type="hidden" name="event" value="<?= session()->get('event') ?>">
                            <input type="hidden" name="month" id="month" value="<?= session()->get('month') ?>">
                            <input type="hidden" name="year" id="year" value="<?= session()->get('year') ?>">
                        <?= form_close() ?>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8 w-2/6">
                        <div>
                            <b class="card-title">Check available time slots</b>
                        </div>
                        <div class="w-full px-4">
                            <ul class=" flex flex-col w-full gap-2">
                                <li>
                                    <input type="radio" id="time1" name="avTime" value="9:00 AM" class="hidden peer" onclick="btnEnable()" required />
                                    <label for="time1"
                                        class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer dark:hover:text-black dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-black">
                                        <p>9:00 AM</p>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="time2" name="avTime" value="10:00 AM" class="hidden peer" onclick="btnEnable()">
                                    <label for="time2"
                                        class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer dark:hover:text-black dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-black">
                                        <p>10:00 AM</p>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="time3" name="avTime" value="11:00 AM" class="hidden peer" onclick="btnEnable()">
                                    <label for="time3"
                                        class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer dark:hover:text-black dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-black">
                                        <p>11:00 AM</p>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="time4" name="avTime" value="2:00 PM" class="hidden peer" onclick="btnEnable()">
                                    <label for="time4"
                                        class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer dark:hover:text-black dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-black">
                                        <p>2:00 PM</p>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="time5" name="avTime" value="3:00 PM" class="hidden peer" onclick="btnEnable()">
                                    <label for="time5"
                                        class="inline-flex items-center justify-between w-fit p-1 text-black bg-white rounded-lg cursor-pointer dark:hover:text-black dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-black">
                                        <p>3:00 PM</p>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full flex mt-auto items-end">
                            <button class="btn" id="btnReserve" disabled> Reserve Event</button>
                        </div>
                    </div>
                </div>

            </div>
    <?php } ?>

</main>
<script>

    const selectedday = document.getElementById('daySelected');
    const selectedmonth = document.getElementById('month');
    const selectedyear = document.getElementById('year');
    // Initialize the calendar with the current month and year
    let currentYear = selectedyear.value;
    let currentMonth = selectedmonth.value;
    generateCalendar(currentYear, currentMonth);

    // Event listeners for previous and next month buttons
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentYear, currentMonth);
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentYear, currentMonth);
    });
    // Function to generate the calendar for a specific month and year

    function generateCalendar(year, month) {
        const calendarElement = document.getElementById('calendar');
        const currentMonthElement = document.getElementById('currentMonth');

        // Create a date object for the first day of the specified month
        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Clear the calendar
        calendarElement.innerHTML = '';

        // Set the current month text
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        currentMonthElement.innerText = `${monthNames[month]} ${year}`;
        selectedmonth.value = month;
        selectedyear.value = year;

        // Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
        const firstDayOfWeek = firstDayOfMonth.getDay();

        // Create headers for the days of the week
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        daysOfWeek.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'text-center font-semibold';
            dayElement.innerText = day;
            calendarElement.appendChild(dayElement);
        });

        // Create empty boxes for days before the first day of the month
        for (let i = 0; i < firstDayOfWeek; i++) {
            const emptyDayElement = document.createElement('div');
            calendarElement.appendChild(emptyDayElement);
        }

        // Create boxes for each day of the month
        for (let day = 1; day <= daysInMonth; day++) {
            let dayElement = document.createElement('button');
            dayElement.className = 'text-center py-2 border cursor-pointer text-black bg-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100';
            dayElement.type = 'submit';
            dayElement.name = 'day';
            dayElement.value = day;
            dayElement.innerText = day;

            //to highlight the selected date
            if (year === selectedyear.value && month === selectedmonth.value && day == selectedday.value) {
                dayElement.className = 'text-center py-2 border cursor-pointer text-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 bg-blue-500'; // Add classes for the indicator
            }

            calendarElement.appendChild(dayElement);
        }
    }

    //for enabling the reserve button 
    function btnEnable(){
        let btnReserve = document.getElementById("btnReserve");
        var time = document.getElementsByName("avTime");
        for (var i = 0; i < time.length; i++) {
            var isChecked = false;
            if (time[i].checked) {
                btnReserve.disabled = false;
                btnReserve.className = 'btn btn-success text-zinc-100';
            }
        }
    }

</script>