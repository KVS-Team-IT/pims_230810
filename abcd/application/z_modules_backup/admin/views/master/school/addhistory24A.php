<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add School History</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-eye"></i> Add School History</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
            <input type="hidden" name="id" value="<?php echo isset($school) ? $school : ''; ?>">
            <div class="card-body user_view">
                
                <div class="add_more_button">
                    <a class="btn btn-primary" id="addmore_history" href="javascript:"> Add More</a>
                </div>
                <br>

                <div id="containner_history_more"></div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <?php echo form_submit('', 'Submit', 'class="btn btn-primary"'); ?>
                        <input type="reset" value="Cancel" class="btn btn-default">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>	
    </div>
</div>

<!-- ========================================== History Template Start ============================================-->
<script id="history_more_template" type="x-tmpl-mustache">
    <div class="background_div delete_wexp_history_more"  id="delete_wexp_history_more{{random_exr_id}}" >
    <div class="delete_more_button" style="display:none;" id="history_more_1_{{random_exr_id}}">
        <a class="btn btn-primary" id="remove_wexp_history_more{{random_exr_id}}" class="remove_wexp_history_more{{random_exr_id}} href="javascript:"> Delete</a>
    </div>
        <!-- <div class="row">
            <div class="form-group col-md-4" id="region_div_all_{{random_exr_id}}" >
                <label for="" class="col-sm-12 col-form-label" id="all_region_label_{{random_exr_id}}">Region<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("region_id_all[]", array("" => "Select") + region_lists(), '', 'class="form-control " onchange="processSchoolalljoiningDiv({{random_exr_id}});"  id="region_id_all_{{random_exr_id}}" autocomplete="off" ');    ?>
                    <span class="error"><?php echo form_error('region_id_all'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4" id="school_div_all_{{random_exr_id}}" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">School<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("school_id_all[]", array("" => "Select") + school_lists(), '', 'class="form-control "  id="school_id_all_{{random_exr_id}}" data-id="c" onchange="allschcode({{random_exr_id}})" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('school_id_all'); ?></span
                </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">  Class   <span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_dropdown("class[]", array("" => "Select") + section_class(), '', 'id="class_{{random_exr_id}}" class="form-control validate[required]" autocomplete="off" '); ?>
                <span class="error"><?php echo form_error('class'); ?></span>
                </div> 
            </div>
            <div class="form-group col-md-4 >
                <label for="" class="col-sm-12 col-form-label">Section :<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("section[]", '{{history_detail.section}}', 'placeholder=""  id="section_{{random_exr_id}}" class=" form-control  autocomplete="off"'); ?> 
                        <span class="error"><?php echo form_error('section'); ?></span> 
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">  Opening Year   <span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_dropdown("year[]", array("" => "Select") + opening_years(), '', 'id="year_{{random_exr_id}}" class="form-control validate[required]" autocomplete="off" '); ?>
                <span class="error"><?php echo form_error('year'); ?></span>
                </div> 
            </div>
        </div>
    </div>

 </script>
<!-- ============================================ History Template End ==============================================-->

<script>

    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();

    //====================================== ADD MORE HISTORY FUNCTION START  ==================================//
    var random_history_more_id = Date.now();
    $('#addmore_history').click(function () {
        random_history_more_id = Date.now();
        RenderHistoryMore(random_history_more_id);
    });

    var history_details =<?php echo json_encode(isset($HistoryData) ? $HistoryData: ''); ?>;
    console.log(history_details);
    if (history_details!='') {
        $.each(history_details, function (key, history_detail) {
            RenderHistoryMore(history_detail.id, history_detail);
            //$("#region_id_all_" + history_detail.id).val(history_detail.region).trigger("change"); 
            //$("#school_id_all_" + history_detail.id).val(history_detail.school);
            $("#class_" + history_detail.id).val(history_detail.class);
            $("#year_" + history_detail.id).val(history_detail.year);
        });
    } else {
        history_more = {};
        RenderHistoryMore(random_history_more_id, history_more);
    }
    

    function RenderHistoryMore(random_history_more_id, history_more) {
        var source = $("#history_more_template").html();
        var wexp_count = $(".delete_wexp_history_more").length;
        Mustache.parse(source);
        var rendered = Mustache.render(source, {
            random_exr_id: random_history_more_id,
            history_detail: history_more,
        });
        $("#containner_history_more").append(rendered);
        if (wexp_count != 0) {
            $("#history_more_1_" + random_history_more_id).css("display", "block");
        }
        delete_history_more(random_history_more_id);
    }

    function delete_history_more(random_exr_id) {

        $("#remove_wexp_history_more" + random_exr_id).click(function () {
            var wexp_count = $(".delete_wexp_history_more").length;
            var wexp_id = $(this).attr("wexpid");
            if (wexp_id) {
                var confirm = window.confirm('Are you sure want to delete?');
                if (confirm) {
                    $("#delete_wexp_history_more" + wexp_id).remove();
                    generate("success", "Details deleted successfully");
                    location_reload();
                    if (wexp_count == 1) {
                        equa = {};
                        RenderHistoryMore(random_exr_id, equa);
                    }
                }
            } else {
                if (wexp_count > 1) {
                    $("#delete_wexp_history_more" + random_exr_id).remove();
                }

            }

        });
    }
    //====================================== ADD MORE HISTORY FUNCTION END  ==================================//

    function processSchoolalljoiningDiv(ids) {
        var region_id = $("#region_id_all_"+ids).val();
        var role_id = $("#role_id_all_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    $('#school_div_all_'+ids).css("display", "block");
                    $('#school_id_all_'+ids).html(response);
                }
            });
            
        }
    }

</script>