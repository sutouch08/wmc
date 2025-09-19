
function toggleActive(id) {
  let chk = $('#list-'+id).is(':checked');
  $('.chk').prop('checked', false);
  $('.list-block').removeClass('active');

  if( ! chk) {
    $('#list-'+id).prop('checked', true);
    $('#list-block-'+id).addClass('active');
  }
}


function removeRow() {
  let id = $('.chk:checked').val();

  if(! id == "" || !id == undefined) {
    let el = $('#list-'+id);
    let no = $('#no-'+id).text();
    swal({
      title:'Delete',
      text:'ต้องการลบรายการที่เลือกหรือไม่ ?',
      type:'warning',
      showCancelButton:true,
      cancelButtonText:'No',
      confirmButtonText:'Yes',
      confirmButtonColor:'#d15b47',
      closeOnConfirm:true
    }, function() {
      setTimeout(() => {
        deleteRow(id);
      }, 100)
    })
  }
}


function deleteRow(id) {
  let code = $('#code').val();

  $.ajax({
    url: HOME + 'delete_detail',
    type:'POST',
    cache:'false',
    data:{
      'code' : code,
      'id' : id
    },
    success:function(rs) {
      if(rs.trim() == 'success') {
        swal({
          title:'Deleted',
          type:'success',
          timer:1000
        });

        $('#list-block-'+id).remove();
        reIndex();
        updateTotalQty();
        updateTotalAmount();
      }
      else {
        beep();
        showError(rs);
      }
    },
    error:function(rs) {
      beep();
      showError(rs);
    }
  });
}


function updateTotalQty() {
  let total = 0;

  $('.qty').each(function() {
    let qty = parseDefaultFloat(removeCommas($(this).val()), 0);
    total += qty;
  });

  $('#total-qty').val(addCommas(total));
}


function updateTotalAmount() {
  let total = 0;

  $('.amount').each(function() {
    let amount = parseDefaultFloat(removeCommas($(this).val()), 0);
    total += amount;
  })

  $('#total-amount').val(addCommas(amount.toFixed(2)));
}


function rollback() {
  let code = $('#code').val();

  swal({
    title: "Rollback Status",
    text: "ต้องการย้อนสถานะเอกสารกลับมาแก้ไขใหม่หรือไม่ ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#8CC152",
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
    closeOnConfirm: true
  },
  function() {
    setTimeout(() => {
      load_in();

      $.ajax({
        url:HOME + 'rollback',
        type:'POST',
        cache:false,
        data:{
          'code' : code
        },
        success:function(rs) {
          load_out();

          if(rs.trim() === 'success') {
            swal({
              title:'Success',
              type:'success',
              timer:1000
            });

            setTimeout(() => {
              refresh();
            }, 1200);
          }
          else {
            beep();
            showError(rs);
          }
        },
        error:function(rs) {
          beep();
          showError(rs);
        }
      })
    }, 100)
  });
}


function getItemByBarcode() {
  let barcode = $('#scan-result').val();
  let zone_code = $('#zone-code').val();

  if(barcode.length > 0)
  {
    $.ajax({
      url: HOME + 'get_item_by_barcode',
      type:'GET',
      cache:'false',
      data:{
        'barcode' : barcode,
        'zone_code' : zone_code
      },
      success:function(rs) {
        if(isJson(rs)) {
          let ds = JSON.parse(rs);
          $('#product_code').val(ds.pdCode);
          $('#item-code').val(ds.product);
          $('#item-price').val(ds.price);
          $('#item-disc').val(ds.disc);
          $('#stock-qty').text(ds.stock);
          $('#count_stock').val(ds.count_stock);
          $('#item-price').focus().select();
        }
        else {
          showError(rs);
          clearFields();
        }
      }
    });
  }
}
