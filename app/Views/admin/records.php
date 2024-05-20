<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="archive" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Records</span>
    </div>
    <div class=" flex justify-between items-center">
        <span class=" badge badge-success badge-outline p-4 font-bold text-2xl"><?= $type ?></span>
        <form action="" method="post" class="join">
            <div>
                <div>
                    <input class="input input-bordered join-item" name="name" placeholder="Search Name" />
                </div>
            </div>
            <div class="indicator">
                <button class="btn btn-success join-item" type="submit">Search</button>
            </div>
        </form>
    </div>
    <section role="table-area">
        <?php
            $th = [];
            if ($type == 'Baptism') {
                $th = ['Date of Baptism', 'Date of Birth', 'Name'];
            } elseif ($type == 'Confirmation') {
                $th = ['Date of Confirmation', 'Date of Birth', 'Name'];
            } elseif ($type == 'Wedding') {
                $th = ['Date of Wedding', "Groom's Name", "Bride's Name"];
            } elseif ($type == 'Funeral Mass') {
                $th = ['Date of Funeral', 'Date of Death', 'Name'];
            }
        ?>
        <table class=" table table-zebra bg-white table-fixed w-full text-center border shadow-lg">
            <thead>
                <tr class=" border-b-slate-900">
                    <th><?= $th[0] ?></th>
                    <th><?= $th[1] ?></th>
                    <th><?= $th[2] ?></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    print_r($records);
                    if (empty($records)) { ?>
                        <tr>
                            <td colspan="4" class=" text-center">No Records Found!</td>
                        </tr>
                    <?php } else {
                        foreach ($records as $rec) { ?>
                            <tr>
                                <td><?= date('F d, Y', strtotime($rec['date'])) ?></td>
                                <?php
                                    if ($type == 'Baptism') {
                                        
                                    } elseif ($type == 'Confirmation') {
                                        
                                    } elseif ($type == 'Wedding') {
                                        
                                    } elseif ($type == 'Funeral Mass') {
                                        
                                    }
                                ?> 
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php }
                    }
                ?>
            </tbody>
        </table>
        <?= $pager->links() ?>
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