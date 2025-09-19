var click = 0;

function addNew() {
  window.location.href = HOME + 'add_new';
}


function edit(id) {
  window.location.href = HOME + 'edit/'+id;
}


function newSize() {
  clearErrorByClass('s');
  $('#size-code').val('');
  $('#size-name').val('');

  $('#item-size-modal').modal('show');

  $('#item-size-modal').on('shown.bs.modal', function() {
    $('#size-code').focus();
  });

  $('#size-code').keyup(function(e) {
    if(e.keyCode === 13) {
      $('#size-name').focus();
    }
  })

  $('#size-name').keyup(function(e) {
    if(e.keyCode === 13) {
      addSize();
    }
  })
}


function addSize() {
  clearErrorByClass('s');

  let code = $('#size-code').val().trim();
  let name = $('#size-name').val().trim();

  if(code.length === 0) {
    $('#size-code').hasError();
    return false;
  }

  if(name.length === 0) {
    $('#size-name').hasError();
    return false;
  }

  $('#item-size-modal').modal('hide');

  setTimeout(() => {
    load_in();

    $.ajax({
      url:HOME + 'add_size',
      type:'POST',
      cache:false,
      data:{
        'code' : code,
        'name' : name
      },
      success:function(rs) {
        load_out();

        if(isJson(rs)) {
          let ds = JSON.parse(rs);

          if(ds.status === 'success') {
            let source = $('#size-template').html();
            let output = $('#size');

            render_append(source, ds.data, output);
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
      }
    });
  },300);
}


function newUnit() {
  clearErrorByClass('s');

  $('#unit-code').val('');
  $('#unit-name').val('');

  $('#item-unit-modal').modal('show');

  $('#item-unit-modal').on('shown.bs.modal', function() {
    $('#unit-code').focus();
  });

  $('#unit-code').keyup(function(e) {
    if(e.keyCode === 13) {
      $('#unit-name').focus();
    }
  })

  $('#unit-name').keyup(function(e) {
    if(e.keyCode === 13) {
      addUnit();
    }
  })
}


function addUnit() {
  clearErrorByClass('s');

  let code = $('#unit-code').val().trim();
  let name = $('#unit-name').val().trim();

  if(code.length === 0) {
    $('#unit-code').hasError();
    return false;
  }

  if(name.length === 0) {
    $('#unit-name').hasError();
    return false;
  }

  $('#item-unit-modal').modal('hide');

  setTimeout(() => {
    load_in();

    $.ajax({
      url:HOME + 'add_unit',
      type:'POST',
      cache:false,
      data:{
        'code' : code,
        'name' : name
      },
      success:function(rs) {
        load_out();

        if(isJson(rs)) {
          let ds = JSON.parse(rs);

          if(ds.status === 'success') {
            let source = $('#unit-template').html();
            let output = $('#unit');

            render_append(source, ds.data, output);
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
      }
    });
  },300);
}


function add() {
	if(click == 0) {
		click = 1;

		clearErrorByClass('r');

		let h = {
			'code' : $('#code').val().trim(),
			'name' : $('#name').val().trim(),
			'unit' : $('#unit').val(),
      'size' : $('#size').val(),
			'weight' : $('#weight').val(),
			'price' : parseDefaultFloat($('#price').val(), 0)
		}

    if(h.code.length == 0) {
			$('#code').hasError();
			click = 0;
			return false;
		}

		if(h.name.length == 0) {
			$('#name').hasError();
			click = 0;
			return false;
		}

		if(h.unit == '') {
			$('#unit').hasError();
			click = 0;
			return false;
		}

    if(h.size == '') {
			$('#size').hasError();
			click = 0;
			return false;
		}

		load_in();

		$.ajax({
			url:HOME + 'add',
			type:'POST',
			cache:false,
			data:{
				'data' : JSON.stringify(h)
			},
			success:function(rs) {
				load_out();
				click = 0;

				if(rs.trim() === 'success') {
					swal({
						title:'Success',
						text:'เพิ่มรายการเรียบร้อยแล้ว <br/>ต้องการเพิ่มใหม่หรือไม่ ?',
						type:'success',
						html:true,
						showCancelButton:true,
						confirmButtonText:'Yes',
						cancelButtonText:'No',
						closeOnConfirm:true
					}, function(isConfirm) {
						if(isConfirm) {
							addNew();
						}
						else {
							goBack();
						}
					})
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


function update() {
	if(click == 0) {
		click = 1;

		clearErrorByClass('r');

    let h = {
			'id' : $('#id').val(),
			'name' : $('#name').val().trim(),
			'unit' : $('#unit').val(),
      'size' : $('#size').val(),
			'weight' : $('#weight').val(),
			'price' : parseDefaultFloat($('#price').val(), 0)
		}

		if(h.name.length == 0) {
			$('#name').hasError();
			click = 0;
			return false;
		}

		if(h.unit == '') {
			$('#unit').hasError();
			click = 0;
			return false;
		}

    if(h.size == '') {
			$('#size').hasError();
			click = 0;
			return false;
		}

		load_in();

		$.ajax({
			url:HOME + 'update',
			type:'POST',
			cache:false,
			data:{
				'data' : JSON.stringify(h)
			},
			success:function(rs) {
				load_out();
				click = 0;

				if(rs.trim() === 'success') {
					swal({
						title:'Success',
						text:'บันทึกรายการเรียบร้อยแล้ว',
						type:'success',
						html:true,
            timer:1000
					})
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
