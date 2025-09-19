<!-- <div id="cam" class="" style="position: fixed; top:45px; left:0; width:100vw; z-index:13;">
  <div id="reader" style="width:100%;"></div>
</div>
<div id="reader-backdrop" class="" style="position: fixed; top:0px; width:100%; height:100vh; background-color:#000000e0; z-index:12;">
  <p class="text-center" style="position:absolute; bottom:90px; width:100vw;">
    <a class="text-center" id="btn-stop" href="javascript:stopScan()"
    style="margin:0px; border:none; border-radius:25px;
    padding:10px 17px; font-size:24px; line-height:0.8;
    background-color:salmon; color:black;">&times;</a>
  </p>
</div> -->

<style>
  #reader-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    background-color: #000000e0;
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* #cam {
    position: fixed;
    top: 45px;
    width: 100vw;
    height: calc(100vh - 120px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 13;
  } */

  #reader {
    width: 100vw;
    height: 100vh;
    background-color: white;
  }
</style>

<input type="hidden" id="scan-result" />

<div id="reader-backdrop" class="hide">
  <div class="nav-title nav-title-center">
  	<a onclick="stopScan()"><i class="fa fa-angle-left fa-2x"></i></a>
  	<div class="font-size-18 text-center">Scan Barcode</div>
  </div>
  <div id="cam">
    <div id="reader"></div>
  </div>
</div>
