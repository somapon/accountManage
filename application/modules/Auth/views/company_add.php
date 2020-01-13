<div class="container-fluid">

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Company
                        <a href="<?= site_url('Auth/company'); ?>" style="float: right;"
                           class="btn btn-outline-success btn-sm"><i
                                    class="fa fa-align-justify fa-sm"></i></a>
                        &nbsp;
                        <?php if ($this->session->flashdata('add_message')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('add_message'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-block">
                        <form id="companyForm" method="post" action="<?= site_url('Auth/company/add'); ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= form_input(array('name' => 'name', 'maxlength' => '200',
                                            'value' => set_value('name'), 'placeholder' => 'Name',
                                            'class' => 'form-control', 'tabindex' => '1')); ?>
                                        <span class="error"> <?php echo form_error('name'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <?= form_textarea(array('name' => 'description', 'value' => set_value('description'),
                                            'placeholder' => 'Description', 'colls' => '9', 'rows' => '4',
                                            'class' => 'form-control', 'tabindex' => '2')); ?>
                                        <span class="error"> <?php echo form_error('description'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <?= form_textarea(array('name' => 'address', 'value' => set_value('address'),
                                            'placeholder' => 'Address', 'colls' => '9', 'rows' => '4',
                                            'class' => 'form-control', 'tabindex' => '3')); ?>
                                        <span class="error"> <?php echo form_error('address'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <?= form_input(array('name' => 'contact', 'maxlength' => '11', 'value' => set_value('contact'),
                                            'placeholder' => 'Contact', 'class' => 'form-control', 'tabindex' => '4')); ?>
                                        <span class="error"> <?php echo form_error('contact'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <?= form_input(array('name' => 'web', 'value' => set_value('web'),
                                            'placeholder' => 'Web Url', 'class' => 'form-control', 'tabindex' => '5')); ?>
                                        <span class="error"> <?php echo form_error('web'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <?= form_input(array('name' => 'slogan', 'value' => set_value('slogan'),
                                            'placeholder' => 'Company Slogan', 'class' => 'form-control', 'tabindex' => '6')); ?>
                                        <span class="error"> <?php echo form_error('slogan'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"
                                        tabindex="9"><i
                                            class="fa fa-dot-circle-o"></i>
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger" tabindex="10"><i
                                            class="fa fa-ban"></i>
                                    Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.conainer-fluid -->

</div>


