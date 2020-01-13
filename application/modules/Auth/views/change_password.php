   <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Change Password
                            <span class="error"><?php echo $message;?></span>
                        </div>
                        <?php echo form_open("Auth/change_password");?>
                        <div class="card-block">

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <?=form_input($old_password);?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <?=form_input($new_password);?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <?=form_input($new_password_confirm);?>
                                        <?=form_input($user_id);?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"
                                        tabindex="9"><i
                                        class="fa fa-dot-circle-o"></i>
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger"><i
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