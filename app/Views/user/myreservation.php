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
            if (session()->has('SucMess')) { ?>
                <div role="alert" class="alert alert-success label-text-alt p-2 text-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><?= session()->SucMess ?></span>
                </div>
            <?php }
            $viewArray = [];
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
                                    <label for="modal_reason<?= $res['id'] ?>" class="text-red-700">Cancel</label>
                            <?php } else {

                            }
                            ?>
                        </div>
                    </div>
                    <br>

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


                    <!-- modal for reason -->
                    <?= form_open('myreservation/cancel') ?>
                    <div>
                        <input type="checkbox" id="modal_reason<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg text-center">Reason</h3>
                                <p class="py-1 text-center text-sm">Please provide a reason for the cancellation of your
                                    appointment.</p>
                                <div>
                                    <input type="radio" id="1" name="reason" value="Change of plans" onclick="hideinput()">
                                    <label for="1">Change of plans</label><br>
                                    <input type="radio" id="2" name="reason" value="Lack of preparation" onclick="hideinput()">
                                    <label for="2">Lack of preparation</label><br>
                                    <input type="radio" id="3" name="reason" value="Others" onclick="showinput()">
                                    <label for="3">Others:</label>
                                    <input type="radio" id="4" name="reason" value="Incorrect information submitted"
                                        onclick="hideinput()">
                                    <label for="4">Incorrect information submitted</label><br>
                                    <input type="radio" id="5" name="reason" value="Emergency" onclick="hideinput()">
                                    <label for="5">Emergency</label><br>
                                    <input type="radio" id="6" name="reason" value="Conflicting schedules"
                                        onclick="hideinput()">
                                    <label for="6">Conflicting schedules</label>
                                    <input type="radio" id="7" name="reason" value="Personal matters" onclick="hideinput()">
                                    <label for="7">Personal matters</label>
                                    <input type="text" id="otherinput" name="otherinput" class="">
                                </div>
                                <div class="modal-action justify-center m-1">
                                    <label for="modal_reason<?= $res['id'] ?>" class="btn btn-error btn-outline">Cancel</label>
                                    <label for="modal_cancel<?= $res['id'] ?>" for
                                        class="btn btn-succes btn-outline">Send</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal for canceling -->
                    <div>
                        <input type="checkbox" id="modal_cancel<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div class="flex justify-center"><i data-lucide="circle-x" class="text-center w-16 h-16"></i>
                                </div>
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
                                <div class="flex justify-center"><i data-lucide="circle-x" class="text-center w-16 h-16"></i>
                                </div>
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