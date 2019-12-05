$(function () {
	/**
     * tbodyに記録を追加する
     * @param {*} data
     */
	const tableInnner = (data) => {
		const nametd = document.createElement('td');
		nametd.setAttribute('scope', 'row');
		nametd.textContent = data.winningType['name'];
		console.log(nametd);

		const a = document.createElement('a');
		a.href = '/updateNo' + data.id;
		a.textContent = data.no;
		const notd = document.createElement('td');
		notd.appendChild(a);
		console.log(notd);

		const tr = document.createElement('tr');
		tr.appendChild(nametd);
		tr.appendChild(notd);
		console.log(tr);

		$('#winning_noObjs_tbody').append(tr);
	};


	//laravel用のcsrf対策トークン
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	//当選種類別にランダムに当選させる
	$('#randomHitbtn').click(function () {
		const targetType = $('#ramdom .winning_type_id').val();
		const maxno = $('#ramdom').find('input[name="maxno"]').val();
		const competition_id = $('#ramdom').find('input[name="competition_id"]').val();

		$.ajax({
			url: '/createWinningNoRandom',
			type: 'POST',
			data: {
				'competition_id': competition_id,
				'winning_type_id': targetType,
				'maxno': maxno
			}
		}).done((data) => {
			//通信成功
			console.log('OK');
			console.log(data);

			tableInnner(data);

		}).fail(function (data) {
			/* 通信失敗時 */
			console.log('BAD');
			console.log(data);
		});
	});

});
