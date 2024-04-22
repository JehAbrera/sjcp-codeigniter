<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('./CSS/output.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <title><?= esc($title) ?></title>
</head>

<body class=" relative min-h-screen">
    <nav>
        <div id="mainnav" role="main-nav" class=" flex flex-row justify-between bg-slate-950 text-zinc-100 z-30 fixed top-0 left-0 w-full">
            <div class=" flex flex-1 flex-row justify-between items-center p-4 md:p-0 md:ps-4">
                <i data-lucide="menu" class=" block md:hidden cursor-pointer" onclick="toggleSide()"></i>
                <span class=" font-bold">SJCP</span>
            </div>
            <div class=" hidden md:block">
                <ul class=" menu menu-horizontal">
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/">Home</a></li>
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">FAQs</a></li>
                    <li class=" hover:bg-slate-700 hover:rounded-md">
                        <details close>
                            <summary>Services</summary>
                            <ul class=" bg-slate-950">
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">Services</a></li>
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">Reserve Event</a></li>
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">My Reservations</a></li>
                            </ul>
                        </details>
                    </li>
                    <li class=" hover:bg-slate-700 hover:rounded-md">
                        <details close>
                            <summary>Events</summary>
                            <ul class=" bg-slate-950">
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">Announcements</a></li>
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">Available Time Slots</a></li>
                            </ul>
                        </details>
                    </li>
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">About Us</a></li>
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="">Connect With Us</a></li>
                </ul>
            </div>
        </div>
        <div id="sidenav" role="side-nav" class=" hidden flex-col z-40 bg-slate-950 text-zinc-100 py-4 fixed top-0 left-0 w-full h-screen">
            <span class=" self-end pe-4 hover:cursor-pointer" onclick="toggleSide()"><i data-lucide="x"></i></span>
            <ul class=" menu">
                <li><a href="">Home</a></li>
                <li><a href="">FAQs</a></li>
                <li>
                    <details close>
                        <summary>Services</summary>
                        <ul>
                            <li><a href="">Services</a></li>
                            <li><a href="">Reserve Event</a></li>
                            <li><a href="">My Reservations</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details close>
                        <summary>Events</summary>
                        <ul>
                            <li><a href="">Announcements</a></li>
                            <li><a href="">Available Time Slots</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="">About Us</a></li>
                <li><a href="">Connect With Us</a></li>
            </ul>
        </div>
    </nav>
