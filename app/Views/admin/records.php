<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="archive" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Records</span>
    </div>
    <div class=" flex justify-between items-center">
        <span class=" badge badge-success badge-outline p-4 font-bold text-2xl"><?= $type ?></span>
        <div class=" flex items-center gap-2">
            <button class=" btn bg-zinc-300"><i data-lucide="plus"></i>&nbsp;Add Record</button>
            <form action="/admin/records/<?= $type ?>" method="post" class="join">
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
    </div>
    <section role="table-area" class=" flex flex-col">
        <?php
        $th = [];
        $viewArray = [];
        if ($type == 'Baptism') {
            $th = ['Date of Baptism', 'Name', 'Date of Birth'];
        } elseif ($type == 'Confirmation') {
            $th = ['Date of Confirmation', 'Name', 'Date of Birth'];
        } elseif ($type == 'Wedding') {
            $th = ['Date of Wedding', "Groom's Name", "Bride's Name"];
        } elseif ($type == 'Funeral Mass') {
            $th = ['Date of Funeral', 'Name', 'Date of Death'];
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
                if (empty($records)) { ?>
                    <tr>
                        <td colspan="4" class=" text-center">No Records Found!</td>
                    </tr>
                    <?php } else {
                    foreach ($records as $rec) { ?>
                        <tr>
                            <td class=" py-1"><?= date('F d, Y', strtotime($rec['date'])) ?></td>
                            <?php
                            if ($type == 'Baptism') {
                                $viewArray = [
                                    "$type Date" => date('F d, Y', strtotime($rec['date'])),
                                    "$type Time" => date('h:i a', strtotime($rec['time'])),
                                    'Name' => $rec['fn'] . " " . $rec['mn'] . " " . $rec['ln'],
                                    'Gender' => $rec['gender'],
                                    'Date of Birth' => $rec['dob'],
                                    'Place of Birth' => $rec['pob'],
                                    'Address' => $rec['addr'],
                                    'Contact' => $rec['num'],
                                    "Father's Name" => $rec['fatN'],
                                    "Place of Birth" => $rec['fatPob'],
                                    "Mother's Name" => $rec['motN'],
                                    "Place of Birth" => $rec['motPob'],
                                    "Marriage Type" => $rec['mrgTp'],
                                    "Godfather's Name" => $rec['gFatN'],
                                    "Godfather's Address" => $rec['gFatAd'],
                                    "Godmother's Name" => $rec['gMotN'],
                                    "Godmother's Address" => $rec['gMotAd'],
                                ]
                            ?>
                                <td class=" py-1"><?= $rec['fn'] . ' ' . $rec['ln'] ?></td>
                                <td class=" py-1"><?= date('F d, Y', strtotime($rec['dob'])) ?></td>
                            <?php } elseif ($type == 'Confirmation') { ?>
                                <td class=" py-1"><?= $rec['fn'] . ' ' . $rec['ln'] ?></td>
                                <td class=" py-1"><?= date('F d, Y', strtotime($rec['dob'])) ?></td>
                            <?php } elseif ($type == 'Wedding') { ?>
                                <td class=" py-1"><?= $rec['gFn'] . ' ' . $rec['gLn'] ?></td>
                                <td class=" py-1"><?= $rec['bFn'] . ' ' . $rec['bLn'] ?></td>
                            <?php } elseif ($type == 'Funeral Mass') { ?>
                                <td class=" py-1"><?= $rec['fn'] . ' ' . $rec['ln'] ?></td>
                                <td class=" py-1"><?= date('F d, Y', strtotime($rec['dod'])) ?></td>
                            <?php }
                            ?>
                            <td class=" py-1">
                                <div class="tooltip" data-tip="View">
                                    <label for="view<?= $rec['id'] ?>" class="btn bg-zinc-300"><i data-lucide="eye"></i></label>
                                    <input type="checkbox" id="view<?= $rec['id'] ?>" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box relative">
                                            <h3 class="font-bold text-lg"><?= $type ?> Details</h3>
                                            <div class=" flex flex-col w-full gap-2">
                                                <?php
                                                foreach ($viewArray as $key => $value) { ?>
                                                    <div class=" form-control w-full items-start">
                                                        <span class=" label-text-alt"><?= $key ?></span>
                                                        <span class=" outline outline-1 outline-zinc-300 p-2 rounded w-full"><?= $value ?></span>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="modal-action justify-center fixed top-4 right-10 z-[99]">
                                            <label for="view<?= $rec['id'] ?>" class="btn btn-error btn-circle"><i data-lucide="X"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tooltip" data-tip="Edit">
                                    <label for="edit<?= $rec['id'] ?>" class="btn bg-zinc-300"><i data-lucide="pen-line"></i></label>
                                    <input type="checkbox" id="edit<?= $rec['id'] ?>" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Hello!</h3>
                                            <p class="py-4">This modal works with a hidden checkbox!</p>
                                            <div class="modal-action justify-center">
                                                <label for="edit<?= $rec['id'] ?>" class="btn btn-error btn-outline">Close!</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
        <ul class=" join self-center mt-4">
            <?= $pager->links() ?>
        </ul>
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