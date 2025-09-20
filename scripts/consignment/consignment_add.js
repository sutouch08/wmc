var click = 0; //-- avoid multiple click

window.addEventListener('load', () => {
  let custCode = $('#customer-code').val();

  //---	กำหนดให้สามารถค้นหาโซนได้ก่อนจะค้นหาลูกค้า(กรณี edit header)
  zoneInit(custCode, false);
  customerInit();

  $('#date').datepicker({
    dateFormat:'dd-mm-yy'
  });
});


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
    load_in();

    $.ajax({
      url: HOME + 'get_item_by_barcode',
      type:'GET',
      cache:'false',
      data:{
        'barcode' : barcode,
        'zone_code' : zone_code
      },
      success:function(rs) {
        load_out();

        if(isJson(rs)) {
          let ds = JSON.parse(rs);

          if(ds.status === 'success') {
            let price = parseDefaultFloat(ds.data.price, 0);
            $('#barcode').val(ds.data.barcode);
            $('#item-code').val(ds.data.product_code);
            $('#item-name').val(ds.data.product_name);
            $('#item-price').val(addCommas(price.toFixed(2)));
            $('#item-disc').val(ds.data.disc);
            $('#stock-qty').text(ds.data.stock);
            $('#count-stock').val(ds.data.count_stock);
            $('#qty').val(1);
            $('#amount').val(addCommas(price.toFixed(2)));
            $('#item-panel').removeClass('hide');
          }
          else {
            showError(ds.message);
          }
        }
        else {
          showError(rs);
          clearFields();
        }
      },
      error:function(rs) {
        showError(rs);
      }
    });
  }
}


function closeItemPanel() {
  $('#item-panel').addClass('hide');
}


function zoneInit(customer_code, edit) {
  if(edit) {
    $('#zone-code').val('');
    $('#zone-name').val('');
  }

  $('#zone-code').autocomplete({
    source:BASE_URL + 'auto_complete/get_consign_zone/' + customer_code,
    autoFocus: true,
    close:function() {
      let rs = $(this).val().trim();
      let arr = rs.split(' | ');

      if(arr.length == 2) {
        let code = arr[0];
        let name = arr[1];

        $('#zone-code').val(code.trim());
        $('#zone-name').val(name.trim());
      }
      else {
        $('#zone-code').val('');
        $('#zone-name').val('');
      }
    }
  });

  $('#zone-name').autocomplete({
    source:BASE_URL + 'auto_complete/get_consign_zone/' + customer_code,
    autoFocus: true,
    close:function(){
      let rs = $(this).val().trim();
      let arr = rs.split(' | ');

      if(arr.length == 2) {
        let code = arr[0];
        let name = arr[1];

        $('#zone-code').val(code.trim());
        $('#zone-name').val(name.trim());
      }
      else {
        $('#zone-code').val('');
        $('#zone-name').val('');
      }
    }
  });
}


function customerInit() {
  $("#customer-code").autocomplete({
    source: BASE_URL + 'auto_complete/get_customer_code_and_name',
    autoFocus: true,
    close: function() {
      let rs = $(this).val().trim();
      let arr = rs.split(' | ');

      if(arr.length == 2) {
        let code = arr[0];
        let name = arr[1];

        $('#customer-code').val(code.trim());
        $('#customer-name').val(name.trim());
        zoneInit(code, true);
      }
      else {
        $('#customer-code').val('');
        $('#customer-name').val('');
        zoneInit('');
      }
    }
  });

  $("#customer-name").autocomplete({
    source: BASE_URL + 'auto_complete/get_customer_code_and_name',
    autoFocus: true,
    close: function() {
      let rs = $(this).val().trim();
      let arr = rs.split(' | ');

      if(arr.length == 2) {
        let code = arr[0];
        let name = arr[1];

        $('#customer-code').val(code.trim());
        $('#customer-name').val(name.trim());
        zoneInit(code, true);
      }
      else {
        $('#customer-code').val('');
        $('#customer-name').val('');
        zoneInit('');
      }
    }
  });
}


function add() {
  if(click == 0) {
    click = 1;
    clearErrorByClass('r');

    let h = {
      'date' : $('#date').val(),
      'customer_code' : $('#customer-code').val().trim(),
      'customer_name' : $('#customer-name').val().trim(),
      'zone_code' : $('#zone-code').val().trim(),
      'zone_name' : $('#zone-name').val().trim(),
      'remark' : $('#remark').val().trim()
    }

    if( ! isDate(h.date)) {
      $('#date').hasError();
      click = 0;
      return false;
    }

    if(h.customer_code.length == 0) {
      $('#customer-code').hasError();
      click = 0;
      return false;
    }

    if(h.customer_name.length == 0) {
      $('#customer-name').hasError();
      click = 0;
      return false;
    }

    if(h.zone_code.length == 0) {
      $('#zone-code').hasError();
      click = 0;
      return false;
    }

    if(h.zone_name.length == 0) {
      $('#zone-name').hasError();
      click = 0;
      return false;
    }

    $.ajax({
      url:HOME + 'add',
      type:'POST',
      cache:false,
      data: {
        'data' : JSON.stringify(h)
      },
      success:function(rs) {
        click = 0;

        if(isJson(rs)) {
          let ds = JSON.parse(rs);

          if(ds.status === 'success') {
            viewDetail(ds.code);
          }
          else {
            showError(ds.message);
          }
        }
        else {
          showError(rs);
        }
      },
      error:function(rs) {
        showError(rs);
        click = 0;
      }
    })
  }
}


function addToDetail() {
  clearErrorByClass('c');

  let h = {
    'code' : $('#consign_code').val(),
    'product_code' : $('#product_code').val().trim(),
    'qty' : parseDefaultFloat($('#item-qty').val(), 1),
    'price' : parseDefaultFloat($('#item-price').val(), 0),
    'disc' : $('#item-disc').val().trim(),
    'auz' : $('#auz').val(),
    'count_stock' : $('#count_stock').val()
  }

  let stock = parseDefaultFloat($('#stock-qty').val(), 0);

  if(h.product_code.length == 0) {
    beep();
    $('#item-code').hasError();
    return false;
  }

  if(h.qty < 0) {
    beep();
    $('#item-qty').hasError();
    return false;
  }

  if(h.qty > stock && h.auz == 0 && h.count_stock == 1) {
    beep();
    $('#stock-qty').hasError();
    $('#item-qty').hasError();
    return false;
  }

  load_in();

  $.ajax({
    url: HOME + 'add_detail',
    type:'POST',
    cache:false,
    data:{
      'data' : JSON.stringify(h)
    },
    success:function(rs) {
      load_out();

      if(isJson(rs)) {
        let ds = JSON.parse(rs);

        if(ds.status === 'success') {
          let id = ds.data.id;

          if($('#row-'+id).length) {
            $('#qty-'+id).val(ds.data.qty);

            reCal(id);
            clearFields();
          }
          else {
            let source = $('#new-row-template').html();
            let output = $('#detail-table');

            render_prepend(source, ds.data, output);
            inputInit();
            reIndex();
            reCalAll();
            clearFields();
          }
        }
        else {
          beep();
          showError(ds.message);
        }
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
}
