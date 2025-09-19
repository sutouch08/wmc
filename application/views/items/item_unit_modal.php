<div class="modal fade" id="item-unit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:250px; max-width:90vw;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom:solid 1px #e5e5e5;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title-site text-center margin-top-5 margin-bottom-5">หน่วยนับ</h4>
            </div>
            <div class="modal-body padding-top-5">
              <div class="form-horizontal">
                <div class="form-group">
            			<div class="col-lg-12 col-md-12 col-sm-2 col-xs-12">
                    <label>รหัส</label>
            				<input type="text" class="form-control s" id="unit-code" value="" autocomplete="off"/>
            			</div>
            		</div>

                <div class="form-group">
            			<div class="col-lg-12 col-md-12 col-sm-2 col-xs-12">
                    <label>ชื่อ</label>
            				<input type="text" class="form-control s" id="unit-name" value="" autocomplete="off"/>
            			</div>
            		</div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success btn-block" onClick="addUnit()" >เพิ่ม</button>
            </div>
        </div>
    </div>
</div>

<script id="unit-template" type="text/x-handlebarsTemplate">
		<option value="{{code}}">{{name}}</option>
</script>
