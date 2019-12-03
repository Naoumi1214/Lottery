$(function () {
	const deleteBtn = '.deleteBtn';//削除ボタンのclass名

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$(deleteBtn).click(function (e) {
		const id = Number(e.target.id);
		console.log(id);
		$.ajax({
			url: '/deleteWinningType',
			type: 'POST',
			data: {
				'id': id,

			}
		}).done((data) => {
			//通信成功
			console.log('OK');
			console.log(data);

			$('#tr' + id).remove();
		}).fail(function(data){
			/* 通信失敗時 */
			console.log('BAD');
			console.log(data);
		});
	});

});
