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
                    <div class=" w-full grid grid-cols-3 gap-2">
                        <div class=" w-full aspect-square relative bg-white rounded-lg shadow-lg p-2">
                            <canvas class=" w-full h-full absolute inset-0 mx-auto" id="bapChart"></canvas>
                        </div>
                        <div class=" w-full aspect-square relative bg-white rounded-lg shadow-lg p-2">
                            <canvas class=" w-full h-full absolute inset-0 mx-auto" id="conChart"></canvas>
                        </div>
                        <div class=" w-full aspect-square relative bg-white rounded-lg shadow-lg p-2">
                            <canvas class=" w-full h-full absolute inset-0 mx-auto" id="wedChart"></canvas>
                        </div>
                    </div>
                    <div class=" w-full flex justify-end">
                        <button class=" btn bg-slate-950 text-white w-fit" id="downloadPdf">Generate Report</button>
                    </div>
                </div>
                <div class=" col-span-1 flex flex-col gap-16 px-2">
                    <div class=" w-full flex flex-col gap-2">
                        <span class=" font-bold text-xl border-b-2">Today's Events</span>
                        <?php
                        if (empty($current)) { ?>
                            <div class=" flex justify-center">
                                <span class=" text-center">No events for today.</span>
                            </div>
                            <?php } else {
                            foreach ($current as $cur) : ?>
                                <div class=" flex flex-col gap-2 px-4 py-2 rounded-lg shadow-lg bg-white">
                                    <span class=" text-lg"><strong><?= esc($cur['type']) ?></strong></span>
                                    <span class=" label-text"><strong>Event Time:&nbsp;</strong><?= date('h:i a', strtotime($cur['evTSt'])) ?></span>
                                </div>
                        <?php endforeach;
                        }
                        ?>
                    </div>
                    <div class=" w-full flex flex-col gap-2">
                        <span class=" font-bold text-xl border-b-2">Upcoming Events</span>
                        <?php
                        if (empty($upcoming)) { ?>
                            <div class=" flex justify-center">
                                <span class=" text-center">No upcoming events.</span>
                            </div>
                            <?php } else {
                            foreach ($upcoming as $up) : ?>
                                <div class=" flex flex-col gap-1 px-4 py-2 rounded-lg shadow-lg bg-white">
                                    <span class=" text-lg"><strong><?= esc($up['type']) ?></strong></span>
                                    <span class=" label-text"><strong>Event Date:&nbsp;</strong><?= date('F d,Y', strtotime($up['evDate'])) ?></span>
                                    <span class=" label-text"><strong>Event Time:&nbsp;</strong><?= date('h:i a', strtotime($up['evTSt'])) ?></span>
                                </div>
                        <?php endforeach;
                        }
                        ?>
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

            var bapData = {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [<?= $bapM ?>, <?= $bapF ?>],
                }]
            };

            var bapCont = document.getElementById('bapChart').getContext('2d');
            var bapChart = new Chart(bapCont, {
                type: 'pie',
                data: bapData,
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Baptism Participants'
                        }
                    }
                },
            });
            var conData = {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [<?= $conM ?>, <?= $conF ?>],
                }]
            };

            var conCont = document.getElementById('conChart').getContext('2d');
            var conChart = new Chart(conCont, {
                type: 'pie',
                data: conData,
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Confirmation Participants'
                        }
                    }
                },
            });
            var wedData = {
                labels: ["Same Religion", "Different Religion"],
                datasets: [{
                    data: [<?= $bapM ?>, <?= $bapF ?>],
                }]
            };

            var wedCont = document.getElementById('wedChart').getContext('2d');
            var wedChart = new Chart(wedCont, {
                type: 'pie',
                data: wedData,
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Wedding Participants'
                        }
                    }
                },
            });

            document.getElementById('downloadPdf').addEventListener('click', function() {
                // Open a new tab or window with the view URL
                window.open('/admin/pdf', '_blank');

                fetch('/admin/stat/download')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.blob(); // Get the response as a blob
                    })
                    .then(blob => {
                        // Create a link element
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = 'StatReport.pdf'; // The filename of the downloaded PDF
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    })
                    .catch(error => console.error('Fetch error:', error));
            });
        </script>
        </body>

        </html>