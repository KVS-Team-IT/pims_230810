<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-eye"></i> Add Category</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
            <input type="hidden" name="id" value="<?php echo isset($category->id) ? $category->id : ''; ?>">
            <div class="card-body user_view">
                <div class="row first-row">
                    <div class="col-md-2">
                        <label>Category Name:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-3">
                        <?php echo form_input("name", isset($category->name) ? set_value('name', $category->name) : set_value('name'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo '<div class="error">'.form_error('name').'</div>';
                        ?>
                    </div>
                </div>
                <?php
                echo form_submit('', 'Submit', 'class="btn btn-primary"'); ?>
                <input type="reset" value="Cancel" class="btn btn-default">
                <?php echo form_close(); ?>
            </div>
        </div>	
    </div>
</div>