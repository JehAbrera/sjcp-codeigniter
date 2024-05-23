<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="archive" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Reservation</span>
    </div>
    <div class=" flex justify-between items-center">
        <p class=" text-xl font-semibold">Filter by: </p>
        <div class="flex py-4">
            <button onclick="location.href='/admin/reservations/status/Pending'" class="btn">Pending</button>
            <button onclick="location.href='/admin/reservations/status/Accepted'" class="btn">Accepted</button>
            <button onclick="location.href='/admin/reservations/status/Completed'" class="btn">Completed</button>
            <button onclick="location.href='/admin/reservations/status/Declined'" class="btn">Declined</button>
            <button onclick="location.href='/admin/reservations/status/Canceled'" class="btn">Canceled</button>
        </div>

        <p class=" text-xl font-semibold">Order by: </p>
        <div class="flex py-4">
            <button onclick="location.href='/admin/reservations/status/Pending'" class="btn">Newest</button>
            <button onclick="location.href='/admin/reservations/status/Accepted'" class="btn">Oldes</button>
        </div>
    </div>
    <section role="table-area" class=" flex flex-col">
        <p class=" text-xl font-semibold p-4"><?= $type ?> </p>
        <?php $viewArray = []; ?>
        
        <?php
        if (session()->has('SucMess')) { ?>
            <div class="alert alert-success">
                <?= session()->SucMess ?>
            </div>
            <br>
        <?php }
        ?>
        <table class=" table table-zebra bg-white table-fixed w-full text-center shadow-lg">
            <thead>
                <tr class=" border-b-slate-900">
                    <th class="text-left">Reference #</th>
                    <th class="text-left">Name</th>
                    <th class="text-left" colspan="2">Email</th>
                    <th class="text-left">Date</th>
                    <th class="text-left">Time of Reservation</th>
                    <th class="text-left">Reservation</th>
                    <th colspan="2" class="text-left">Actions</th>
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

                            <?php
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
                                <?php } else if ($res['type'] == 'Wedding') {
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
                                <?php } else if ($res['type'] == 'Funeral Mass/Blessing') {
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

                                <?php } else if ($res['type'] == 'Mass Intention') {
                                    $viewArray = [
                                        "$type Date" => date('F d, Y', strtotime($det['date'])),
                                        "$type Time" => date('h:i a', strtotime($det['time'])),
                                        'Contact Number' => $det['num'],
                                        'Purpose' => $det['purpose'],
                                        'Name/s' => $det['name'],
                                    ]
                                        ?>

                                <?php } else if ($res['type'] == 'Blessing') {
                                    $viewArray = [
                                        "$type Date" => date('F d, Y', strtotime($det['date'])),
                                        'Contact Number' => $det['num'],
                                        'Type' => $det['type'],
                                        'Address' => $det['addr'],
                                    ]
                                        ?>

                                <?php } else if ($res['type'] == 'Document Request') {
                                    $viewArray = [
                                        "$type Date" => date('F d, Y', strtotime($det['date'])),
                                        'Type' => $det['type'],
                                        'Name' => $det['fn'] . " " . $det['mn'] . " " . $det['ln'],
                                        'Date of Birth' => $det['dob'],
                                        "Father's Name" => $det['fatN'],
                                        "Mother's Name" => $det['motN'],
                                        'Contact Number' => $det['num'],
                                        'Purpose' => $det['purp'],
                                        'Address' => $det['addr'],
                                    ]
                                        ?>

                                <?php }
                            }
                            ?>

                            <td colspan="2" class=" py-1 flex">
                                <div class="tooltip" data-tip="View">
                                    <label for="view<?= $res['id'] ?>" class="btn bg-zinc-300"><i data-lucide="eye" class=""></i></label>
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

                                <!-- modal for reason -->
                            <?= form_open('/admin/reservations/update') ?>
                                <?php
                                if ($res['status'] == "Pending" || $res['status'] == "Accepted") { ?>
                                    <div class="tooltip" data-tip="Decline">
                                        <label for="modal_reason<?= $res['id'] ?>" class="btn bg-zinc-300"><i data-lucide="square-x"
                                                class="text-red-500"></i></label>
                                        <input type="checkbox" id="modal_reason<?= $res['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg text-center">Reason</h3>
                                                <p class="py-1 text-center text-sm">Please provide a reason for the cancellation of
                                                    your
                                                    appointment.</p>
                                                <div class="flex flex-col">
                                                    <br>
                                                    <div class="flex">
                                                        <div class="text-left">
                                                            <input type="radio" id="1" name="reason"
                                                                value="Unable to handle the event  " onclick="hideinput()">
                                                            <label for="1">Unable to handle the event</label><br>
                                                            <input type="radio" id="2" name="reason"
                                                                value="Non-compliance with requirements" onclick="hideinput()">
                                                            <label for="2">Non-compliance with requirements</label><br>
                                                            <input type="radio" id="4" name="reason"
                                                                value="Conflict with existing schedule" onclick="hideinput()">
                                                            <label for="4">Conflict with existing schedule</label><br>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="3" name="reason" value="Others"
                                                                onclick="showinput()">
                                                            <label for="3">Others:</label>
                                                            <input type="text" id="otherinput" name="otherinput"
                                                                class="input input-bordered input-sm w-full max-w-xs hidden">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-action justify-center m-1">
                                                    <label for="modal_reason<?= $res['id'] ?>"
                                                        class="btn btn-error btn-outline">Cancel</label>
                                                    <label for="modal_cancel<?= $res['id'] ?>" for
                                                        class="btn btn-succes btn-outline">Send</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <!-- modal for canceling -->
                                <div>
                                    <input type="checkbox" id="modal_cancel<?= $res['id'] ?>" class="modal-toggle" />
                                    <div class="modal" role="dialog">
                                        <div class="modal-box">
                                            <div class="flex justify-center"><i data-lucide="circle-x"
                                                    class="text-center w-16 h-16"></i>
                                            </div>
                                            <h3 class="font-bold text-lg text-center">Are you sure you want to cancel this
                                                reservation?
                                                <?= $res['refN'] ?>
                                            </h3>
                                            <p class="py-1 text-center text-sm">This reservation will be removed and will appear
                                                as
                                                cancelled in
                                                your appointment history.</p>
                                            <div class="modal-action justify-center m-1">
                                                <label for="modal_cancel<?= $res['id'] ?>"
                                                    class="btn btn-error btn-outline">No</label>
                                                <button type="submit" name="submit" value="Decline"
                                                    class="btn btn-success text-white">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?= $res['id'] ?>">
                                <input type="hidden" name="email" value="<?= $res['email'] ?>">
                                <input type="hidden" name="refn" value="<?= $res['refN'] ?>">
                            <?= form_close() ?>


                            <!-- modal for approving the reservation -->
                            <?php
                                if ($res['status'] == "Pending") { ?>
                                    <div class="tooltip" data-tip="Approve">
                                        <label for="modal_approve<?= $res['id'] ?>" class="btn bg-blue-500"><i data-lucide="calendar-check"
                                                class=""></i></label>
                                        <input type="checkbox" id="modal_approve<?= $res['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <div class="flex justify-center"><i data-lucide="circle-check"
                                                        class="text-center w-16 h-16"></i>
                                                </div>
                                                <h3 class="font-bold text-lg text-center">Are you sure you want to Approve this
                                                    reservation?
                                                </h3>
                                                <p class="py-1 text-center text-sm">Accepting the reservation will inform the
                                                    requester
                                                    and the reservation status will be updated accordingly.</p>
                                                <div class="modal-action justify-center m-1">
                                                    <label for="modal_approve<?= $res['id'] ?>"
                                                        class="btn btn-error btn-outline">No</label>
                                                    <?= form_open('/admin/reservations/update') ?>
                                                    <button type="submit" name="submit" value="Approve"
                                                        class="btn btn-success text-white">Yes</button>
                                                    <? form_close() ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                                <!-- modal for complete -->
                            <?= form_open('/admin/reservations/update') ?>
                                <?php
                                if ($res['status'] == "Accepted") { ?>
                                    <div class="tooltip" data-tip="Complete">
                                        <label for="modal_comp<?= $res['id'] ?>" class="btn bg-zinc-300"><i data-lucide="square-check"
                                                class="bg-green-500 text-white"></i></label>
                                        <input type="checkbox" id="modal_comp<?= $res['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <div class="flex justify-center"><i data-lucide="circle-check"
                                                        class="text-center w-16 h-16"></i>
                                                </div>
                                                <h3 class="font-bold text-lg text-center">Are you sure you want to Complete this
                                                    reservation?
                                                </h3>
                                                <p class="py-1 text-center text-sm">Accepting the reservation will inform the
                                                    requester
                                                    and the reservation status will be updated accordingly.</p>
                                                <div class="modal-action justify-center m-1">
                                                    <label for="modal_comp<?= $res['id'] ?>"
                                                        class="btn btn-error btn-outline">No</label>
                                                    <button type="submit" name="submit" value="Complete"
                                                        class="btn btn-success text-white">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <input type="hidden" name="id" value="<?= $res['id'] ?>">
                                <input type="hidden" name="email" value="<?= $res['email'] ?>">
                                <input type="hidden" name="refn" value="<?= $res['refN'] ?>">
                                <?= form_close() ?>
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
<script>
    function showinput(id) {
        var text = document.getElementById('otherinput');
        text.className = "block input input-bordered";
        text.placeholder = "Enter other reason here";
        text.disabled = false;
    }
    function hideinput(id) {
        var text = document.getElementById('otherinput');
        text.className = "hidden";
        text.disabled = true;
    }
</script>
</body>

</html>