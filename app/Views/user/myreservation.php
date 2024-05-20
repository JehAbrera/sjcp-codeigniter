<main class="w-full flex items-center justify-center">
    <section role="container" class=" flex flex-col py-8 w-2/3">
        <div class="flex py-4">

            <?= form_open('myreservation/status') ?>
            <button type="submit" class="btn" name="status" value="Pending">Pending</button>
            <button type="submit" class="btn" name="status" value="Accepted">Accepted</button>
            <button type="submit" class="btn" name="status" value="Completed">Completed</button>
            <button type="submit" class="btn" name="status" value="Declined">Declined</button>
            <button type="submit" class="btn" name="status" value="Canceled">Canceled</button>
            <?= form_close() ?>

        </div>
        <div>
            <b><?= $type ?></b>
        </div>
        <div>
            <?php
            if (empty($reservations)) { ?>
                <div class="bg-zinc-100 w-full p-6 grid grid-cols-2">
                    <p>No Reservations Found</p>
                </div>
            <?php } else {
                print_r($reservations);
                foreach ($reservations as $res) { ?>
                    <div class="bg-zinc-100 w-full p-6 grid grid-cols-2">
                        <div>
                            <b><?= $res['refN'] ?></b>
                            <span class="pl-4 <?= $class ?>"><?= $type ?></span>
                            <p><?= $res['type'] ?></p>
                            <label for="view<?= $res['id'] ?>" class="text-blue-700">View More</label>
                        <div class="text-right pr-10">
                            <p>Date of Event: </p>
                            <p><?= date('F d, Y', strtotime($res['evDate'])) ?></p>
                            <?php
                            if ($type == "Declined" || $type == "Canceled") { ?>
                                <label for="modal_resched<?= $res['id'] ?>" class="text-blue-700">Reschedule</label>
                            <?php } else if ($type == "Pending") { ?>
                                    <label for="modal_cancel<?= $res['id'] ?>" class="text-red-700">Cancel</label>
                            <?php } else {

                            }
                            ?>
                        </div>
                    </div>
                    <br>

                    <?php
                    if ($res['type'] == 'Baptism') {
                        $viewArray = [
                            "$type Date" => date('F d, Y', strtotime($res['date'])),
                            "$type Time" => date('h:i a', strtotime($res['time'])),
                            'Name' => $res['fn'] . " " . $res['mn'] . " " . $res['ln'],
                            'Gender' => $res['gender'],
                            'Date of Birth' => $res['dob'],
                            'Place of Birth' => $res['pob'],
                            'Address' => $res['addr'],
                            'Contact' => $res['num'],
                            "Father's Name" => $res['fatN'],
                            "Place of Birth" => $res['fatPob'],
                            "Mother's Name" => $res['motN'],
                            "Place of Birth" => $res['motPob'],
                            "Marriage Type" => $res['mrgTp'],
                            "Godfather's Name" => $res['gFatN'],
                            "Godfather's Address" => $res['gFatAd'],
                            "Godmother's Name" => $res['gMotN'],
                            "Godmother's Address" => $res['gMotAd'],
                        ]
                            ?>
                        <td class=" py-1"><?= $res['fn'] . ' ' . $res['ln'] ?></td>
                        <td class=" py-1"><?= date('F d, Y', strtotime($res['dob'])) ?></td>
                    <?php } elseif ($res['type'] == 'Confirmation') {
                        $viewArray = [
                            "$type Date" => date('F d, Y', strtotime($res['date'])),
                            "$type Time" => date('h:i a', strtotime($res['time'])),
                            'Name' => $res['fn'] . " " . $res['mn'] . " " . $res['ln'],
                            'Gender' => $res['gender'],
                            'Date of Birth' => $res['dob'],
                            'Age' => $res['age'],
                            'Place of Birth' => $res['pob'],
                            'Place of Baptism' => $res['plcBap'],
                            'Date of Baptism' => $res['datBap'],
                            "Father's Name" => $res['fatN'],
                            "Mother's Name" => $res['motN'],
                            'Contact' => $res['num'],
                            "Address" => $res['addr'],
                            "Godfather's Name" => $res['gFatN'],
                            "Godmother's Name" => $res['gMotN'],
                        ]
                            ?>
                        <td class=" py-1"><?= $res['fn'] . ' ' . $res['ln'] ?></td>
                        <td class=" py-1"><?= date('F d, Y', strtotime($res['dob'])) ?></td>
                    <?php } elseif ($res['type'] == 'Wedding') {
                        $viewArray = [
                            "$type Date" => date('F d, Y', strtotime($res['date'])),
                            "$type Time" => date('h:i a', strtotime($res['time'])),
                            "<h3 class='font-bold text-lg'>Groom's Information</h3>" => '',
                            "Groom's Name" => $res['gFn'] . " " . $rec['gMn'] . " " . $rec['gLn'],
                            "Groom's Contact" => $res['gNum'],
                            "Groom's Date of Birth" => $res['gDob'],
                            "Groom's Place of Birth" => $res['gPob'],
                            "Groom's Address" => $res['gAddr'],
                            "Groom's Father's Name" => $res['gFat'],
                            "Groom's Mother's Name" => $res['gMot'],
                            "Groom's Religion" => $res['gRel'],
                            "<h3 class='font-bold text-lg'>Bride's Information</h3>" => '',
                            "Bride's Name" => $res['bFn'] . " " . $res['bMn'] . " " . $res['bLn'],
                            "Bride's Contact" => $res['bNum'],
                            "Bride's Date of Birth" => $res['bDob'],
                            "Bride's Place of Birth" => $res['bPob'],
                            "Bride's Address" => $res['bAddr'],
                            "Bride's Father's Name" => $res['bFat'],
                            "Bride's Mother's Name" => $res['bMot'],
                            "Bride's Religion" => $res['bRel'],
                        ]
                            ?>
                        <td class=" py-1"><?= $res['gFn'] . ' ' . $res['gLn'] ?></td>
                        <td class=" py-1"><?= $res['bFn'] . ' ' . $res['bLn'] ?></td>
                    <?php } elseif ($res['type'] == 'Funeral Mass/Blessing') {
                        $viewArray = [
                            "$type Date" => date('F d, Y', strtotime($res['date'])),
                            "$type Time" => date('h:i a', strtotime($res['time'])),
                            'Name' => $res['fn'] . " " . $res['mn'] . " " . $res['ln'],
                            'Gender' => $res['gender'],
                            'Date of Death' => $res['dDate'],
                            'Age' => $res['age'],
                            'Cause of Death' => $res['dCause'],
                            'Interment Date' => $res['intDate'],
                            'Cemetery' => $res['cem'],
                            "Informant's Name" => $res['infFn'] . " " . $res['infMn'] . " " . $res['infLn'],
                            'Contact' => $res['num'],
                            "Address" => $res['addr'],
                            "Sacrament Received" => $res['sacr'],
                            "Burial Type" => $res['burial'],
                        ]
                            ?>
                        <td class=" py-1"><?= $res['fn'] . ' ' . $res['ln'] ?></td>
                        <td class=" py-1"><?= date('F d, Y', strtotime($res['dDate'])) ?></td>
                    <?php }
                    ?>

                    <!-- modal for viewing -->
                    <div>
                        <input type="checkbox" id="view<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg text-center">View More here</h3>
                                <p class="py-1 text-center text-sm"> <?= $res['refN'] ?></p>
                            </div>
                            <div class="modal-action justify-center fixed top-4 right-10 z-[99]">
                                <label for="view<?= $res['id'] ?>" class="btn btn-error btn-circle"><i
                                        data-lucide="X"></i></label>
                            </div>
                        </div>
                    </div>

                    <!-- modal for canceling -->
                    <?= form_open('myreservation/cancel') ?>
                    <div>
                        <input type="checkbox" id="modal_cancel<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div><i data-lucide="circle-x" class="text-center text-xl"></i></div>
                                <h3 class="font-bold text-lg text-center">Are you sure you want to cancel this reservation?
                                    <?= $res['refN'] ?></h3>
                                <p class="py-1 text-center text-sm">This reservation will be removed and will appear as
                                    cancelled in
                                    your appointment history.</p>
                                <div class="modal-action justify-center m-1">
                                    <label for="modal_cancel<?= $res['id'] ?>" class="btn btn-error btn-outline">No</label>
                                    <input type="hidden" name="id" value="<?= $res['id'] ?>">
                                    <button type="submit" name="cancel" value="cancel"
                                        class="btn btn-success text-white">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>

                    <!-- modal for rescheduling -->
                    <div>
                        <input type="checkbox" id="modal_resched<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div><i data-lucide="circle-x" class="text-center text-xl"></i></div>
                                <h3 class="font-bold text-lg text-center">Are you sure you want to reschedule this reservation?
                                </h3>
                                <p class="py-1 text-center text-sm">This reservation will be removed and will appear as
                                    cancelled in
                                    your appointment history.</p>
                                <div class="modal-action justify-center m-1">
                                    <label for="modal_resched<?= $res['id'] ?>" class="btn btn-error btn-outline">No</label>
                                    <button type="submit" name="submit" value="submitform"
                                        class="btn btn-success text-white">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>
        <ul class=" join self-center mt-4">
            <?= $pager->links('default', 'front_full') ?>
        </ul>
    </section>
</main>