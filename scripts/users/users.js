function goBack() {
	window.location.href = HOME;
}


function addNew() {
	window.location.href = HOME + 'add_new';
}

var click = 0;

function add() {
	if(click == 0) {
		click = 1;

		clearErrorByClass('r');

		let h = {
			'uname' : $('#uname').val().trim(),
			'pwd' : $('#pwd').val().trim(),
			'ugroup' : $('#ugroup').val(),
			'plate_no' : $('#plate-no').val().trim(),
			'name' : $('#name').val().trim(),
			'active' : $('#active').is(':checked') ? 1 : 0
		}

		if(h.uname.length == 0) {
			$('#uname').hasError();
			click = 0;
			return false;
		}

		if(h.pwd.length == 0) {
			$('#pwd').hasError();
			click = 0;
			return false;
		}

		if(h.ugroup == '') {
			$('#ugroup').hasError();
			click = 0;
			return false;
		}

		if(h.plate_no.length == 0) {
			$('#plate-no').hasError();
			click = 0;
			return false;
		}

		if(h.name.length == 0) {
			$('#name').hasError();
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


function showPwd() {
	var x = document.getElementById("pwd");
	var y = document.getElementById("pwd-btn");

	if(x.type === "password") {
		x.type = "text";
		y.classList.remove('fa-eye');
		y.classList.add('fa-eye-slash');
	}
	else {
		x.type = "password";
		y.classList.remove('fa-eye-slash');
		y.classList.add('fa-eye');
	}
}


function edit(id) {
	window.location.href = HOME + 'edit/'+id;
}


function update() {
	if(click == 0) {
		click = 1;

		let h = {
			'id' : $('#id').val(),
			'uname' : $('#uname').val().trim(),
			'ugroup' : $('#ugroup').val(),
			'plate_no' : $('#plate-no').val().trim(),
			'name' : $('#name').val().trim(),
			'active' : $('#active').is(':checked') ? 1 : 0
		}

		if(h.uname.length == 0) {
			$('#uname').hasError();
			click = 0;
			return false;
		}

		if(h.ugroup == '') {
			$('#ugroup').hasError();
			click = 0;
			return false;
		}

		if(h.plate_no.length == 0) {
			$('#plate-no').hasError();
			click = 0;
			return false;
		}

		if(h.name.length == 0) {
			$('#name').hasError();
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
						timer:1000,
						html:true
					});
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


function resetPassword(id) {
	window.location.href = HOME + 'reset_pwd/' + id;
}


function changePwd(id) {
	$('#pwd').clearError();

	let h = {
		'id' : $('#id').val(),
		'pwd' : $('#pwd').val().trim()
	}

	if(h.pwd.length == 0) {
		$('#pwd').hasError();
		return false;
	}

	load_in();

	$.ajax({
		url:HOME + 'update_pwd',
		type:'POST',
		cache:false,
		data:{
			'data' : JSON.stringify(h)
		},
		success:function(rs) {
			load_out();			

			if(rs.trim() === 'success') {
				swal({
					title:'Success',
					text:'บันทึกรายการเรียบร้อยแล้ว',
					type:'success',
					timer:1000,
					html:true
				});
			}
			else {
				showError(rs);
			}
		},
		error:function(rs) {
			showError(rs);
		}
	})
}
