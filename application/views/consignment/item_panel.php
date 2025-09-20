<style>
  #item-panel {
    position: fixed;
    top:0;
    left: 0;
    height: 100vh;
    background-color: white;
    z-index: 101;
  }

  .item-input {
    margin-top: 45px;
    height: calc(100vh - 140px);
  }

  .submit-btn {
    position: absolute;
    bottom: 0px;
    padding: 30px 15px;
    border-top: 1px solid #ddd;
  }
</style>

<div class="hide" id="item-panel">
  <div class="nav-title nav-title-right">
    <a class="hidden-lg" onclick="closeItemPanel()"><i class="fa fa-angle-left fa-2x"></i></a>
    <div class="font-size-18 text-center">เพิ่มรายการใหม่</div>
  </div>
  <div class="col-xs-12 page-wrap item-input">
    <div class="col-xs-12 fi">
      <label>Barcode</label>
      <input type="text" class="form-control" id="barcode"  value="" readonly />
    </div>
    <div class="col-xs-12 fi">
      <label>SKU</label>
      <input type="text" class="form-control" id="item-code"  value="" readonly/>
    </div>
    <div class="col-xs-12 fi">
      <label>Description</label>
      <input type="text" class="form-control" id="item-name"  value="" readonly/>
    </div>
    <div class="col-xs-6 fi">
      <label>Price</label>
      <input type="text" class="form-control text-center" id="item-price"  value="" readonly/>
    </div>
    <div class="col-xs-6 fi">
      <label>In Stock</label>
      <input type="text" class="form-control text-center" id="stock-qty"  value="0" readonly/>
    </div>
    <div class="col-xs-6 fi">
      <label>Qty</label>
      <input type="text" class="form-control text-center" inputmode="numeric" id="qty"  value="1" />
    </div>
    <div class="col-xs-6 fi">
      <label>Amount</label>
      <input type="text" class="form-control text-center" id="amount"  value="0" />
    </div>

    <input type="hidden" id="count-stock" value="1" />
    <input type="hidden" id="item-disc" value="0" />

  </div>

  <div class="col-xs-12 submit-btn">
    <div class="col-xs-12">
      <button type="button" class="btn btn-sm btn-primary btn-block" onclick="addDetail()"><i class="fa fa-plus"></i> Add</button>
    </div>
  </div>
</div>
