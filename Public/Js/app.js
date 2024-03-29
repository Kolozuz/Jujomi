var accordionItemCount = 0;
var accordionItemCount2 = 0;
const main = $("#main");
$("#cmswitch").on("click", function () {
  // let cv = document.getElementById("cursosViewer");
  // console.log(cm.style.display);
  // console.log(cv.style.display);

  // cm.classList.toggle('d-none');
  // cv.classList.toggle('d-none');
  location.href = "CursoController.php?action=startstudent";
});
$("#cvswitch").on("click", function () {
  // let cv = document.getElementById("cursosViewer");
  // console.log(cm.style.display);
  // console.log(cv.style.display);

  // cm.classList.toggle('d-none');
  // cv.classList.toggle('d-none');
  location.href = "CursoController.php?action=start";
});
Quill.register("modules/resize", window.QuillResizeModule);
// Con esto inicializamos y configuramos el editor de Quill
var toolbarOptions = [
  [{ font: [] }],
  [{ size: ["small", false, "large", "huge"] }],
  [{ header: [1, 2, 3, 4, 5, 6, false] }],

  ["bold", "italic", "underline", "strike"],
  ["blockquote", "code-block"],

  [{ list: "ordered" }, { list: "bullet" }],
  [{ script: "super" }],
  [{ indent: "-1" }, { indent: "+1" }],

  [{ color: [] }],
  [{ align: [] }],

  ["image", "video"],

  ["clean"],
];
var options = {
  debug: "info",
  modules: {
    resize: {
      showSize: true,
      // showToolbar: false,
      toolbar: {
        // alingTools: false
      },
      locale: {},
    },
    toolbar: toolbarOptions,
    history: {
      // Esto determina cada cuantos milisegundos se stackean los cambios
      delay: 1000,
      // Esto determina la cantidad maxima de cambios que se guardan
      maxStack: 5,
      // Esto determina si deben tenerse en cuenta solo los cambios realizados por input del usuario;
      userOnly: false,
    },
  },
  placeholder: "Primero lo primero...",
  value: "Hola Mundo",
  readOnly: false,
  theme: "snow",
};
// var s = Array['A','B','C'];
// $("#scount").val(s)

//pass the value to your ajax data like this:
$(function () {
  $("#form").on("submit", function (f) {
    f.preventDefault();
    var quillHtml = editor.root.innerHTML.trim();
    var quillcontent = {
      contenido_secc: quillHtml,
    };
    let $err = $("#err");

    $.ajax({
      type: "POST",
      url: "CursoController.php",
      data: $(this).serialize() + "&" + $.param(quillcontent),
      success: function (result) {
        $err.innerHTML += result;
        $err.removeClass("d-none");
        // alert(result);

        swal("Yay!", "Changes where saved correctly", "success");
      },
      error: function (xhr) {
        swal("Oops", "Algo salio mal :(", "error");
        $err.innerHTML +=
          "Status del return -> " +
          xhr.status +
          "Status del return en txt -> " +
          xhr.statusText +
          " " +
          "Texto del return -> " +
          xhr.responseText;
        $err.removeClass("d-none");
      },
    });
    // .then(function(){
    //     $.ajax({
    //         type: "POST",
    //         // processData: false,
    //         url: "CursoController.php",
    //         data: {
    //             action : "insertar_seccion",
    //             secc_contenido : quillHtml
    //         },
    //         success: function (result) {
    //           alert("success-> " + result);
    //         },
    //         error: function (xhr) {
    //           alert(
    //             "NO se envio el array" +
    //               xhr.status +
    //               xhr.statusText +
    //               " " +
    //               xhr.responseText
    //           );
    //         },
    //       })
    // });
  });
});

