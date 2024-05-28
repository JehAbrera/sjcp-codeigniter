<main class=" w-full flex-grow flex items-stretch relative">
    <section class=" w-full grid grid-cols-1 md:grid-cols-2 py-4 px-2 md:px-0">
        <div class=" hidden md:flex justify-center items-center">
            <img src="<?= base_url('./images/account.png') ?>" alt="" class=" w-4/5">
        </div>
        <div class=" flex items-center justify-center">
            <div class=" card bg-zinc-100 w-[90%] md:w-4/5">
                <div class=" form-control px-4 py-4">
                    
                </div>
            </div>
        </div>
    </section>
</main>
<script src="<?= base_url('./scripts/Registration.js') ?>"></script>
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