require('./bootstrap');
let dropArea = document.getElementById('drop-area');
if (document.querySelector('.main-sidebar')!=null) {
    let tabs = document.querySelector('.main-sidebar');
    let btns = tabs.querySelectorAll('.tab-btn');
    let items = tabs.querySelectorAll('.content-list__item');


    function change(arr, i) {
        arr.forEach(item => {
            item.forEach(i => { i.classList.remove('is-active') })
            item[i].classList.add('is-active')
        })
    }
    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', () => {
            change([btns, items], i)
        })
    }

} else{
    console.log('Слайдер скрыт');
}
// дроп файлов
function handleFiles(files) {
     for (var i = 0; i < files.length; i++) {
        uploadFile(files[i]); // call the function to upload the file
    }
}

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false)
})
function preventDefaults(e) {
    e.preventDefault()
    e.stopPropagation()
};
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false)
});

function highlight(e) {
    dropArea.classList.add('is-active')
}
function unhighlight(e) {
    dropArea.classList.remove('is-active')
}
dropArea.addEventListener('drop', handleDrop, false)
function handleDrop(e) {
    let dt = e.dataTransfer
    let files = dt.files
    handleFiles(files)
}

function uploadFile(file) {
    var url = '/upload`'
    var xhr = new XMLHttpRequest()
    var formData = new FormData()
    xhr.open('POST', url, true)
    xhr.addEventListener('readystatechange', function (e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('qewded');
        }
        else if (xhr.readyState == 4 && xhr.status != 200) {
            console.log('ошибка');
        }
    })

    formData.append('file', file)
    xhr.send(formData)
}
