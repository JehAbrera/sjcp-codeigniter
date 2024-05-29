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
            <div class=" flex justify-between">
                <span>Other reasons</span>
                <span><?= $can10 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can2Chart"></canvas>
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
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can3Chart"></canvas>
            </div>
        </section>
        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>III. Weddings</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of weddings</span>
                <span><?= $w1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of weddings with couples from the same religion</span>
                <span><?= $w2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of weddings with couples from different religions</span>
                <span><?= $w3 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can4Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <strong>Breakdown of groom’s religion:</strong>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Roman Catholic</span>
                <span><?= $g1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Catholic</span>
                <span><?= $g2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Protestant</span>
                <span><?= $g3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Iglesia ni Cristo</span>
                <span><?= $g4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Jehovah's Witness</span>
                <span><?= $g5 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Seventh Day Adventist</span>
                <span><?= $g6 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Islam</span>
                <span><?= $g7 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can5Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <strong>Breakdown of bride’s religion:</strong>
        </div>
        <section class=" py-4 px-12 w-full form-control">
        <div class=" flex justify-between">
                <span>Roman Catholic</span>
                <span><?= $b1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Catholic</span>
                <span><?= $b2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Protestant</span>
                <span><?= $b3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Iglesia ni Cristo</span>
                <span><?= $b4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Jehovah's Witness</span>
                <span><?= $b5 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Seventh Day Adventist</span>
                <span><?= $b6 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Islam</span>
                <span><?= $b7 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can6Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>IV. Funeral</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of funeral masses and blessings</span>
                <span><?= $f1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of funeral masses</span>
                <span><?= $f2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of funeral blessings</span>
                <span><?= $f3 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can7Chart"></canvas>
            </div>
            <div class=" flex justify-between">
                <span>Number of deceased males</span>
                <span><?= $f4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of deceased females</span>
                <span><?= $f5 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can8Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>V. Mass Intention</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of mass intentions</span>
                <span><?= $m1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of mass intention with the purpose: thanksgiving</span>
                <span><?= $m2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of mass intention with the purpose: healing/recovery</span>
                <span><?= $m3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of mass intention with the purpose: special intention</span>
                <span><?= $m4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of mass intention with the purpose: soul</span>
                <span><?= $m5 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can9Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>VI. Blessing</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of blessings</span>
                <span><?= $bl1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of blessings with the purpose: house blessing</span>
                <span><?= $bl2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of blessings with the purpose: car blessing</span>
                <span><?= $bl3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of blessings with the purpose: store blessing</span>
                <span><?= $bl4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of blessings with the purpose: motorcycle blessing</span>
                <span><?= $bl5 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can10Chart"></canvas>
            </div>
        </section>
        
        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>VII. Documents Requests</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of document requests</span>
                <span><?= $d1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of document requests with the request: baptismal certificate</span>
                <span><?= $d2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of document requests with the request: wedding certificate</span>
                <span><?= $d3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of document requests with the request: confirmation certificate</span>
                <span><?= $d4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of document requests with the request: good moral certificate</span>
                <span><?= $d5 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of document requests with the request: permit and no record</span>
                <span><?= $d6 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can11Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>VIII. Registration</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of accounts registered</span>
                <span><?= $r1 ?></span>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>IX. Records</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of records</span>
                <span><?= $re2+$re3+$re4+$re5 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of recorded weddings	</span>
                <span><?= $re2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of recorded baptisms</span>
                <span><?= $re3 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of recorded funeral masses/blessings</span>
                <span><?= $re4 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of recorded confirmations</span>
                <span><?= $re5 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can12Chart"></canvas>
            </div>
        </section>

        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>X. Confirmation</span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span>Total number of confirmations</span>
                <span><?= $c1 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of male confirmands</span>
                <span><?= $c2 ?></span>
            </div>
            <div class=" flex justify-between">
                <span>Number of female confirmands</span>
                <span><?= $c3 ?></span>
            </div>
            <div class=" w-3/5 h-auto mx-auto bg-white rounded-lg p-2">
                <canvas id="can13Chart"></canvas>
            </div>
        </section>
        <!-- Layout
        <div class=" w-full form-control p-2 border-b border-b-slate-950">
            <span>VI. </span>
        </div>
        <section class=" py-4 px-12 w-full form-control">
            <div class=" flex justify-between">
                <span></span>
                <span><?= $resWed ?></span>
            </div>
        </section>
         -->
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

        
        var can3Data = {
            labels: ["Male Baptism", "Female Baptism"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $bapM ?>, <?= $bapF ?>],
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

        var can3Cont = document.getElementById('can3Chart').getContext('2d');
        var can3Chart = new Chart(can3Cont, {
            type: 'pie',
            data: can3Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Gender Breakdown of Baptisms'
                    }
                }
            },
        });


        var can4Data = {
            labels: ["Same Religion", "Different Religion"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $w2 ?>, <?= $w3 ?>],
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

        var can4Cont = document.getElementById('can4Chart').getContext('2d');
        var can4Chart = new Chart(can4Cont, {
            type: 'pie',
            data: can4Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Wedding Couple Religion Breakdown'
                    }
                }
            },
        });

        var can5Data = {
            labels: ["Roman Catholic", "Catholic", "Protestant",'Iglesia ni Cristo', "Jehovah's Witness", "Seventh Day Adventist", "Islam"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $g1 ?>, <?= $g2 ?>, <?= $g3 ?>, <?= $g4 ?>, <?= $g5 ?>, <?= $g6 ?>, <?= $g7 ?>],
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

        var can5Cont = document.getElementById('can5Chart').getContext('2d');
        var can5Chart = new Chart(can5Cont, {
            type: 'bar',
            data: can5Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Religion Breakdown of Grooms'
                    }
                }
            },
        });
        
        var can6Data = {
            labels: ["Roman Catholic", "Catholic", "Protestant",'Iglesia ni Cristo', "Jehovah's Witness", "Seventh Day Adventist", "Islam"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $b1 ?>, <?= $b2 ?>, <?= $b3 ?>, <?= $b4 ?>, <?= $b5 ?>, <?= $b6 ?>, <?= $b7 ?>],
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

        var can6Cont = document.getElementById('can6Chart').getContext('2d');
        var can6Chart = new Chart(can6Cont, {
            type: 'bar',
            data: can6Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Religion Breakdown of Brides'
                    }
                }
            },
        });
        
        var can7Data = {
            labels: ["Funeral Mass", "Funeral Blessing"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $f2 ?>, <?= $f3 ?>],
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

        var can7Cont = document.getElementById('can7Chart').getContext('2d');
        var can7Chart = new Chart(can7Cont, {
            type: 'pie',
            data: can7Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Breakdown of Funeral Mass and Blessing'
                    }
                }
            },
        });


        var can8Data = {
            labels: ["Male", "Female"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $f4 ?>, <?= $f5 ?>],
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

        var can8Cont = document.getElementById('can8Chart').getContext('2d');
        var can8Chart = new Chart(can8Cont, {
            type: 'pie',
            data: can8Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Gender Breakdown of Deceased'
                    }
                }
            },
        });

        var can9Data = {
            labels: ["thanksgiving", "healing/recovery", "special intention", "soul"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $m2 ?>, <?= $m3 ?>, <?= $m4 ?>, <?= $m5 ?>],
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

        var can9Cont = document.getElementById('can9Chart').getContext('2d');
        var can9Chart = new Chart(can9Cont, {
            type: 'pie',
            data: can9Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Mass Intention Purpose Breakdown'
                    }
                }
            },
        });


        var can10Data = {
            labels: ["house blessing", "car blessing", "store blessing", "motorcycle blessing"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $bl2 ?>, <?= $bl3 ?>, <?= $bl4 ?>, <?= $bl5 ?>],
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

        var can10Cont = document.getElementById('can10Chart').getContext('2d');
        var can10Chart = new Chart(can10Cont, {
            type: 'pie',
            data: can10Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Blessing Purpose Breakdown'
                    }
                }
            },
        });


        var can11Data = {
            labels: ["baptismal certificate", "wedding certificate", "confirmation certificate", "good moral certificate","permit and no record"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $d2 ?>, <?= $d3 ?>, <?= $d4 ?>, <?= $d5 ?>, <?= $d6 ?>],
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

        var can11Cont = document.getElementById('can11Chart').getContext('2d');
        var can11Chart = new Chart(can11Cont, {
            type: 'bar',
            data: can11Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Document Request Breakdown'
                    }
                }
            },
        });


        var can12Data = {
            labels: ["weddings", "baptisms", "funeral masses/blessings", "confirmations	"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $re2 ?>, <?= $re3 ?>, <?= $re4 ?>, <?= $re5 ?>],
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

        var can12Cont = document.getElementById('can12Chart').getContext('2d');
        var can12Chart = new Chart(can12Cont, {
            type: 'pie',
            data: can12Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Event Distribution of Saved Records'
                    }
                }
            },
        });
        

        var can13Data = {
            labels: ["Male", "Female"],
            datasets: [{
                label: "Reservation Tally",
                data: [<?= $c2 ?>, <?= $c3 ?>],
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

        var can13Cont = document.getElementById('can13Chart').getContext('2d');
        var can13Chart = new Chart(can13Cont, {
            type: 'pie',
            data: can13Data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Gender Breakdown of Confirmands'
                    }
                }
            },
        });
    </script>
</body>

</html>