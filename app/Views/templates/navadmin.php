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
            <img src="../images/logo.png" alt="logo" class=" block w-24 aspect-square">
            <span class=" text-2xl text-center font-extrabold">SJCP</span>
        </div>
        <ul class=" menu gap-2 mt-8">
            <li><a href=""><i data-lucide="line-chart"></i>Dashboard</a></li>
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
                <details close>
                    <summary><i data-lucide="archive"></i>Records</summary>
                    <ul>
                        <li><a href="">Baptism</a></li>
                        <li><a href="">Confirmation</a></li>
                        <li><a href="">Wedding</a></li>
                        <li><a href="">Funeral</a></li>
                    </ul>
                </details>
            </li>
            <li><a href=""><i data-lucide="list-todo"></i>Reservations</a></li>
            <li><a onclick="logout.showModal()"><i data-lucide="log-out"></i>Logout</a></li>
        </ul>
        <dialog id="logout" class="modal text-slate-950">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Logout</h3>
                <p class="py-4">Press ESC key or click the button below to close</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn focus:outline-none btn-error btn-outline">No</button>
                    </form>
                    <form action="" method="post" class=" btn btn-success">Yes</form>
                </div>
            </div>
        </dialog>
    </nav>