//FUNCIONES PARA EL CAMBIO DE STATUS DE LOS CURSOS
function publishCurso(id) {
  var idicon = id;
  $.ajax({
    type: "POST",
    url: "CursoController.php",
    data: {
      action: "publishCurso",
      id: id,
    },
    success: function (response) {
      var statusicon = $("#statusicon" + idicon);

      if (statusicon.css("color") != "rgb(0, 128, 0)") {
        statusicon.css("color", "rgb(0, 128, 0)");
        swal(
          "Yay!",
          "Estado del curso cambiado con exito, ahora todos pueden verlo!",
          "success"
        );
        // console.log("response ->>" + response);
        // console.log("secomprobo que no era verde");
        return;
      }

      swal("Oops!", "Este curso ya se encuentra publicado", "warning");
    },
    error: function (xhr) {
      swal("Oops", "Algo salio mal :(", "error");
      alert(
        "Status del return -> " +
          xhr.status +
          "Status del return en txt -> " +
          xhr.statusText +
          " " +
          "Texto del return -> " +
          xhr.responseText
      );
    },
  });
}

function unpublishCurso(id) {
  var idicon = id;
  $.ajax({
    type: "POST",
    url: "CursoController.php",
    data: {
      action: "unpublishCurso",
      id: id,
    },
    success: function (result) {
      var statusicon = $("#statusicon" + idicon);

      if (statusicon.css("color") != "rgb(255, 165, 0)") {
        statusicon.css("color", "rgb(255, 165, 0)");
        swal(
          "Yay!",
          "Estado del curso cambiado con exito, ahora SOLO TU puedes verlo!",
          "success"
        );
        console.log("se comprobo que no era naranja");
        return;
      }

      swal("Oops!", "Este curso ya se encuentra privado", "warning");
    },
    error: function (xhr) {
      swal("Oops", "Algo salio mal :(", "error");
      alert(
        "Status del return -> " +
          xhr.status +
          "Status del return en txt -> " +
          xhr.statusText +
          " " +
          "Texto del return -> " +
          xhr.responseText
      );
    },
  });
}

// $('.sharebtn').on("click", function showShareOpts(){
//     swal("Yay!","Link copiado al portapapeles","info");
//     let clink = $('.clink');
//     let cid = $('.cid');

//     for (let i = 0; i < clink.length; i++) {
//         // let href = clink.prop('href');
//         // console.log("link copiado-> " + href);
//         let cidcount = cid[i].value;
//         console.log("link copiado-> " + "http://localhost/Jujomi/Controllers/CursoController.php?curso=" + cidcount);
//         navigator.clipboard.writeText("http://localhost/Jujomi/Controllers/CursoController.php?curso=" + cidcount);
//     }
// })

var sectionTitle = document.getElementById("sectionTitle");
var formCurso1 = document.getElementById("form-curso-1");
var formCurso2 = document.getElementById("form-curso-2");
var formCurso3 = document.getElementById("form-curso-3");
var btnConfirm = document.getElementById("confirm");
var categoria = document.getElementById("ctg_c");
var sectionCategoria = document.getElementById("sectionCategoria");

// function enableSection1() {
//     if (formCurso1.style.display == "none") {
//         sectionTitle.innerHTML = 'Datos Basicos';
//         sectionCategoria.style.display = "inherit";
//         formCurso2.style.display = "none";
//         if (categoria.value != "") {
//             formCurso1.style.display = "block";
//             // btnConfirm.setAttribute("disabled", "disabled");
//         }
//     }
// }

// function enableSection2() {
//     if (formCurso2.style.display == "none") {
//         sectionCategoria.style.display = "none";
//         formCurso1.style.display = "none";
//         formCurso2.style.display = "block";
//         sectionTitle.innerHTML = 'Contenido';
//     }
// }

function nextStep() {
  if (formCurso1.style.display == "none") {
    formCurso1.style.display = "block";
  }
}

// console.log(categoria.value)
// console.log(sectionCategoria)

function enableBtn() {
  if (categoria.value == "") {
    console.log("nothing selected, btn disabled");
    formCurso1.style.display = "none";
    btnConfirm.setAttribute("disabled", "disabled");
  } else {
    btnConfirm.removeAttribute("disabled");
    console.log("button enabled");

    // console.log(categoria.value);
  }
  // if (!btnConfirm.attribute == "disabled") {
  //     btnConfirm.setAttribute("disabled");
  // }
}

// Insertar Contenido

