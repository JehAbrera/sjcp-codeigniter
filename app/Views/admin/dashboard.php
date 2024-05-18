        <!-- Inserted Script for Chart.js -- View details at chartjs.org -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950">
            <div class=" flex flex-row items-center gap-2 justify-end">
                <span class=" card shadow-lg p-2 bg-success"><i data-lucide="line-chart" class=" w-8 aspect-square"></i></span>
                <span class=" text-lg font-semibold">Dashboard</span>
            </div>
            <section role="main-area" class=" grid grid-cols-3 mt-4">
                <div class=" col-span-2 flex flex-col gap-4 px-2">
                    <span class=" font-extrabold text-3xl">Statistical Report</span>
                    <span class=" font-bold text-xl">Reservations Overview</span>
                    <div class="stats shadow">

                        <div class="stat">
                            <div class="stat-figure text-primary">
                                <i data-lucide="calendar-days"></i>
                            </div>
                            <div class="stat-title">All Reservations</div>
                            <div class="stat-value"><?= $all ?></div>
                        </div>

                        <div class="stat">
                            <div class="stat-figure text-success">
                                <i data-lucide="calendar-check-2"></i>
                            </div>
                            <div class="stat-title">Last 7 days</div>
                            <div class="stat-value"><?= $week ?></div>
                        </div>

                        <div class="stat">
                            <div class="stat-figure text-secondary">
                                <i data-lucide="calendar-plus"></i>
                            </div>
                            <div class="stat-title">Today</div>
                            <div class="stat-value"><?= $today ?></div>
                        </div>

                    </div>
                    <span class=" font-bold text-xl">Event Statistics</span>
                    <div class=" w-full aspect-video relative bg-white rounded-lg shadow-lg p-2">
                        <canvas class=" w-full h-full absolute inset-0 mx-auto" id="mfChart"></canvas>
                        <select class="select select-primary absolute top-2 left-2">
                            <option disabled selected>Event</option>
                            <option>Baptism</option>
                            <option>Confirmation</option>
                        </select>
                    </div>
                </div>
                <div class=" col-span-1 flex flex-col gap-16 px-2">
                    <div class=" w-full flex flex-col gap-2">
                        <span class=" font-bold text-xl border-b-2">Today's Events</span>
                        <div class=" flex flex-col gap-2 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                        <div class=" flex flex-col gap-2 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                        <div class=" flex flex-col gap-2 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                        <div class=" flex flex-col gap-2 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                    </div>
                    <div class=" w-full flex flex-col gap-2">
                        <span class=" font-bold text-xl border-b-2">Upcoming Events</span>
                        <div class=" flex flex-col gap-1 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Date:&nbsp;</strong>12/25/2025</span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                        <div class=" flex flex-col gap-1 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Date:&nbsp;</strong>12/25/2025</span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                        <div class=" flex flex-col gap-1 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Date:&nbsp;</strong>12/25/2025</span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                        <div class=" flex flex-col gap-1 px-4 py-2 rounded-lg shadow-lg bg-white">
                            <span class=" text-lg"><strong>Event Type</strong></span>
                            <span class=" label-text"><strong>Event Date:&nbsp;</strong>12/25/2025</span>
                            <span class=" label-text"><strong>Event Time:&nbsp;</strong>12:00 am</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Development version -->
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
        <!-- Production version -->
        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();

            var mfData = {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [100, 223],
                }]
            };

            var mfCont = document.getElementById('mfChart').getContext('2d');
            var mfChart = new Chart(mfCont, {
                type: 'pie',
                data: mfData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Gender Tally'
                        }
                    }
                },
            });
        </script>
        </body>

        </html>