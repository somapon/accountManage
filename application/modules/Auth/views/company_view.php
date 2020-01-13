<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="voucher-settings">
                    <div class="card-header">
                        <b><i class="icon-check"></i> Company Profile</b>
                        <ul class="nav nav-tabs float-right" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn btn-info btn-sm pull-right" style="margin-top: 0px; margin-left: 1px; color:white;" href="<?=site_url('Auth/company/edit/'.$details->id);?>">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-block p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="basic_info">

                                <!-- MEDITS -->
                                <div class="contaier section">
                                    <div class="row">
                                        <div class="pro_pic">
                                            <div>
                                               <?php if ($details->image != '' && file_exists('./upload/company/' . $details->image)) { ?>
                                                <img src="<?= base_url('upload/company/') . $details->image; ?>"
                                                     alt="Smiley face" height="100" width="100">
                                                <?php } else { ?>
                                                    <img src="<?= base_url('resources/img/no_image.png');?>"
                                                         alt="Smiley face" height="100" width="200">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="other_infos with_gap">
                                            <div class="heding_info"><i class="icon-layers"></i> User Company
                                                Information
                                            </div>
                                            <div class="infos">
                                                <div class="col_1"><i class="icon-eyeglass"></i> Name</div>
                                                <div class="col_2"><?= $details->name; ?></div>
                                            </div>
                                            <div class="infos">
                                                <div class="col_1"><i class="icon-location-pin"></i> Address
                                                </div>
                                                <div class="col_2"><?= $details->address; ?></div>
                                            </div>
                                            <div class="infos">
                                                <div class="col_1"><i class="icon-phone"></i> Contact</div>
                                                <div class="col_2"><?= $details->contact; ?></div>
                                            </div>
                                            <div class="infos">
                                                <div class="col_1"><i class="icon-globe"></i> Web</div>
                                                <div class="col_2"><?= $details->web; ?></div>
                                            </div>
                                            <div class="infos">
                                                <div class="col_1"><i class="icon-globe"></i> Slogan</div>
                                                <div class="col_2"><?= $details->slogan; ?></div>
                                            </div>
                                            <div class="infos">
                                                <div class="col_1"><i class="icon-info"></i> Description</div>
                                                <div class="col_2"><?= $details->description; ?></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>