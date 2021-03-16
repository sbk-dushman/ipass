require('./bootstrap');
function declOfNum(number, titles) {
  cases = [2, 0, 1, 1, 1, 2];
  return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
}

if (document.querySelector('.main-sidebar')!=null) {
    let tabs = document.querySelector('.main-sidebar');
    let btns = tabs.querySelectorAll('.tab-list__item');
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
var $fileInput = $('.file-input');
var $droparea = $('#drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(`${'Выбрано: '+ ' '+filesCount + declOfNum(filesCount, [' Файл ', ' Файла ', ' файлов '])}`);
  }
});
// список выбора
$(document).ready(function() {
    $('.select_section__btn-remove').click(function (e) {
    e.preventDefault();
        $(this).closest('.select-list__item').remove();
    });

    // поисковой запрос

    $('#btn_add_from_search').click(function (e) {
        e.preventDefault();
       let req= $(".search-result-form").serializeArray()
        let carentJson = JSON.stringify(req)
        console.log(carentJson);
    });
});

// старый дроп
//     var dropArea = $('#drop-area'),
//         maxFileSize = 1000000; // максимальный размер файла - 1 мб.
//         if (typeof(window.FileReader) == 'undefined') {
//             dropArea.text('Не поддерживается браузером!');
//             dropArea.addClass('error');
//         }
//         dropArea[0].ondragover = function() {
//             dropArea.addClass('is-active');
//             return false;
//         };

//         dropArea[0].ondragleave = function() {
//             dropArea.removeClass('is-active');
//             return false;
//         };
//         dropArea[0].ondrop = function(event) {
//             event.preventDefault();
//             dropArea.removeClass('is-active');
//             dropArea.addClass('is-active');
//             console.log(file +"wqdsw")
//             var file = event.dataTransfer.files[0];
//             console.log(file);

//             if (file.size > maxFileSize) {
//                 dropArea.text('Файл слишком большой!');
//                 dropArea.addClass('error');
//                 return false;
//             }
//         };
//             var xhr = new XMLHttpRequest();
//             xhr.upload.addEventListener('progress', uploadProgress, false);
//             xhr.onreadystatechange = stateChange;
//             xhr.open('POST', '/upload.php');
//             xhr.setRequestHeader('X-FILE-NAME', file.name);
//             xhr.send(file);

//             function uploadProgress(event) {
//                 var percent = parseInt(event.loaded / event.total * 100);
//                 dropArea.text('Загрузка: ' + percent + '%');
//             }
//             function stateChange(event) {
//                 if (event.target.readyState == 4) {
//                     if (event.target.status == 200) {
//                         dropArea.text('Загрузка успешно завершена!');
//                     } else {
//                         dropArea.text('Произошла ошибка!');
//                         dropArea.addClass('error');
//                     }
//                 }
//             }

