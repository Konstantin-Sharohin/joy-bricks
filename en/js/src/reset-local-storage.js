(() => {
    let languages = document.querySelector('.languages'),
    resetLocalStorage = (event) => {
        if (event.target.className === 'english' || event.target.className === 'russian') {
            localStorage.clear();
        }
    }
    languages.addEventListener('click', resetLocalStorage);
})();