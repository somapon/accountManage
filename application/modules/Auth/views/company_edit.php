<div class="container-fluid">

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Company
                        <?php if ($user_group_name[0]->name=='admin') { ?>
                            <a class="btn btn-outline-success btn-sm pull-right"
                               href="<?= site_url('Auth/company'); ?>"><i class="fa fa-align-justify fa-sm "></i> </a>
                        <?php } ?>
                        &nbsp;
                        <?php if ($this->session->flashdata('update_message')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('update_message'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <form action="<?= site_url('Auth/company/edit/' . $id); ?>" method="post"
                          class="form-horizontal" enctype="multipart/form-data">
                        <div class="card-block">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_input(array('name' => 'name', 'value' => set_value('name', $company_details->name), 'placeholder' => 'Name', 'class' => 'form-control', 'tabindex' => '1', 'required' => 'required')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_textarea(array('name' => 'description', 'value' => set_value('description', $company_details->description), 'placeholder' => 'Dscription', 'colls' => '9', 'rows' => '4', 'class' => 'form-control', 'tabindex' => '2')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('description'); ?></span>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_textarea(array('name' => 'address', 'value' => set_value('address', $company_details->address), 'placeholder' => 'Address', 'colls' => '9', 'rows' => '4', 'class' => 'form-control', 'tabindex' => '3')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('address'); ?></span>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_input(array('name' => 'contact', 'maxlength' => '11', 'value' => set_value('contact', $company_details->contact), 'placeholder' => 'Contact', 'class' => 'form-control', 'tabindex' => '4', 'required' => 'required')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('contact'); ?></span>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_input(array('name' => 'web', 'value' => set_value('web', $company_details->web), 'placeholder' => 'Web Url', 'class' => 'form-control', 'tabindex' => '5')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('web'); ?></span>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_input(array('name' => 'slogan', 'value' => set_value('slogan', $company_details->slogan), 'placeholder' => 'Company Slogan', 'class' => 'form-control', 'tabindex' => '6')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('slogan'); ?></span>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?= form_input(array('type' => 'file', 'name' => 'image', 'value' => set_value('image'), 'title' => 'Company Logo', 'class' => 'form-control', 'tabindex' => '6')); ?>
                                </div>
                                <span class="error"> <?php echo form_error('image'); ?></span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"
                                    tabindex="9"><i
                                    class="fa fa-dot-circle-o"></i>
                                Update
                            </button>
                            <button type="reset" class="btn btn-sm btn-danger" tabindex="10"><i
                                    class="fa fa-ban"></i>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.conainer-fluid -->

<?php //echo validation_errors(); ?>