<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i> Company List
                <a href="<?= site_url('Auth/company/add'); ?>"
                    class="btn btn-outline-success btn-sm pull-right"><i class="fa fa-plus fa-sm"></i>
                </a>
                <?php if ($this->session->flashdata('fail_message')) { ?>
                    <div class="alert alert-warning alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('fail_message'); ?>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('success_message')) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="card-block">
                <form action="<?= site_url('Auth/company'); ?>" method="post"
                      class="form-horizontal ">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">

                                <?= form_input(array('name' => 'name', 'value' => set_value('name'), 'placeholder' => 'Name', 'class' => 'form-control ')); ?>
                                &nbsp;
                                <?= form_input(array('name' => 'contact', 'value' => set_value('contact'), 'placeholder' => 'Contact', 'class' => 'form-control')); ?>
                                &nbsp;
                                   <span class="input-group-btn">
                                        <button type="submit" name="search" value="search"
                                                class="btn btn-primary"><i
                                                class="fa fa-search"></i> Search
                                        </button>
                                    </span>
                                    <span class="input-group-btn">
                                        <button class="btn btn-warning"><a
                                                href="<?= site_url('Auth/company'); ?>"><i
                                                    class="fa fa-reset"></i> Reset </a>
                                        </button>

                                    </span>

                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Web</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if ($companies) {
                        foreach ($companies as $key => $val) { ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $val->name; ?></td>
                                <td><?= $val->contact; ?></td>
                                <td><?= $val->web; ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs"
                                       href="<?= site_url('Auth/company/view/' . $val->id); ?>">
                                        View
                                    </a>
                                    <a class="btn btn-info btn-xs"
                                       href="<?= site_url('Auth/company/edit/' . $val->id); ?>">
                                        Edit
                                    </a>
                                    <a onclick="return confirm('Are you sure you want to delete this item?');"
                                       class="btn btn-danger btn-xs"
                                       href="<?= site_url('Auth/company/delete/' . $val->id); ?>"
                                       onclick="return confirm('Are you sure you want to Remove?');">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo '<tr><td colspan="6">NO DATA </td></tr>';
                    } ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <?php echo $links; ?>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- /.conainer-fluid -->
