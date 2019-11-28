window.onload = function () {

	/**
     * 感想記事をAjaxでPostし、htmlに記事を反映させる
     */
	const outinArticlAjax = () => {
		const xhr = new XMLHttpRequest();

		const no = document.getElementsByName('no')[0].value;
		const id = document.getElementsByName('id')[0].value;
		console.log('no:' + no);
		console.log('id:' + id);

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4) {
				//通信完了時
				if (xhr.status === 200) {
					//通信が成功した場合
					console.log('did');
					const json = JSON.parse(xhr.responseText);
					const winning_nos = json.winning_nos;
					//console.log(winning_nos);


					//当選番号の当選情報を記述する場所
					const tbody = document.getElementById('nos');

					//すでに情報があった場合削除する
					while (tbody.firstChild) {
						tbody.removeChild(tbody.firstChild);
					}

					//当選番号の当選情報をtableに構築する
					const trs = document.createDocumentFragment();
					for (let i = 0; i < winning_nos.length; i++) {
						let winning_no = winning_nos[i];
						let tr = document.createElement('tr');
						console.log(winning_no);

						//当選種類名部分
						let td = document.createElement('td');
						td.textContent = winning_no.name;
						tr.appendChild(td);

						//当選番号部分
						td = document.createElement('td');
						td.textContent = winning_no.no;
						tr.appendChild(td);

						trs.appendChild(tr);
						//console.log(trs.children);

					}
					tbody.appendChild(trs);
				} else {
					//通信がが失敗した場合
					console.log('did not');
				}
			} else {
				//通信が関する前
				console.log('loding');
			}
		};



		xhr.open('POST', '/singleNoConfirmation', true);
		xhr.setRequestHeader('content-type',
			'application/x-www-form-urlencoded;charset=UTF-8');
		var token = document.getElementsByName('_token').item(0).value;
		console.log(token);
		xhr.setRequestHeader('X-CSRF-Token', token);
		xhr.send('no=' + no + '&id=' + id);

	};



	//投稿ボタンを押した場合の処理
	document.getElementById("submit").addEventListener('click', function () {
		outinArticlAjax();
	}, false);

};
