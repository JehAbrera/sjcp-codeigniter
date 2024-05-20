<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('./CSS/output.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <title><?= esc($title) ?></title>
</head>

<body class=" flex flex-row relative items-stretch h-screen max-h-screen">
    <nav class=" flex flex-1 flex-col items-center p-2 bg-slate-950 text-zinc-100">
        <div class=" flex flex-row items-center justify-center border-b-zinc-100 border-b-2 w-full">
            <img src="<?= base_url('images/logo.png') ?>" alt="logo" class=" block w-24 aspect-square">
            <span class=" text-2xl text-center font-extrabold">SJCP</span>
        </div>
        <ul class=" menu gap-2 mt-8 label-text-alt text-zinc-50">
            <li><a href="/admin/dashboard"><i data-lucide="line-chart"></i>Dashboard</a></li>
            <li>
                <details close>
                    <summary><i data-lucide="blocks"></i>Content Management</summary>
                    <ul>
                        <li><a href="">Announcements</a></li>
                        <li><a href="">General Content</a></li>
                    </ul>
                </details>
            </li>
            <li>
                <details open>
                    <summary><i data-lucide="archive"></i>Records</summary>
                    <ul>
                        <li><a href="/admin/records/Baptism">Baptism</a></li>
                        <li><a href="/admin/records/Confirmation">Confirmation</a></li>
                        <li><a href="/admin/records/Wedding">Wedding</a></li>
                        <li><a href="/admin/records/Funeral%20Mass">Funeral</a></li>
                    </ul>
                </details>
            </li>
            <li><a href=""><i data-lucide="list-todo"></i>Reservations</a></li>
            <li><a onclick="logout.showModal()"><i data-lucide="log-out"></i>Logout</a></li>
        </ul>
        <dialog id="logout" class="modal text-slate-950">
            <div class="modal-box">
                <div class=" flex justify-center">
                    <i data-lucide="log-out" class=" w-16 h-16"></i>
                </div>
                <h3 class="font-bold text-lg text-center">Confirm Logout?</h3>
                <p class="py-4 text-center text-balance">Logging out will require you to sign in again to access your account.</p>
                <div class="modal-action mt-0 justify-center">
                    <form method="dialog">
                        <button class="btn focus:outline-none btn-error btn-outline">No</button>
                    </form>
                    <form action="" method="post" class=" btn btn-success">Yes</form>
                </div>
            </div>
        </dialog>
    </nav>