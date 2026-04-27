const identyfikatoryNawigacji = ['nav-baza', 'nav-opisy', 'nav-galeria'];
const identyfikatorySekcji = ['baza', 'opisy', 'galeria'];
const kolorAktywny = 'MistyRose';
const kolorNieaktywny = '#FFAEA5';

function funkcjabaza() {
	identyfikatoryNawigacji.forEach((id) => {
		const blok = document.getElementById(id);
		if (blok) {
			blok.style.backgroundColor = id === 'nav-baza' ? kolorAktywny : kolorNieaktywny;
		}
	});

	identyfikatorySekcji.forEach((id) => {
		const sekcja = document.getElementById(id);
		if (sekcja) {
			sekcja.style.display = id === 'baza' ? 'block' : 'none';
		}
	});
}

function funkcjaopisy() {
	identyfikatoryNawigacji.forEach((id) => {
		const blok = document.getElementById(id);
		if (blok) {
			blok.style.backgroundColor = id === 'nav-opisy' ? kolorAktywny : kolorNieaktywny;
		}
	});

	identyfikatorySekcji.forEach((id) => {
		const sekcja = document.getElementById(id);
		if (sekcja) {
			sekcja.style.display = id === 'opisy' ? 'block' : 'none';
		}
	});
}

function funkcjagaleria() {
	identyfikatoryNawigacji.forEach((id) => {
		const blok = document.getElementById(id);
		if (blok) {
			blok.style.backgroundColor = id === 'nav-galeria' ? kolorAktywny : kolorNieaktywny;
		}
	});

	identyfikatorySekcji.forEach((id) => {
		const sekcja = document.getElementById(id);
		if (sekcja) {
			sekcja.style.display = id === 'galeria' ? 'block' : 'none';
		}
	});
}