var seccionCount = 2;
function addSeccion() {
  let accordionClassCount = [
    "One",
    "Two",
    "Three",
    "Four",
    "Five",
    "Six",
    "Seven",
    "Eight",
    "Nine",
    "Ten",
  ];
  let btnNuevaSeccion = document.getElementById("btnNuevaSeccion");
  console.log(accordionClassCount[accordionItemCount]);
  if (accordionItemCount <= 9) {
    // let accordionContainer = document.getElementById('accordionContainer');
    ClassCount = accordionClassCount[accordionItemCount];
    accordionItemCount++;
    $("#seccion_count").val(accordionItemCount);
    $("#accordionContainer").append(
      '<div class="accordion-item"> <h2 class="accordion-header" id="panelsStayOpen-heading' +
        ClassCount +
        '"> <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' +
        ClassCount +
        '" aria-expanded="true" aria-controls="panelsStayOpen-collapse' +
        ClassCount +
        '">' +
        accordionItemCount +
        '. <input type="text" name="titulo_secc' +
        accordionItemCount +
        '" class="bg-light rounded border border-0" placheholder="Mi nueva sección"> </button> </h2> <div id="panelsStayOpen-collapse' +
        ClassCount +
        '" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading' +
        ClassCount +
        '"> <div class="accordion-body accordion-body-id' +
        accordionItemCount +
        '"> <div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3 overflow-scroll acc-body"><div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' +
        accordionItemCount +
        '">Titulo de la Leccion</label><br><input type="text" name="titulo_lecc' +
        accordionItemCount +
        '" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div><div class="row mb-5"><div id="editor' +
        accordionItemCount +
        '"><p>Hello World!</p></div></div></div>' +
        "'" +
        ' </div> <div class="row justify-content-end mbs-2"> <div class="col-md-1 d-flex justify-content-center"> <button type="button" class="btn text-center" id="addLeccionbtn' +
        accordionItemCount +
        '" onclick="addLeccion' +
        accordionItemCount +
        '()"> <i class="fa-solid fa-plus"></i> </button> </div> </div> </div> </div>'
    );

    // $("#main").append(
    //   "<script>function addLeccion" +
    //     accordionItemCount +
    //     '() {accordionItemCount2++; $("#addLeccionbtn' +
    //     accordionItemCount +
    //     '").addClass("d-none") ; let accordion = $(".accordion-body-id' +
    //     accordionItemCount +
    //     '");console.log(accordion); accordion.append(' +
    //     "'" +
    //     '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3 overflow-scroll acc-body"><div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' +
    //     accordionItemCount +
    //     '">Titulo de la Leccion</label><br><input type="text" name="titulo_lecc' +
    //     accordionItemCount +
    //     '" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div><div class="row mb-5"><div id="editor' +
    //     accordionItemCount +
    //     '"><p>Hello World!</p></div></div></div>' +
    //     "'" +
    //     '); var editor = new Quill("#editor' +
    //     accordionItemCount +
    //     '", options);}'
    // );

    main.append(
      '<script>var editor = new Quill("#editor' +
        accordionItemCount +
        '", options); $("#addLeccionbtn' +
        accordionItemCount +
        '").addClass("d-none") ; </script>'
    );
  } else {
    alert("Haz alcanzado el maximo de secciónes, en un futuro seran más");
    btnNuevaSeccion.setAttribute("disabled", "disabled");
  }
  // console.log(accordionItemCount++);
}
// function addLeccion1() {
//     accordionItemCount2++;

//     let accordion = $('.accordion-body-id1');
//     // for (let i = 0; i < accordion.length; i++) {
//         console.log(accordion);
//         // console.log(i);
//         accordion.append(/*'<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3"> <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div> <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex">  <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div" class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>'*/
//         '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3 overflow-scroll acc-body"><div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Leccion</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div><div class="row mb-5"><!-- editor container --><div id="editor' + accordionItemCount2 +'"><p>Hello World!</p></div></div></div>');

//         main.append('<script>var editor = new Quill("#editor' + accordionItemCount2 + '", options);</script>')

