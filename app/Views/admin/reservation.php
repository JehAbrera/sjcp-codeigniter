<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="archive" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Reservation</span>
    </div>
    <div class=" flex justify-between items-center">
        <div class="flex py-4">

            <button onclick="location.href='/admin/reservations/status/Pending'" class="btn">Pending</button>
            <button onclick="location.href='/admin/reservations/status/Accepted'" class="btn">Accepted</button>
            <button onclick="location.href='/admin/reservations/status/Completed'" class="btn">Completed</button>
            <button onclick="location.href='/admin/reservations/status/Declined'" class="btn">Declined</button>
            <button onclick="location.href='/admin/reservations/status/Canceled'" class="btn">Canceled</button>

        </div>
    </div>
    <section role="table-area" class=" flex flex-col">
        <table class=" table table-zebra bg-white table-fixed w-full text-center shadow-lg">
            <thead>
                <tr class=" border-b-slate-900">
                    <th class="text-left">Reference #</th>
                    <th class="text-left">Name</th>
                    <th class="text-left" colspan="2">Email</th>
                    <th class="text-left">Date</th>
                    <th class="text-left">Time of Reservation</th>
                    <th class="text-left">Reservation</th>
                    <th class="text-left">Status</th>
                    <th class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($reservations)) { ?>
                    <tr>
                        <td colspan="4" class=" text-center">No Records Found!</td>
                    </tr>
                <?php } else {
                    foreach ($reservations as $res) { ?>
                        <tr>
                            <td class=" py-1 text-left"><?= $res['refN'] ?></td>
                            <td class=" py-1 text-left"><?= $res['name'] ?></td>
                            <td colspan="2" class=" py-1 text-left"><?= $res['email'] ?></td>
                            <td class=" py-1 text-left"><?= date('F d, Y', strtotime($res['apDate'])) ?></td>
                            <td class=" py-1 text-left"><?= date('h:i a', strtotime($res['apTime'])) ?></td>
                            <td class=" py-1 text-left"><?= $res['type'] ?></td>
                            <td class=" py-1 text-left"><?= $res['status'] ?></td>

                            <?php
                            $viewArray = [];
                            foreach ($res['det'] as $det) {
                                if ($res['type'] == 'Baptism') {
                                    $viewArray = [
                                        "$type Date" => date('F d, Y', strtotime($det['date'])),
                                        "$type Time" => date('h:i a', strtotime($det['tSt'])),
                                        'Name' => $det['fn'] . " " . $det['mn'] . " " . $det['ln'],
                                        'Gender' => $det['gender'],
                                        'Date of Birth' => $det['dob'],
                                        'Place of Birth' => $det['pob'],
                                        'Address' => $det['addr'],
                                        'Contact' => $det['num'],
                                        "Father's Name" => $det['fatN'],
                                        "Father's Place of Birth" => $det['fatPob'],
                                        "Mother's Name" => $det['motN'],
                                        "Mother's Place of Birth" => $det['motPob'],
                                        "Marriage Type" => $det['mgrTp'],
                                        "Godfather's Name" => $det['gFatN'],
                                        "Godfather's Address" => $det['gFatAd'],
                                        "Godmother's Name" => $det['gMotN'],
                                        "Godmother's Address" => $det['gMotAd'],
                                    ]
                                        ?>
                                <?php } elseif ($res['type'] == 'Wedding') {
                                    $viewArray = [
                                        "$type Date" => date('F d, Y', strtotime($det['date'])),
                                        "$type Time" => date('h:i a', strtotime($det['tSt'])),
                                        "<h3 class='font-bold text-lg'>Groom's Information</h3>" => '',
                                        "Groom's Name" => $det['gFn'] . " " . $det['gMn'] . " " . $det['gLn'],
                                        "Groom's Contact" => $det['gNum'],
                                        "Groom's Date of Birth" => $det['gDob'],
                                        "Groom's Place of Birth" => $det['gPob'],
                                        "Groom's Address" => $det['gAddr'],
                                        "Groom's Father's Name" => $det['gFat'],
                                        "Groom's Mother's Name" => $det['gMot'],
                                        "Groom's Religion" => $det['gRel'],
                                        "<h3 class='font-bold text-lg'>Bride's Information</h3>" => '',
                                        "Bride's Name" => $det['bFn'] . " " . $det['bMn'] . " " . $det['bLn'],
                                        "Bride's Contact" => $det['bNum'],
                                        "Bride's Date of Birth" => $det['bDob'],
                                        "Bride's Place of Birth" => $det['bPob'],
                                        "Bride's Address" => $det['bAddr'],
                                        "Bride's Father's Name" => $det['bFat'],
                                        "Bride's Mother's Name" => $det['bMot'],
                                        "Bride's Religion" => $det['bRel'],
                                    ]
                                        ?>
                                <?php } elseif ($res['type'] == 'Funeral Mass/Blessing') {
                                    $viewArray = [
                                        "$type Date" => date('F d, Y', strtotime($det['date'])),
                                        "$type Time" => date('h:i a', strtotime($det['tSt'])),
                                        'Name' => $det['fn'] . " " . $det['mn'] . " " . $det['ln'],
                                        'Gender' => $det['gender'],
                                        'Date of Death' => $det['dDate'],
                                        'Age' => $det['age'],
                                        'Cause of Death' => $det['dCause'],
                                        'Interment Date' => $det['intDate'],
                                        'Cemetery' => $det['cem'],
                                        "Informant's Name" => $det['infFn'] . " " . $det['infMn'] . " " . $det['infLn'],
                                        'Contact' => $det['num'],
                                        "Address" => $det['addr'],
                                        "Sacrament Received" => $det['sacr'],
                                        "Burial Type" => $det['burial'],
                                    ]
                                        ?>

                                <?php }
                            }
                            ?>

                            <td class=" py-1 flex">
                                <div class="tooltip" data-tip="View">
                                    <label for="view<?= $res['id'] ?>"><i data-lucide="eye" class="bg-zinc-200"></i></label>
                                    <input type="checkbox" id="view<?= $res['id'] ?>" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg"><?= $res['refN'] ?> Details</h3>
                                            <div class=" flex flex-col w-full gap-2">
                                                <?php
                                                foreach ($viewArray as $key => $value) { ?>
                                                    <div class=" form-control w-full items-start">
                                                        <span class=" label-text-alt"><?= $key ?></span>
                                                        <span
                                                            class=" outline outline-1 outline-zinc-300 p-2 rounded w-full"><?= $value ?></span>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="modal-action justify-center fixed top-4 right-10 z-[99]">
                                            <label for="view<?= $res['id'] ?>" class="btn btn-error btn-circle"><i
                                                    data-lucide="X"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <i data-lucide="calendar-check" class="bg-blue-800"></i>
                                <i data-lucide="square-x" class="bg-red-700"></i>
                            </td>

                        <?php }
                } ?>
            </tbody>
        </table>
        <ul class=" join self-center mt-4">
            <?= $pager->links('default', 'front_full') ?>
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