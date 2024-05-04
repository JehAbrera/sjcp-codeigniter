<main class=" w-full flex-grow flex relative justify-center bg-zinc-300">
    <section class=" w-full max-w-lg bg-zinc-100">
        <div role="profile-nav" class=" grid grid-cols-3 divide-x border-b border-b-slate-950 divide-slate-950 sticky">
            <div class=" flex flex-col items-center py-4 link">
                <span><i data-lucide="settings"></i></span>
                <span class=" text-center label-text">Edit Profile</span>
            </div>
            <div class=" flex flex-col items-center py-4 link">
                <span><i data-lucide="lock"></i></span>
                <span class=" text-center label-text">Change Password</span>
            </div>
            <div class=" flex flex-col items-center py-4 link">
                <span><i data-lucide="trash-2"></i></span>
                <span class=" text-center label-text">Delete Account</span>
            </div>
        </div>
        <div class=" w-full flex flex-col items-center py-6">
            <i data-lucide="circle-user" class="w-1/5 h-auto"></i>
            <span class=" text-xl font-bold">Profile</span>
            <span><?= $info[0] ?></span>
            <span><?= $info[1] ?></span>
            <span><?= $info[2] ?></span>
            <span><?= $info[3] ?></span>
        </div>
    </section>
</main>
<!-- Development version -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<!-- Production version -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    function toggleSide() {
        let sidenav = document.getElementById('sidenav');

        sidenav.classList.toggle('hidden');
        sidenav.classList.toggle('flex');
    }
</script>
</body>

</html>