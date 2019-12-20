$(function () {
	//laravel用のcsrf対策トークン
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	//当選番号を削除する
	$(document).on('click', '.deletebtn', function (e) {
		console.log(e.target.id);
		const id = e.target.id;

		$.ajax({
			url: '/deleteNo',
			type: 'POST',
			data: {
				id: id,
			}
		}).done((data) => {
			//通信成功
			console.log('OK');
			console.log(data.deletemessage);
			if (data.deletemessage) {
				const tr = $('#' + id + 'tr');
				tr.remove();
			}


		}).fail(function (data) {
			/* 通信失敗時 */
			console.log('BAD');
			console.log(data);
		});
	});
});
