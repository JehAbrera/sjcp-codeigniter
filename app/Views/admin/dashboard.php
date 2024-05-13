        <!-- Inserted Script for Chart.js -- View details at chartjs.org -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <main class=" flex flex-[4] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950">
            <div class=" flex flex-row items-center gap-2 justify-end">
                <span class=" card shadow-lg p-2 bg-success"><i data-lucide="line-chart" class=" w-8 aspect-square"></i></span>
                <span class=" text-lg font-semibold">Dashboard</span>
            </div>
            <section role="main-area" class=" grid grid-cols-3 mt-4">
                <div class=" col-span-2 flex flex-col gap-4 px-2">
                    <span class=" font-extrabold text-3xl">Statistical Report</span>
                    <span class=" font-bold text-xl">Reservations Overview</span>
                    <div class=" flex justify-stretch gap-4 w-full">
                        <div class=" flex-grow flex flex-row justify-center items-center p-2 gap-2 shadow-lg bg-white rounded-lg">
                            <i data-lucide="calendar-days" class=" h-8 w-8"></i>
                            <div class=" flex flex-col items-start">
                                <span class=" font-semibold text-lg">All</span>
                                <span>sample num</span>
                            </div>
                        </div>
                        <div class=" flex-grow flex flex-row justify-center items-center p-2 gap-2 shadow-lg bg-white rounded-lg">
                            <i data-lucide="calendar-check-2" class=" h-8 w-8"></i>
                            <div class=" flex flex-col items-start">
                                <span class=" font-semibold text-lg">New</span>
                                <span>sample num</span>
                            </div>
                        </div>
                        <div class=" flex-grow flex flex-row justify-center items-center p-2 gap-2 shadow-lg bg-white rounded-lg">
                            <i data-lucide="calendar-plus" class=" h-8 w-8"></i>
                            <div class=" flex flex-col items-start">
                                <span class=" font-semibold text-lg">Today</span>
                                <span>sample num</span>
                            </div>
                        </div>
                    </div>
                    <span class=" font-bold text-xl">Event Statistics</span>
                </div>
                <div class=" col-span-1 flex flex-col gap-4 px-2">
                    <span class=" font-bold text-xl">Today's Events</span>
                    <span class=" font-bold text-xl">Upcoming Events</span>
                </div>
            </section>
        </main>
        <!-- Development version -->
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
        <!-- Production version -->
        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
        </script>
        </body>

        </html>