<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./CSS/output.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <title><?= esc($title) ?></title>
</head>

<body class=" relative min-h-screen flex flex-col">
    <nav class=" sticky top-0 w-full z-50">
        <div id="mainnav" role="main-nav" class=" flex flex-row justify-between bg-slate-950 text-zinc-100 z-30 w-full">
            <div class=" flex flex-1 flex-row justify-between items-center p-4 md:p-0 md:ps-4">
                <i data-lucide="menu" class=" block md:hidden cursor-pointer" onclick="toggleSide()"></i>
                <span class=" font-bold">SJCP</span>
            </div>
            <div class=" hidden md:block">
                <ul class=" menu menu-horizontal">
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/">Home</a></li>
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/faqs">FAQs</a></li>
                    <li class=" hover:bg-slate-700 hover:rounded-md">
                        <details close>
                            <summary>Services</summary>
                            <ul class=" bg-slate-950">
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/services">Services</a></li>
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/reserve">Reserve Event</a></li>
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/myreservation">My Reservations</a></li>
                            </ul>
                        </details>
                    </li>
                    <li class=" hover:bg-slate-700 hover:rounded-md">
                        <details close>
                            <summary>Events</summary>
                            <ul class=" bg-slate-950">
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/announcement">Announcements</a></li>
                                <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/calendar/index">Available Time Slots</a></li>
                            </ul>
                        </details>
                    </li>
                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/about">About Us</a></li>
                    <?php
                    if (!session()->has('isLogged') || session()->has('isLogged') && !session()->isLogged) { ?>
                        <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/account/login">Connect With Us</a></li>
                    <?php } else { ?>
                        <li class=" hover:bg-slate-700 hover:rounded-md">
                            <details close>
                                <summary><i data-lucide="circle-user"></i>Profile</summary>
                                <ul class=" bg-slate-950">
                                    <li class=" hover:bg-slate-700 hover:rounded-md"><a href="/user/profile">My Profile</a></li>
                                    <li class=" hover:bg-slate-700 hover:rounded-md"><label for="logoutModal">Logout</label></li>
                                </ul>
                            </details>
                        </li>
                    <?php }
                    ?>
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
        <input type="checkbox" id="logoutModal" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box gap-2">
                <div class=" flex justify-center">
                    <i data-lucide="log-out" class=" w-16 h-16"></i>
                </div>
                <h3 class="font-bold text-lg text-center">Confirm Logout?</h3>
                <p class="py-4 text-center text-balance">Logging out will require you to sign in again to access your account.</p>
                <div class="modal-action mt-0 justify-center">
                    <label for="logoutModal" class="btn btn-error btn-outline">No</label>
                    <button class=" btn btn-success" onclick="location.href = '/logout'">Yes</button>
                </div>
            </div>
        </div>
    </nav>