<main class=" flex flex-[4.5] flex-col p-4 bg-zinc-100 max-h-screen overflow-auto text-slate-950 gap-4">
    <div class=" flex flex-row items-center gap-2 justify-end">
        <span class=" card shadow-lg p-2 bg-success"><i data-lucide="archive" class=" w-8 aspect-square"></i></span>
        <span class=" text-lg font-semibold">Records</span>
    </div>
    <div class=" flex justify-between items-center">
        <span class=" badge badge-success badge-outline p-4 font-bold text-2xl"><?= $type ?></span>
        <div class=" flex items-center gap-2">
            <label for="addRec" class=" btn bg-zinc-300"><i data-lucide="plus"></i>&nbsp;Add Record</label>
            <input type="checkbox" id="addRec" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box relative">
                    <h3 class="font-bold text-lg text-center mb-4"><?= $type ?> Form</h3>
                    <!-- Add forms here -->
                    <form action="" method="post" class=" w-full flex flex-col gap-2">
                        <input type="hidden" name="type" value="<?= $type ?>">
                        <?php
                        if ($type == 'Baptism') { ?>
                            <label for="">Participant's Name</label>
                            <div class=" w-full grid grid-cols-3 gap-1">
                                <div class=" form-control">
                                    <label class=" label-text-alt" for="">First Name</label>
                                    <input type="text" name="fn" id="" class=" input input-bordered" />
                                </div>
                                <div class=" form-control">
                                    <label class=" label-text-alt" for="">Middle Name</label>
                                    <input type="text" name="mn" id="" class=" input input-bordered" />
                                </div>
                                <div class=" form-control">
                                    <label class=" label-text-alt" for="">Last Name</label>
                                    <input type="text" name="ln" id="" class=" input input-bordered" />
                                </div>
                            </div>
                            <div class=" w-full grid grid-cols-2 gap-1">
                                <div class=" form-control">
                                    <label class=" label-text-alt" for="">Gender</label>
                                    <div class="flex justify-between items-center h-full px-8">
                                        <label class="cursor-pointer">
                                            <input type="radio" id="genderMale" name="gender" value="Male" required />
                                            <span class="label-text">Male</span>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" id="genderFemale" name="gender" value="Female" required />
                                            <span class="label-text">Female</span>
                                        </label>
                                    </div>
                                </div>
                                <div class=" form-control">
                                    <label class=" label-text-alt" for="">Birthdate</label>
                                    <input type="date" name="bday" id="" class=" input input-bordered">
                                </div>
                            </div>
                            <div class=" w-full form-control">
                                <label class=" label-text-alt" for="">Place of Birth</label>
                                <input type="text" name="pob" id="" class=" input input-bordered">
                            </div>
                            <div class=" w-full form-control">
                                <label class=" label-text-alt" for="">Present Address</label>
                                <input type="text" name="addr" id="" class=" input input-bordered">
                            </div>
                            <div class=" w-full grid grid-cols-2 gap-1">
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Father's Name</label>
                                    <input type="text" name="fatN" id="" class=" input input-bordered">
                                </div>
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Father's Birthplace</label>
                                    <input type="text" name="fatPob" id="" class=" input input-bordered">
                                </div>
                            </div>
                            <div class=" w-full grid grid-cols-2 gap-1">
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Mother's Name</label>
                                    <input type="text" name="motN" id="" class=" input input-bordered">
                                </div>
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Mother's Birthplace</label>
                                    <input type="text" name="motPob" id="" class=" input input-bordered">
                                </div>
                            </div>
                            <div class=" w-full grid grid-cols-2 gap-1">
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Parent/Guardian's Contact Number</label>
                                    <input type="text" name="num" id="" class=" input input-bordered">
                                </div>
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Parent's Type of Marriage</label>
                                    <select id="marriage_type" name="marriage_type" class="select select-bordered">
                                        <option value="default" disabled selected hidden></option>
                                        <option value="Catholic Marriage" title="Catholic Marriage = married in church and officiated by a priest">Catholic
                                            Marriage</option>
                                        <option value="Civil Marriage" title="Civil Marriage = married in court and officiated by a lawyer">Civil Marriage
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class=" w-full grid grid-cols-2 gap-1">
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Godfather's Name</label>
                                    <input type="text" name="gfN" id="" class=" input input-bordered">
                                </div>
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Godfather's Address</label>
                                    <input type="text" name="gfAdd" id="" class=" input input-bordered">
                                </div>
                            </div>
                            <div class=" w-full grid grid-cols-2 gap-1">
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Godmother's Name</label>
                                    <input type="text" name="gmN" id="" class=" input input-bordered">
                                </div>
                                <div class=" w-full form-control">
                                    <label class=" label-text-alt" for="">Godmother's Address</label>
                                    <input type="text" name="gmAdd" id="" class=" input input-bordered">
                                </div>
                            </div>
                        <?php } elseif ($type == 'Confirmation') {
                        } elseif ($type == 'Wedding') {
                        } elseif ($type == 'Funeral Mass') {
                        }
                        ?>
                        <div class=" modal-action justify-center mt-0">
                            <button type="reset" class=" btn btn-error btn-outline">Clear</button>
                        </div>
                    </form>
                    <label for="cancelAdd" class="btn btn-error btn-circle fixed top-4 right-4"><i data-lucide="X"></i></label>
                </div>
                <input type="checkbox" id="cancelAdd" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <div class=" flex justify-center">
                            <i data-lucide="circle-x" class=" w-16 h-16"></i>
                        </div>
                        <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                        <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                        <div class="modal-action justify-center mt-0">
                            <label for="cancelAdd" class="btn btn-error btn-outline">No</label>
                            <button class=" btn btn-success" onclick="location.href = '/admin/records/<?= $type ?>'">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
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
                                ]
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
                                ]
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
                                ]
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
                                ]
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