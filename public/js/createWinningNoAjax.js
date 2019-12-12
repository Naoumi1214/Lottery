$(function () {

	/**
     * 当たった番号をモーダルウィンドウに演出しながら出力する
     * @param {number} no
     * @param {string} name
     */
	const openModalWindow = (no, name) => {
		$('#modelId').modal('show');

		//フェード時間
		const fadeinTime = 5500;
		//オーディオオブジェクト
		const audioElem = new Audio();
		audioElem.src = '../storage/audio/se_maoudamashii_instruments_drumroll.mp3';

		const btn = $('#start');
		btn.on('click',function () {
			//数字を出力するタグ
			const notest = $('#no');

			audioElem.play();

			//当選番号と当選種類名を出力
			setTimeout(function () {
				notest.text(no);
			}, fadeinTime);
		});
	};

	/**
     * tbodyに記録を追加する
     * @param {object} data
     */
	const tableInnner = (data) => {
		//一列目
		const nametd = document.createElement('td');
		nametd.setAttribute('scope', 'row');
		nametd.textContent = data.winningType['name'];
		console.log(nametd);

		//2列目
		const a = document.createElement('a');
		a.href = '/updateNo/' + data.id;
		a.textContent = data.no;

		const notd = document.createElement('td');
		notd.appendChild(a);
		console.log(notd);

		//3列目
		const btn = document.createElement('button');
		btn.setAttribute('type', 'button');
		btn.id = data.id;
		btn.className = 'btn btn-primary deletebtn';
		btn.textContent = '削除する';

		const btntd = document.createElement('td');
		btntd.appendChild(btn);

		//行の組み立て
		const tr = document.createElement('tr');
		tr.id = data.id + 'tr';
		tr.appendChild(nametd);
		tr.appendChild(notd);
		tr.appendChild(btntd);
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
	$('#randomHitbtn').on('click',function () {
		const targetType = $('#ramdom .winning_type_id').val();
		const maxno = $('#ramdom').find('input[name="maxno"]').val();
		const competition_id = $('#ramdom').find('input[name="competition_id"]').val();
		const duplicate = Boolean($('#ramdom').find('input[name="duplicate"]').val());

		$.ajax({
			url: '/createWinningNoRandom',
			type: 'POST',
			data: {
				'competition_id': competition_id,
				'winning_type_id': targetType,
				'maxno': maxno,
				'duplicate': duplicate
			}
		}).done((data) => {
			//通信成功
			console.log('OK');
			console.log(data);

			openModalWindow(data.no, data.winningType['name']);
			tableInnner(data);

		}).fail(function (data) {
			/* 通信失敗時 */
			console.log('BAD');
			console.log(data);
		});
	});

});
