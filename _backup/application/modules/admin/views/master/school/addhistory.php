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
        <a class="btn btn-sm btn-danger remove_wexp_history_more{{random_exr_id}}" id="remove_wexp_history_more{{random_exr_id}}" href="javascript:"> Delete</a>
    </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">  Upto Class   <span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_dropdown("class[]", array("" => "Select") + upto_class(), '', 'id="class_{{random_exr_id}}" class="form-control validate[required]" autocomplete="off" onchange="getkvstreamdiv({{random_exr_id}});" '); ?>
                <span class="error"><?php echo form_error('class'); ?></span>
                </div> 
            </div>
            <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label"> Section   <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                     <?php echo form_dropdown("section[]", array("" => "Select") + section_kvuptosection(), '', 'id="section_{{random_exr_id}}" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('section'); ?></span>
                    </div> 
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label"> Year   <span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_dropdown("year[]", array("" => "Select") + opening_years(), '', 'id="year_{{random_exr_id}}" class="form-control validate[required]" autocomplete="off" '); ?>
                <span class="error"><?php echo form_error('year'); ?></span>
                <input type="hidden" name="sci[]" id="default_kvsci_{{random_exr_id}}" value="0">
                <input type="hidden" name="com[]" id="default_kvcom_{{random_exr_id}}" value="0">
                <input type="hidden" name="hum[]" id="default_kvhum_{{random_exr_id}}" value="0">
                </div> 
            </div>
        </div>
        <div class="row" id="streamrow_{{random_exr_id}}" style="display:none;">
            <div class="form-group col-md-12">
            <label for="" class="col-sm-12 col-form-label">Select Stream<span class="reqd">*</span></label>
                <div class="row col-md-12" id="streamdiv_{{random_exr_id}}" style="display: none" >
                    <div class="form-check">
                  &emsp;<input class="form-check-input" type="checkbox" name="sci[]" id="kvsci_{{random_exr_id}}" value="1" onchange="DisDefaultSci(this.id);">Science&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" type="checkbox" name="com[]" id="kvcom_{{random_exr_id}}" value="1" onchange="DisDefaultCom(this.id);">Commerce&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" type="checkbox" name="hum[]" id="kvhum_{{random_exr_id}}" value="1" onchange="DisDefaultHum(this.id);">Humanities
                    </div>
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
    if (history_details!='') {
        $.each(history_details, function (key, history_detail) {
            RenderHistoryMore(history_detail.id, history_detail);
            $("#class_" + history_detail.id).val(history_detail.upto_class).trigger("change");;
            $("#section_" + history_detail.id).val(history_detail.section);
            $("#year_" + history_detail.id).val(history_detail.session_year);
            
            if(history_detail.science==1){
                $("#kvsci_" + history_detail.id).attr('checked', true);  
                $("#default_kvsci_" + history_detail.id).prop('disabled', true); 
            }else{
                $("#kvsci_" + history_detail.id).attr('checked', false);  
                $("#default_kvsci_" + history_detail.id).prop('disabled', false); 
            }
            if(history_detail.commerce==1){
                $("#kvcom_" + history_detail.id).attr('checked', true);
                $("#default_kvcom_" + history_detail.id).prop('disabled', true);
            }else{
                $("#kvcom_" + history_detail.id).attr('checked', false);
                $("#default_kvcom_" + history_detail.id).prop('disabled', false);
            }
                
            if(history_detail.humanities==1){
                $("#kvhum_" + history_detail.id).attr('checked', true);
                $("#default_kvhum_" + history_detail.id).prop('disabled', true);
            }else{
                $("#kvhum_" + history_detail.id).attr('checked', false);
                $("#default_kvhum_" + history_detail.id).prop('disabled', false);
            }
                
        });
    } else {
        history_more = {};
        RenderHistoryMore(random_history_more_id, history_more);
    }
//====================================== ADD MORE HISTORY FUNCTION END  ==================================//    

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
    function getkvstreamdiv(ids){
        var text=$('#class_'+ids).val();
        if(text == 11 || text == 12)
        {
            $('#streamrow_'+ids).show();
            $('#streamdiv_'+ids).show();

        }else{
            $('#streamrow_'+ids).hide();
            $('#streamdiv_'+ids).hide();
            $('#kvsci_'+ids).val('');
            $('#kvcom_'+ids).val('');
            $('#kvhum_'+ids).val('');
        }
    }
</script>
  
<script>
//======================== Function Added By Aasit ===========================//
    function DisDefaultSci(ChkIdSci){
            var isSci = $("#"+ChkIdSci).is(":checked");
            if (isSci) {
                $("#default_"+ChkIdSci).prop('disabled', true);

            } else {
                $("#default_"+ChkIdSci).prop('disabled', false);
            }
    }
    function DisDefaultCom(ChkIdCom){
            var isCom = $("#"+ChkIdCom).is(":checked");
            if (isCom) {
                $("#default_"+ChkIdCom).prop('disabled', true);

            } else {
                $("#default_"+ChkIdCom).prop('disabled', false);
            }
    }
    function DisDefaultHum(ChkIdHum){
            var isHum = $("#"+ChkIdHum).is(":checked");
            if (isHum) {
                $("#default_"+ChkIdHum).prop('disabled', true);

            } else {
                $("#default_"+ChkIdHum).prop('disabled', false);
            }
    }
</script>