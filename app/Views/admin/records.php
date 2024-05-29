<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <?php
    switch ($type) {
            // Change values array depending on event type
        case 'Baptism':
            $view = 'templates/recordforms/baptism';
            $values = [
                'date' => '',
                'time' => '',
                'fn' => '',
                'mn' => '',
                'ln' => '',
                'gender' => '',
                'dob' => '',
                'pob' => '',
                'addr' => '',
                'num' => '',
                'fatN' => '',
                'fatPob' => '',
                'motN' => '',
                'motPob' => '',
                'mrgTp' => '',
                'gFatN' => '',
                'gFatAd' => '',
                'gMotN' => '',
                'gMotAd' => '',
            ];
            break;
        case 'Confirmation':
            $view = 'templates/recordforms/confirmation';
            $values = [
                'date' => '',
                'time' => '',
                'fn' => '',
                'mn' => '',
                'ln' => '',
                'gender' => '',
                'dob' => '',
                'pob' => '',
                'plcBap' => '',
                'datBap' => '',
                'fatN' => '',
                'motN' => '',
                'num' => '',
                'addr' => '',
                'gFatN' => '',
                'gMotN' => '',
            ];
            break;
        case 'Wedding':
            $view = 'templates/recordforms/wedding';
            $values = [
                'date' => '',
                'time' => '',
                'gFn' => '',
                'gMn' => '',
                'gLn' => '',
                'gNum' => '',
                'gDob' => '',
                'gPob' => '',
                'gAddr' => '',
                'gFat' => '',
                'gMot' => '',
                'gRel' => '',
                'bFn' => '',
                'bMn' => '',
                'bLn' => '',
                'bNum' => '',
                'bDob' => '',
                'bPob' => '',
                'bAddr' => '',
                'bFat' => '',
                'bMot' => '',
                'bRel' => '',
            ];
            break;
        case 'Funeral Mass':
            $view = 'templates/recordforms/funeral';
            $values = [
                'date' => '',
                'time' => '',
                'fn' => '',
                'mn' => '',
                'ln' => '',
                'gender' => '',
                'dDate' => '',
                'age' => '',
                'dCause' => '',
                'intDate' => '',
                'cem' => '',
                'infFn' => '',
                'infMn' => '',
                'infLn' => '',
                'num' => '',
                'addr' => '',
                'sacr' => '',
                'burial' => '',
            ];
            break;
    }
    ?>
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="archive" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Records</span>
    </div>
    <div class=" flex justify-between items-center">
        <span class=" badge badge-success badge-outline p-4 font-bold text-2xl"><?= $type ?></span>
        <div class=" flex items-center gap-2">
            <form action="/admin/records/<?= $type ?>/add" method="post" id="form-0">
                <label for="open-0" class=" btn bg-zinc-300"><i data-lucide="plus"></i>&nbsp;Add Record</label>
                <input type="checkbox" id="open-0" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box relative">
                        <h3 class="font-bold text-lg text-center mb-4"><?= $type ?> Form</h3>
                        <!-- Add forms here -->
                        <input type="hidden" name="id" value="0">
                        <?= view($view, $values) ?>
                        <div class=" modal-action justify-center mt-4">
                            <label for="clear-0" class=" btn btn-error btn-outline">Clear</label>
                            <label for="save-0" class=" btn btn-success">Save</label>
                        </div>
                        <label for="disc-0" class="btn btn-error btn-circle fixed top-4 right-4"><i data-lucide="X"></i></label>
                    </div>
                </div>
                <input type="checkbox" id="disc-0" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <div class="flex justify-center">
                            <i data-lucide="circle-x" class="w-16 h-16"></i>
                        </div>
                        <h3 class="font-bold text-lg text-center">Are you sure you want to cancel adding this record?</h3>
                        <p class="py-4 text-center text-balance">Canceling will discard any information entered for this record.</p>
                        <div class="modal-action justify-center">
                            <label for="disc-0" class="btn btn-error btn-outline">No</label>
                            <button type="button" class="btn btn-success toggleCloseButton" data-id="0">Yes</button>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="clear-0" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <div class="flex justify-center">
                            <i data-lucide="circle-x" class="w-16 h-16"></i>
                        </div>
                        <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                        <p class="py-4 text-center text-balance">Your changes will not be saved. Do you want to discard anyway?</p>
                        <div class="modal-action justify-center">
                            <label for="clear-0" class="btn btn-error btn-outline">No</label>
                            <button type="button" class="btn btn-success toggleAndResetButton" data-id="0">Yes</button>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="save-0" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <div class=" flex justify-center">
                            <i data-lucide="search-check" class=" w-16 h-16"></i>
                        </div>
                        <h3 class="font-bold text-lg text-center">Are you sure you want to add this record?</h3>
                        <p class="py-4 text-center text-balance">Adding this record will store the provided information in the system.</p>
                        <div class="modal-action justify-center">
                            <label for="save-0" class="btn btn-error btn-outline">No</label>
                            <button type="submit" class=" btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </form>
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
    <?php
    if (session()->has('recSuc')) { ?>
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= session()->recSuc ?></span>
        </div>
    <?php }
    if (session()->has('recErr')) { ?>
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= session()->recErr ?></span>
        </div>
    <?php }
    ?>
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
        <table class=" table table-zebra bg-white table-fixed w-full text-center shadow-lg">
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
                                ];
                                $values = [
                                    'date' => date('Y-m-d', strtotime($rec['date'])),
                                    'time' => date('H:i', strtotime($rec['time'])),
                                    'fn' => $rec['fn'],
                                    'mn' => $rec['mn'],
                                    'ln' => $rec['ln'],
                                    'gender' => $rec['gender'],
                                    'dob' => $rec['dob'],
                                    'pob' => $rec['pob'],
                                    'addr' => $rec['addr'],
                                    'num' => $rec['num'],
                                    'fatN' => $rec['fatN'],
                                    'fatPob' => $rec['fatPob'],
                                    'motN' => $rec['motN'],
                                    'motPob' => $rec['motPob'],
                                    'mrgTp' => $rec['mrgTp'],
                                    'gFatN' => $rec['gFatN'],
                                    'gFatAd' => $rec['gFatAd'],
                                    'gMotN' => $rec['gMotN'],
                                    'gMotAd' => $rec['gMotAd'],
                                ];
                            ?>
                                <td class=" py-1"><?= $rec['fn'] . ' ' . $rec['ln'] ?></td>
                                <td class=" py-1"><?= date('F d, Y', strtotime($rec['dob'])) ?></td>
                            <?php } elseif ($type == 'Confirmation') {
                                $viewArray = [
                                    "$type Date" => date('F d, Y', strtotime($rec['date'])),
                                    "$type Time" => date('h:i a', strtotime($rec['time'])),
                                    'Name' => $rec['fn'] . " " . $rec['mn'] . " " . $rec['ln'],
                                    'Gender' => $rec['gender'],
                                    'Date of Birth' => $rec['dob'],
                                    'Age' => $rec['age'],
                                    'Place of Birth' => $rec['pob'],
                                    'Place of Baptism' => $rec['plcBap'],
                                    'Date of Baptism' => $rec['datBap'],
                                    "Father's Name" => $rec['fatN'],
                                    "Mother's Name" => $rec['motN'],
                                    'Contact' => $rec['num'],
                                    "Address" => $rec['addr'],
                                    "Godfather's Name" => $rec['gFatN'],
                                    "Godmother's Name" => $rec['gMotN'],
                                ];
                                $values = [
                                    'date' => date('F d, Y', strtotime($rec['date'])),
                                    'time' => date('h:i a', strtotime($rec['time'])),
                                    'fn' => $rec['fn'],
                                    'mn' => $rec['mn'],
                                    'ln' => $rec['ln'],
                                    'gender' => $rec['gender'],
                                    'dob' => $rec['dob'],
                                    'pob' => $rec['pob'],
                                    'plcBap' => $rec['plcBap'],
                                    'datBap' => $rec['datBap'],
                                    'fatN' => $rec['fatN'],
                                    'motN' => $rec['motN'],
                                    'num' => $rec['num'],
                                    'addr' => $rec['addr'],
                                    'gFatN' => $rec['gFatN'],
                                    'gMotN' => $rec['gMotN'],
                                ];
                            ?>
                                <td class=" py-1"><?= $rec['fn'] . ' ' . $rec['ln'] ?></td>
                                <td class=" py-1"><?= date('F d, Y', strtotime($rec['dob'])) ?></td>
                            <?php } elseif ($type == 'Wedding') {
                                $viewArray = [
                                    "$type Date" => date('F d, Y', strtotime($rec['date'])),
                                    "$type Time" => date('h:i a', strtotime($rec['time'])),
                                    "<h3 class='font-bold text-lg'>Groom's Information</h3>" => '',
                                    "Groom's Name" => $rec['gFn'] . " " . $rec['gMn'] . " " . $rec['gLn'],
                                    "Groom's Contact" => $rec['gNum'],
                                    "Groom's Date of Birth" => $rec['gDob'],
                                    "Groom's Place of Birth" => $rec['gPob'],
                                    "Groom's Address" => $rec['gAddr'],
                                    "Groom's Father's Name" => $rec['gFat'],
                                    "Groom's Mother's Name" => $rec['gMot'],
                                    "Groom's Religion" => $rec['gRel'],
                                    "<h3 class='font-bold text-lg'>Bride's Information</h3>" => '',
                                    "Bride's Name" => $rec['bFn'] . " " . $rec['bMn'] . " " . $rec['bLn'],
                                    "Bride's Contact" => $rec['bNum'],
                                    "Bride's Date of Birth" => $rec['bDob'],
                                    "Bride's Place of Birth" => $rec['bPob'],
                                    "Bride's Address" => $rec['bAddr'],
                                    "Bride's Father's Name" => $rec['bFat'],
                                    "Bride's Mother's Name" => $rec['bMot'],
                                    "Bride's Religion" => $rec['bRel'],
                                ];
                                $values = [
                                    'date' => date('F d, Y', strtotime($rec['date'])),
                                    'time' => date('h:i a', strtotime($rec['time'])),
                                    'gFn' => $rec['gFn'],
                                    'gMn' => $rec['gMn'],
                                    'gLn' => $rec['gLn'],
                                    'gNum' => $rec['gNum'],
                                    'gDob' => $rec['gDob'],
                                    'gPob' => $rec['gPob'],
                                    'gAddr' => $rec['gAddr'],
                                    'gFat' => $rec['gFat'],
                                    'gMot' => $rec['gMot'],
                                    'gRel' => $rec['gRel'],
                                    'bFn' => $rec['bFn'],
                                    'bMn' => $rec['bMn'],
                                    'bLn' => $rec['bLn'],
                                    'bNum' => $rec['bNum'],
                                    'bDob' => $rec['bDob'],
                                    'bPob' => $rec['bPob'],
                                    'bAddr' => $rec['bAddr'],
                                    'bFat' => $rec['bFat'],
                                    'bMot' => $rec['bMot'],
                                    'bRel' => $rec['bRel'],
                                ];
                            ?>
                                <td class=" py-1"><?= $rec['gFn'] . ' ' . $rec['gLn'] ?></td>
                                <td class=" py-1"><?= $rec['bFn'] . ' ' . $rec['bLn'] ?></td>
                            <?php } elseif ($type == 'Funeral Mass') {
                                $viewArray = [
                                    "$type Date" => date('F d, Y', strtotime($rec['date'])),
                                    "$type Time" => date('h:i a', strtotime($rec['time'])),
                                    'Name' => $rec['fn'] . " " . $rec['mn'] . " " . $rec['ln'],
                                    'Gender' => $rec['gender'],
                                    'Date of Death' => $rec['dDate'],
                                    'Age' => $rec['age'],
                                    'Cause of Death' => $rec['dCause'],
                                    'Interment Date' => $rec['intDate'],
                                    'Cemetery' => $rec['cem'],
                                    "Informant's Name" => $rec['infFn'] . " " . $rec['infMn'] . " " . $rec['infLn'],
                                    'Contact' => $rec['num'],
                                    "Address" => $rec['addr'],
                                    "Sacrament Received" => $rec['sacr'],
                                    "Burial Type" => $rec['burial'],
                                ];
                                $values = [
                                    'date' => date('F d, Y', strtotime($rec['date'])),
                                    'time' => date('h:i a', strtotime($rec['time'])),
                                    'fn' => $rec['fn'],
                                    'mn' => $rec['mn'],
                                    'ln' => $rec['ln'],
                                    'gender' => $rec['gender'],
                                    'dDate' => $rec['dDate'],
                                    'age' => $rec['age'],
                                    'dCause' => $rec['dCause'],
                                    'intDate' => $rec['intDate'],
                                    'cem' => $rec['cem'],
                                    'infFn' => $rec['infFn'],
                                    'infMn' => $rec['infMn'],
                                    'infLn' => $rec['infLn'],
                                    'num' => $rec['num'],
                                    'addr' => $rec['addr'],
                                    'sacr' => $rec['sacr'],
                                    'burial' => $rec['burial'],
                                ];
                            ?>
                                <td class=" py-1"><?= $rec['fn'] . ' ' . $rec['ln'] ?></td>
                                <td class=" py-1"><?= date('F d, Y', strtotime($rec['dDate'])) ?></td>
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
                                        <div class="modal-action fixed top-4 right-10 z-[99]">
                                            <label for="view<?= $rec['id'] ?>" class="btn btn-error btn-circle"><i data-lucide="X"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tooltip" data-tip="Edit">
                                    <form action="/admin/records/<?= $type ?>/edit" method="post" id="form-<?= $rec['id'] ?>">
                                        <label for="open-<?= $rec['id'] ?>" class="btn bg-zinc-300"><i data-lucide="pen-line"></i></label>
                                        <input type="checkbox" id="open-<?= $rec['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box relative text-left">
                                                <h3 class="font-bold text-lg text-center mb-4"><?= $type ?> Form</h3>
                                                <!-- Add forms here -->
                                                <input type="hidden" name="id" value="<?= $rec['id'] ?>">
                                                <?= view($view, $values) ?>
                                                <div class=" modal-action justify-center mt-4">
                                                    <label for="clear-<?= $rec['id'] ?>" class=" btn btn-error btn-outline">Reset</label>
                                                    <label for="save-<?= $rec['id'] ?>" class=" btn btn-success">Save</label>
                                                </div>
                                                <label for="disc-<?= $rec['id'] ?>" class="btn btn-error btn-circle fixed top-4 right-4"><i data-lucide="X"></i></label>
                                            </div>
                                        </div>
                                        <input type="checkbox" id="disc-<?= $rec['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <div class="flex justify-center">
                                                    <i data-lucide="circle-x" class="w-16 h-16"></i>
                                                </div>
                                                <h3 class="font-bold text-lg text-center">Are you sure you want to cancel editing this record?</h3>
                                                <p class="py-4 text-center text-balance">Canceling will discard any updated information entered for this record.</p>
                                                <div class="modal-action justify-center">
                                                    <label for="disc-<?= $rec['id'] ?>" class="btn btn-error btn-outline">No</label>
                                                    <button type="button" class="btn btn-success toggleCloseButton" data-id="<?= $rec['id'] ?>">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="checkbox" id="clear-<?= $rec['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <div class="flex justify-center">
                                                    <i data-lucide="circle-x" class="w-16 h-16"></i>
                                                </div>
                                                <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                                                <p class="py-4 text-center text-balance">Your changes will not be saved. Do you want to discard anyway?</p>
                                                <div class="modal-action justify-center">
                                                    <label for="clear-<?= $rec['id'] ?>" class="btn btn-error btn-outline">No</label>
                                                    <button type="button" class="btn btn-success toggleAndResetButton" data-id="<?= $rec['id'] ?>">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="checkbox" id="save-<?= $rec['id'] ?>" class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <div class=" flex justify-center">
                                                    <i data-lucide="search-check" class=" w-16 h-16"></i>
                                                </div>
                                                <h3 class="font-bold text-lg text-center">Are you sure you want to save changes?</h3>
                                                <p class="py-4 text-center text-balance">Saving your changes will update the current data and cannot be undone.</p>
                                                <div class="modal-action justify-center">
                                                    <label for="save-<?= $rec['id'] ?>" class="btn btn-error btn-outline">No</label>
                                                    <button type="submit" class=" btn btn-success">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                <?php }
                }
                ?>
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
<script src="<?= base_url('./scripts/Admin.js') ?>"></script>
</body>

</html>