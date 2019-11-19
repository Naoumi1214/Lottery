window.onload = function () {
	//最大人数を決めるセレクトボックス
	let selectbox = document.getElementById('maxNumberOfPeople');

	//optionタグを入れるためのDocumentFragmentオブジェクト
	let documentflag = document.createDocumentFragment();

	//optionタグ生成
	for (let index = 1; index < 100; index++) {
		let option = document.createElement('option');
		option.value = index;
		option.textContent = index;

		documentflag.appendChild(option);
	}

	selectbox.appendChild(documentflag);

};
