<style>
  #item-panel {
    position: fixed;
    top:0;
    left: 0;
    height: 100vh;
    background-color: white;
    z-index: 10;
  }

  #item-panel.hide {
    transition: opacity 0.5s ease-in-out;
    opacity: 0;
  }

  .item-input {
    height: calc(100vh - 120px);
    margin-top: 45px;
  }
</style>

<div class="hide" id="item-panel">
  <div class="nav-title nav-title-right">
    <a class="hidden-lg" onclick="closeItemPanel()"><i class="fa fa-angle-left fa-2x"></i></a>
    <div class="font-size-18 text-center">เพิ่มรายการใหม่</div>
  </div>
  <div class="col-xs-12 page-wrap item-input">
    <div class="col-xs-12 padding-5 fi">
      <label>Barcode</label>
      <input type="text" class="form-control" id="barcode"  value="" />
    </div>
    <div class="col-xs-12 padding-5 fi">
      <label>SKU</label>
      <input type="text" class="form-control" id="product-code"  value="" />
    </div>
    <div class="col-xs-12 padding-5 fi">
      <label>Description</label>
      <input type="text" class="form-control" id="product-name"  value="" />
    </div>
    <div class="col-xs-12 padding-5 fi">
      <label>Price</label>
      <input type="text" class="form-control" id="price"  value="" />
    </div>
    <div class="col-xs-12 padding-5 fi">
      <label>Qty</label>
      <input type="text" class="form-control" id="qty"  value="" />
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 fi">
      <label class="not-show">Qty</label>
      <button type="button" class="btn btn-sm btn-primary btn-block" style="border-radius:10px;"><i class="fa fa-plus"></i> Add</button>
    </div>
  </div>
</div>
