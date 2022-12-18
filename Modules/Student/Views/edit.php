<?= $this->extend("\Modules\Student\Views\app") ?>

<?= $this->section("title") ?>
Thay đổi thông tin sinh viên
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<style>
    #frm-edit-student label.error {
        color: red;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        Chỉnh sửa thông tin
        <a href="<?= base_url('student') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">List Student</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" id="frm-edit-student" action="<?= base_url('student/edit-student/' . $student['id']) ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" required value="<?= $student['name'] ?>" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" required value="<?= $student['email'] ?>" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
                <div class="col-sm-10">
                    <input type="text" required value="<?= $student['phone_number'] ?>" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    <br />

                    <?php
                    if (!empty($student['profile_image'])) {
                    ?>
                        <img src="<?= $student['profile_image'] ?>" class="img-student" />
                    <?php
                    } else {
                        echo "Profile Image Not Found";
                    }
                    ?>

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $(function() {

        $("#frm-edit-student").validate();
    });
</script>

<?= $this->endSection() ?>