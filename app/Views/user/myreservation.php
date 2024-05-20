<main class="w-full flex items-center justify-center">
    <section role="container" class=" flex flex-col py-8 w-2/3">
        <div class="flex py-4">

            <button onclick="location.href='/myreservation/status/Pending'" class="btn">Pending</button>
            <button onclick="location.href='/myreservation/status/Accepted'" class="btn">Accepted</button>
            <button onclick="location.href='/myreservation/status/Completed'" class="btn">Completed</button>
            <button onclick="location.href='/myreservation/status/Declined'" class="btn">Declined</button>
            <button onclick="location.href='/myreservation/status/Canceled'" class="btn">Canceled</button>

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
                //print_r($reservations);
                foreach ($reservations as $res) { ?>
                    <div class="bg-zinc-100 w-full p-6 grid grid-cols-2">
                        <div>
                            <b><?= $res['refN'] ?></b>
                            <span class="pl-4 <?= $class ?>"><?= $type ?></span>
                            <p><?= $res['type'] ?></p>
                            <label for="view<?= $res['id'] ?>" class="text-blue-700">View More</label>
                        </div>
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
                        <?php } elseif ($res['type'] == 'Confirmation') {
                            $viewArray = [
                                "$type Date" => date('F d, Y', strtotime($det['date'])),
                                "$type Time" => date('h:i a', strtotime($det['tSt'])),
                                'Name' => $det['fn'] . " " . $det['mn'] . " " . $det['ln'],
                                'Gender' => $det['gender'],
                                'Date of Birth' => $det['dob'],
                                'Age' => $det['age'],
                                'Place of Birth' => $det['pob'],
                                'Place of Baptism' => $det['plcBap'],
                                'Date of Baptism' => $det['datBap'],
                                "Father's Name" => $det['fatN'],
                                "Mother's Name" => $det['motN'],
                                'Contact' => $det['num'],
                                "Address" => $det['addr'],
                                "Godfather's Name" => $det['gFatN'],
                                "Godmother's Name" => $det['gMotN'],
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
                        <?php } elseif ($res['type'] == 'Funeral Mass') {
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




                    <!-- modal for viewing -->
                    <div>
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

                    <!-- modal for canceling -->
                    <?= form_open('myreservation/cancel') ?>
                    <div>
                        <input type="checkbox" id="modal_cancel<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div><i data-lucide="circle-x" class="text-center text-xl"></i></div>
                                <h3 class="font-bold text-lg text-center">Are you sure you want to cancel this reservation?
                                    <?= $res['refN'] ?>
                                </h3>
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