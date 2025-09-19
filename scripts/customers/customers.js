var click = 0;

function addNew() {
  window.location.href = HOME + 'add_new';
}


function edit(id) {
  window.location.href = HOME + 'edit/'+id;
}


function add() {
	if(click == 0) {
		click = 1;

		clearErrorByClass('r');

		let h = {
			'name' : $('#name').val().trim(),
			'address' : $('#address').val().trim(),
			'phone' : $('#phone').val().trim(),
			'map' : $('#map').val().trim(),
			'contact' : $('#contact').val().trim()
		}

		if(h.name.length == 0) {
			$('#name').hasError();
			click = 0;
			return false;
		}

		if(h.address.length == 0) {
			$('#address').hasError();
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
			'address' : $('#address').val().trim(),
			'phone' : $('#phone').val().trim(),
			'map' : $('#map').val().trim(),
			'contact' : $('#contact').val().trim()
		}

		if(h.name.length == 0) {
			$('#name').hasError();
			click = 0;
			return false;
		}

		if(h.address.length == 0) {
			$('#address').hasError();
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