//         // accordionItemCount2++;

//         // accordion[i].append();
//         // }
//     }

function imgpreview() {
  const imgInput = document.getElementById("img_c");
  const imgLabel = document.getElementById("img-label");
  const imgPreview = document.getElementById("img-preview");
  imgInput.addEventListener("change", function () {
    getImgData();
  });
  function getImgData() {
    const files = imgInput.files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function () {
        imgPreview.style.display = "block";
        imgLabel.style.display = "none";
        imgPreview.innerHTML =
          '<img src="' + this.result + '" width="200px" />';
      });
    }
  }
}



/*
    function showImageUploader1() { 
        let chooseContent1 = $(".chooseContent1");
        let imageContent1 = $(".imageContent1"); 
        // chooseContent1[i].style.display = "none";
        for (let i = 0; i < imageContent1.length; i++) { 
            console.log(imageContent1[i]); 
            imageContent1[i].style.display = "block"; 
        } 
        for (let a = 0; a < chooseContent1.length; a++) { 
            chooseContent1[a].style.display = "none"; 
        }
        const imgInput1 = document.getElementById("img_secc1"); 
        const imgLabel1 = $("#img-secc-label1"); 
        const imgPreview1 = $("#img-secc-preview1");
        imgInput1.addEventListener("change", function() {
            getImgData(); 
        });
        function getImgData() { 
            const files = imgInput1.files[0]; 
            if (files) { 
                const fileReader = new FileReader(); 
                fileReader.readAsDataURL(files); 
                fileReader.addEventListener("load", function() { 
                    imgPreview1.css('display', 'block');
                    imgLabel1.css('display', 'none');
                    imgPreview1.html('<img src="' + this.result + '" width="200px" />');
                })
            }
    }
    }
    function addLeccion2() {accordionItemCount2++;
    let accordion = document.getElementsByClassName("accordion-body-id2"); for (let i = 0; i < accordion.length; i++) { 
                accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
            }
}
function addLeccion3() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id3"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion4() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id4"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion5() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id5"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion6() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id6"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion7() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id7"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion8() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id8"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion9() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id8"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}
function addLeccion10() {accordionItemCount2++;
let accordion = document.getElementsByClassName("accordion-body-id10"); for (let i = 0; i < accordion.length; i++) { 
        accordion[i].innerHTML += '<div class="row tex-center flex-direction-center justify-content-center border p-4 mb-3">  <div class="row text-center d-flex justify-content-center p-4"><div class="col-5"><label for="titulo_lecc' + accordionItemCount2 +'">Titulo de la Lección</label><br><input type="text" name="titulo_lecc' + accordionItemCount2 +'" class="bg-light form-control form-control-sm" placheholder="Mi nueva sección"></div></div>  <div class="row flex-direction-center justify-content-center chooseContent' + accordionItemCount2 +'" style="display:flex"> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn" onclick="showImageUploader' + accordionItemCount2 +'()"> <i class="fa-solid fa-image"></i> <br> <small>Imagen</small> </button> </div> <div class="col-2 tex-center d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-video"></i> <br> <small>Video</small> </button> </div> <div class="col-2 d-flex justify-content-center"> <button type="button" class="btn"> <i class="fa-solid fa-font"></i> <br> <small>Texto</small> </button> </div> </div> <div class="row tex-center d-flex flex-direction-center justify-content-center"> <div class="col-md-3"> <input type="file" name="img_secc' + accordionItemCount2 +'" id="img_secc' + accordionItemCount2 +'" accept="image/*" style="opacity:0;position:absolute;top: -1000px;"> <label for="img_secc' + accordionItemCount2 +'" style="height:100%; margin:auto;display: none;" class="form-control text-center pt-4 hover imageContent' + accordionItemCount2 +'"> <div id="img-secc-preview' + accordionItemCount2 +'"></div> <div id="img-secc-label' + accordionItemCount2 +'"> <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo"> <br> <span> Elegir Archivo<br> </span> <!-- <span class="fst-italic"> Tamaño recomendado 1280 x 720 píxeles </span> --> </div> </label> </div> <div class="col-md-7 imageContent' + accordionItemCount2 +'" style="display:none"> <div class="col-md-7 imageContent' + accordionItemCount2 + '" style="display:none"><input type="text" name="text_lecc' + accordionItemCount2 +'" class="form-control form-control-lg" value="Click here to add a description"></div> </div> </div> </div>';
    }
}

function showImageUploader2() { 
    let chooseContent2 = document.getElementsByClassName("chooseContent2");
    let imageContent2 = document.getElementsByClassName("imageContent2"); 
    // chooseContent2[i].style.display = "none";
    for (let i = 0; i < imageContent2.length; i++) { 
        console.log(imageContent2[i]); 
        imageContent2[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent2.length; a++) { 
        chooseContent2[a].style.display = "none"; 
    }
    const imgInput2 = document.getElementById("img_secc2"); 
    const imgLabel2 = document.getElementById("img-secc-label2"); 
    const imgPreview2 = document.getElementById("img-secc-preview2");
    imgInput2.addEventListener("change", function() {
        getImgData2(); 
    });
    function getImgData2() { 
        const files = imgInput2.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview2.style.display = "block"; 
                imgLabel2.style.display = "none"; 
                imgPreview2.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader3() { 
    let chooseContent3 = document.getElementsByClassName("chooseContent3");
    let imageContent3 = document.getElementsByClassName("imageContent3"); 
    // chooseContent3[i].style.display = "none";
    for (let i = 0; i < imageContent3.length; i++) { 
        console.log(imageContent3[i]); 
        imageContent3[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent3.length; a++) { 
        chooseContent3[a].style.display = "none"; 
    }
    const imgInput3 = document.getElementById("img_secc3"); 
    const imgLabel3 = document.getElementById("img-secc-label3"); 
    const imgPreview3 = document.getElementById("img-secc-preview3");
    imgInput3.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput3.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview3.style.display = "block"; 
                imgLabel3.style.display = "none"; 
                imgPreview3.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader4() { 
    let chooseContent4 = document.getElementsByClassName("chooseContent4");
    let imageContent4 = document.getElementsByClassName("imageContent4"); 
    // chooseContent4[i].style.display = "none";
    for (let i = 0; i < imageContent4.length; i++) { 
        console.log(imageContent4[i]); 
        imageContent4[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent4.length; a++) { 
        chooseContent4[a].style.display = "none"; 
    }
    const imgInput4 = document.getElementById("img_secc4"); 
    const imgLabel4 = document.getElementById("img-secc-label4"); 
    const imgPreview4 = document.getElementById("img-secc-preview4");
    imgInput4.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput4.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview4.style.display = "block"; 
                imgLabel4.style.display = "none"; 
                imgPreview4.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader5() { 
    let chooseContent5 = document.getElementsByClassName("chooseContent5");
    let imageContent5 = document.getElementsByClassName("imageContent5"); 
    // chooseContent5[i].style.display = "none";
    for (let i = 0; i < imageContent5.length; i++) { 
        console.log(imageContent5[i]); 
        imageContent5[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent5.length; a++) { 
        chooseContent5[a].style.display = "none"; 
    }
    const imgInput5 = document.getElementById("img_secc5"); 
    const imgLabel5 = document.getElementById("img-secc-label5"); 
    const imgPreview5 = document.getElementById("img-secc-preview5");
    imgInput5.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput5.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview5.style.display = "block"; 
                imgLabel5.style.display = "none"; 
                imgPreview5.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader6() { 
    let chooseContent6 = document.getElementsByClassName("chooseContent6");
    let imageContent6 = document.getElementsByClassName("imageContent6"); 
    // chooseContent6[i].style.display = "none";
    for (let i = 0; i < imageContent6.length; i++) { 
        console.log(imageContent6[i]); 
        imageContent6[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent6.length; a++) { 
        chooseContent6[a].style.display = "none"; 
    }
    const imgInput6 = document.getElementById("img_secc6"); 
    const imgLabel6 = document.getElementById("img-secc-label6"); 
    const imgPreview6 = document.getElementById("img-secc-preview6");
    imgInput6.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput6.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview6.style.display = "block"; 
                imgLabel6.style.display = "none"; 
                imgPreview6.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader7() { 
    let chooseContent7 = document.getElementsByClassName("chooseContent7");
    let imageContent7 = document.getElementsByClassName("imageContent7"); 
    // chooseContent7[i].style.display = "none";
    for (let i = 0; i < imageContent7.length; i++) { 
        console.log(imageContent7[i]); 
        imageContent7[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent7.length; a++) { 
        chooseContent7[a].style.display = "none"; 
    }
    const imgInput7 = document.getElementById("img_secc7"); 
    const imgLabel7 = document.getElementById("img-secc-label7"); 
    const imgPreview7 = document.getElementById("img-secc-preview7");
    imgInput7.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput7.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview7.style.display = "block"; 
                imgLabel7.style.display = "none"; 
                imgPreview7.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader8() { 
    let chooseContent8 = document.getElementsByClassName("chooseContent8");
    let imageContent8 = document.getElementsByClassName("imageContent8"); 
    // chooseContent8[i].style.display = "none";
    for (let i = 0; i < imageContent8.length; i++) { 
        console.log(imageContent8[i]); 
        imageContent8[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent8.length; a++) { 
        chooseContent8[a].style.display = "none"; 
    }
    const imgInput8 = document.getElementById("img_secc8"); 
    const imgLabel8 = document.getElementById("img-secc-label8"); 
    const imgPreview8 = document.getElementById("img-secc-preview8");
    imgInput8.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput8.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview8.style.display = "block"; 
                imgLabel8.style.display = "none"; 
                imgPreview8.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader9() { 
    let chooseContent9 = document.getElementsByClassName("chooseContent9");
    let imageContent9 = document.getElementsByClassName("imageContent9"); 
    // chooseContent9[i].style.display = "none";
    for (let i = 0; i < imageContent9.length; i++) { 
        console.log(imageContent9[i]); 
        imageContent9[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent9.length; a++) { 
        chooseContent9[a].style.display = "none"; 
    }
    const imgInput9 = document.getElementById("img_secc9"); 
    const imgLabel9 = document.getElementById("img-secc-label9"); 
    const imgPreview9 = document.getElementById("img-secc-preview9");
    imgInput9.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput9.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview9.style.display = "block"; 
                imgLabel9.style.display = "none"; 
                imgPreview9.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}
function showImageUploader10() { 
    let chooseContent10 = document.getElementsByClassName("chooseContent10");
    let imageContent10 = document.getElementsByClassName("imageContent10"); 
    // chooseContent10[i].style.display = "none";
    for (let i = 0; i < imageContent10.length; i++) { 
        console.log(imageContent10[i]); 
        imageContent10[i].style.display = "block"; 
    } 
    for (let a = 0; a < chooseContent10.length; a++) { 
        chooseContent10[a].style.display = "none"; 
    }
    const imgInput10 = document.getElementById("img_secc10"); 
    const imgLabel10 = document.getElementById("img-secc-label10"); 
    const imgPreview10 = document.getElementById("img-secc-preview10");
    imgInput10.addEventListener("change", function() {
        getImgData(); 
    });
    function getImgData() { 
        const files = imgInput10.files[0]; 
        if (files) { 
            const fileReader = new FileReader(); 
            fileReader.readAsDataURL(files); 
            fileReader.addEventListener("load", function() { 
                imgPreview10.style.display = "block"; 
                imgLabel10.style.display = "none"; 
                imgPreview10.innerHTML = '<img src="' + this.result + '" width="200px" />';
            })
        }
}
}

img Preview in section 1
const imgInput = document.getElementById("img_c");
const imgLabel = document.getElementById("img-label");
const imgPreview = document.getElementById("img-preview");

imgInput.addEventListener("change", function() {
    getImgData();
});

function getImgData() {
    const files = imgInput.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
            imgPreview.style.display = "block";
            imgLabel.style.display = "none";
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });
    }
}*/
