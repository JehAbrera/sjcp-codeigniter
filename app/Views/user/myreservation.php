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
                            <label for="view<?= $res['id'] ?>" class="text-blue-800">View More</label>
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
                    <div>
                        <input type="checkbox" id="modal_cancel<?= $res['id'] ?>" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <div><i data-lucide="circle-x" class="text-center text-xl"></i></div>
                                <h3 class="font-bold text-lg text-center">Are you sure you want to cancel this reservation?</h3>
                                <p class="py-1 text-center text-sm">This reservation will be removed and will appear as
                                    cancelled in
                                    your appointment history.</p>
                                <div class="modal-action justify-center m-1">
                                    <label for="modal_cancel<?= $res['id'] ?>" class="btn btn-error btn-outline">No</label>
                                    <button type="submit" name="submit" value="submitform"
                                        class="btn btn-success text-white">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
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