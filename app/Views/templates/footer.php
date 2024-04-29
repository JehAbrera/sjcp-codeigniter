        <footer class=" flex flex-col gap-6 md:gap-2 md:flex-row md:items-center justify-between w-full bg-slate-950 text-zinc-100 p-4">
            <div class=" flex flex-col text-sm gap-2">
                <span class=" flex flex-row text-5xl items-center font-extrabold pb-2 border-b-2">
                    <img src="<?= base_url('./images/logo.png') ?>" alt="logo" class=" aspect-square w-32 block">SJCP
                </span>
                <span>Catholic Rectory, 9 Sampaguita St, Taguig, 1642 Kalakhang Maynila</span>
                <span class=" flex flex-row items-center"><i data-lucide="copyright" class=" aspect-square w-3"></i>&nbsp;All rights reserved.</span>
            </div>
            <div class=" flex flex-col gap-4 text-sm">
                <div class=" flex flex-row items-center">
                    <i data-lucide="facebook"></i>
                    <span class=" link link-hover">&nbsp;St. John of the Cross Parish, Barangay Pembo</span>
                </div>
                <div class=" flex flex-row items-center">
                    <i data-lucide="phone"></i>
                    <span>&nbsp;Contact number: 8527-7925</span>
                </div>
                <div class=" flex flex-row items-center">
                    <i data-lucide="printer"></i>
                    <span>&nbsp;Fax: 7799-5429</span>
                </div>
                <div class=" flex flex-row items-center">
                    <i data-lucide="mail"></i>
                    <span>&nbsp;stjohn_ofthecrosspembo@yahoo.com</span>
                </div>
            </div>
        </footer>
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