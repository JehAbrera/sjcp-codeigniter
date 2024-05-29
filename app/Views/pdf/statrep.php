<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('./CSS/output.css') ?>">
    <!-- Inserted Script for Chart.js -- View details at chartjs.org -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <title>Statistics Report</title>
</head>

<body>
    <main class=" w-full flex p-8 items-center flex-col ">
        <h2 class=" text-xl font-bold">Saint John of the Cross Parish – Pembo</h2>
        <h2 class=" text-xl font-bold">Statistical Report</h2>
        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>I. Reservations</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of reservations received</span>
                <span><?= $totRes ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="resChart"></canvas>
            </div>
            <div class=" flex justify-between">
                <span>Total number of reservations accepted</span>
                <span><?= $resAcc ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Total number of reservations completed</span>
                <span><?= $resCom ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Total number of reservations declined</span>
                <span><?= $resDec ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Total number of reservations canceled</span>
                <span><?= $resCan ?></span>
            </div>
            <div class=" w-1/2 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="statusChart"></canvas>
            </div>
            <strong>Breakdown of Declined Reservations:</strong>
            <div class=" flex justify-between">
                <span>Unable to handle the event</span>
                <span><?= $dec1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Non-compliance with requirements</span>
                <span><?= $dec2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Conflict with existing schedule</span>
                <span><?= $dec3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Others</span>
                <span><?= $dec4 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="decChart"></canvas>
            </div>
            <strong>Breakdown of User-Canceled Reservations:</strong>
            <div class=" flex justify-between">
                <span>Change of plans</span>
                <span><?= $can1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Incorrect information submitted</span>
                <span><?= $can2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Conflicting schedules</span>
                <span><?= $can3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Lack of preparation</span>
                <span><?= $can4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Emergency</span>
                <span><?= $can5 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Personal matters</span>
                <span><?= $can6 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="canChart"></canvas>
            </div>
            <strong>Breakdown of Admin-Canceled Reservations:</strong>
            <div class=" flex justify-between">
                <span>Unexpected staff unavailability</span>
                <span><?= $can7 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Wedding banns objection</span>
                <span><?= $can8 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>More urgent event scheduled</span>
                <span><?= $can9 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can2Chart"></canvas>
            </div>
            <div class=" flex justify-between">
                <span>Other reasons</span>
                <span><?= $can10 ?></span>
            </div>
        </section>
        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>II. Baptisms</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of baptisms</span>
                <span><?= $bapT ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of males baptized</span>
                <span><?= $bapM ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of females baptized</span>
                <span><?= $bapF ?></span>
            </div>
        </section>
        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>III. Weddings</span>
        </div>
    </main>
    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        var resData = {
            labels: ["Baptism", "Wedding", "Funeral Mass", "Mass Intention", "Blessing", "Document Request"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $resBap ?>, <?= $resWed ?>, <?= $resFun ?>, <?= $resMas ?>, <?= $resBle ?>, <?= $resDoc ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                ],
                borderWidth: 1
            }]
        };

        var resCont = document.getElementById('resChart').getContext('2d');
        var resChart = new Chart(resCont, {
            type: 'bar',
            data: resData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Distribution of Received Reservations'
                    }
                }
            },
        });

        var statusData = {
            labels: ["Pending", "Accepted", "Completed", "Declined", "Canceled"],
            datasets: [{
                data: [<?= $resPen ?>, <?= $resAcc ?>, <?= $resCom ?>, <?= $resDec ?>, <?= $resCan ?>],
            }]
        };

        var statusCont = document.getElementById('statusChart').getContext('2d');
        var statusChart = new Chart(statusCont, {
            type: 'pie',
            data: statusData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Status Breakdown of Reservations'
                    }
                }
            },
        });

        var decData = {
            labels: ["Unable to handle the event", "Non-compliance with requirements", "Conflict with existing schedule", "Others"],
            datasets: [{
                label: "Declined Reason Tally",
                data: [<?= $dec1 ?>, <?= $dec2 ?>, <?= $dec3 ?>, <?= $dec4 ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderWidth: 1
            }]
        };

        var decCont = document.getElementById('decChart').getContext('2d');
        var decChart = new Chart(decCont, {
            type: 'bar',
            data: decData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Breakdown of Declined Reservations'
                    }
                }
            },
        });

        var canData = {
            labels: ["Change of plans", "Incorrect information submitted", "Conflicting schedules", "Lack of preparation", "Emergency", "Personal matters"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $can1 ?>, <?= $can2 ?>, <?= $can3 ?>, <?= $can4 ?>, <?= $can5 ?>, <?= $can6 ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                ],
                borderWidth: 1
            }]
        };

        var canCont = document.getElementById('canChart').getContext('2d');
        var canChart = new Chart(canCont, {
            type: 'bar',
            data: canData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Breakdown of User-Canceled Reservations'
                    }
                }
            },
        });

        var can2Data = {
            labels: ["Unexpected staff unavailability", "Wedding banns objection", "More urgent event scheduled"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $can7 ?>, <?= $can8 ?>, <?= $can9 ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                ],
                borderWidth: 1
            }]
        };

        var can2Cont = document.getElementById('can2Chart').getContext('2d');
        var can2Chart = new Chart(can2Cont, {
            type: 'bar',
            data: can2Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Breakdown of Admin-Canceled Reservations'
                    }
                }
            },
        });
    </script>
</body>

</html>