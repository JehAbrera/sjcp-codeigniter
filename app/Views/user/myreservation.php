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
                foreach ($reservations as $res) { ?>
                    <div class="bg-zinc-100 w-full p-6 grid grid-cols-2">
                        <div>
                            <b><?= $res['refN'] ?></b>
                            <span class="pl-4 <?= $class ?>"><?= $type ?></span>
                            <p><?= $res['type'] ?></p>
                            <label for="viewmore" class="text-blue-800">View More</label>
                        </div>
                        <div class="text-right pr-10">
                            <p>Date of Event: </p>
                            <p><?= date('F d, Y', strtotime($res['evDate'])) ?></p>
                            <?php
                                if($type == "Declined" || $type == "Canceled"){ ?>
                                    <label for="modal_cancelres" class="text-blue-700">Reschedule</label>
                                <?php } else if($type == "Pending") { ?>
                                    <label for="modal_cancelres" class="text-red-700">Cancel</label>
                                <?php } else {

                                }
                            ?>
                        </div>
                    </div>
                    <br>
                <?php }
            }
            ?>
        </div>
        <div>
            <input type="checkbox" id="viewmore" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <h3 class="font-bold text-lg text-center">View More here</h3>
                    <p class="py-1 text-center text-sm"> Details Here</p>
                    <div class="modal-action justify-center m-1">
                        <label for="viewmore" class="btn btn-error btn-outline">No</label>
                        <button type="submit" name="submit" value="submitform"
                            class="btn btn-success text-white">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>