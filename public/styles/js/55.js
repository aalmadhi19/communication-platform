

// Wizard form
$(document).ready(function(){

// Step show event
$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
    //alert("You are on step "+stepNumber+" now");
    if(stepPosition === 'first'){
        $("#prev-btn").addClass('disabled');
    }else if(stepPosition === 'final'){
        $("#next-btn").addClass('disabled');
    }else{
        $("#prev-btn").removeClass('disabled');
        $("#next-btn").removeClass('disabled');
    }
  });
  
  // Toolbar extra buttons
  var btnFinish = $('<button></button>').text('إرسال')
                                  .addClass('btn-green')
                                  .on('click', function sweetalertclick(){swal('تم الارسال بنجاح','','success'); });
  var btnCancel = $('<button></button>').text('إلغاء')
                                  .addClass('btn-danger_02')
                                  .on('click', function(){ $('#smartwizard').smartWizard("reset"); });
  
  
  //Wizard theme
  $('#smartwizard').smartWizard({
          selected: 0,
          theme: 'dots',
          transitionEffect:'fade',
          showStepURLhash: true,
          toolbarSettings: {toolbarPosition: 'both',
                            toolbarButtonPosition: 'end',
                            toolbarExtraButtons: [btnFinish, btnCancel]
                          },
                          lang: { // Language variables for button
                                  next: 'التالي',
                                  previous: 'السابق'
                          },
                          transition: {
        animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
        speed: '400', // Transion animation speed
        easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
    }
  
                          
  })

  });

// SweetAlert
function sweetalertclick(){
  swal(
    'تم الحفظ بنجاح',
    '',
    'success'
  )
  }
  function sweetalertclick2(){
    swal(
      'تم فتح الجلسة',
      '',
      'success'
    )
    }
    function sweetalertclick3(){
      swal(
        'تم غلق الجلسة',
        '',
        'success'
      )
      }
      function sweetalertclick4(){
        swal(
          'تم الارسال',
          '',
          'success'
        )
        }
        function sweetalertclick5(){
          swal(
            'تم انهاء التأهيل ',
            '',
            'success'
          )
          }
// ScrollTop
  $(document).ready(function() {
    $(window).scroll(function() {
    if ($(this).scrollTop() > 20) {
    $('#toTopBtn').fadeIn();
    } else {
    $('#toTopBtn').fadeOut();
    }
    });

    $('#toTopBtn').click(function() {
    $("html, body").animate({
    scrollTop: 0
    }, 1000);
    return false;
    });
    });

    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      var actions = $("table td:last-child").html();

      // Add row on add button click
      $(document).on("click", ".add", function(){
        var empty = false;
        var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function(){
          if(!$(this).val()){
            $(this).addClass("error");
            empty = true;
          } else{
                    $(this).removeClass("error");
                }
        });
        $(this).parents("tr").find(".error").first().focus();
        if(!empty){
          input.each(function(){
            $(this).parent("td").html($(this).val());
          });			
          $(this).parents("tr").find(".add, .edit").toggle();
          $(".add-new").removeAttr("disabled");
        }		
        });
      // Edit row on edit button click
      $(document).on("click", ".edit", function(){		
            $(this).parents("tr").find("td:not(:last-child)").each(function(){
          $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
        });		
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
        });
      // Delete row on delete button click
      $(document).on("click", ".delete", function(){
            $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
        });
    });

    
// TimeDate
  $(function () {
    initDefault();
});
function initDefault() {
    $("#hijri-picker").hijriDatePicker({
        hijri:true,
        showSwitcher:false
    });
}

    // TimeDate Class
    $(function () {
      initDefault();
  });
  function initDefault() {
      $(".hijri-picker").hijriDatePicker({
          hijri:true,
          showSwitcher:true // >> true Hijri & Miladi | false >> Hijri
      });
  }

// Button Print
function myPrint() {
  window.print();
}

// Show File Value After File Select */
$(function() {
  $(document).on('change', ':file', function() {var input = $(this), numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');input.trigger('fileselect', [numFiles, label]);
  });
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {var input = $(this).parents('.custom-file').find('.custom-file-label'),
      log = numFiles > 1 ? numFiles + ' files selected' : label;if( input.length ) {input.text(log);} else {if( log ) alert(log);}});
  });
});


// Button Loading
$(document).ready(function() {
  $('.btn').on('click', function() {
    var $this = $(this);
    var loadingText = 'جاري الحفظ .. <i class="fa fa-circle-o-notch fa-spin"></i>';
    if ($(this).html() !== loadingText) {
      $this.data('original-text', $(this).html());
      $this.html(loadingText);
    }
    setTimeout(function() {
      $this.html($this.data('original-text'));
    }, 2000);
  });
})



$(document).ready(function () {
  var counter = 0;

  $("#addrow").on("click", function () {

      counter = $('#myTable_01 tr').length - 2;

      var newRow = $("<tr>");
      var cols = "";

      cols += '<td><input type="text" class="form-control form-control-lg" placeholder="مثال : محمدعبدالعال" name="name' + counter + '"></td>';
      cols += '<td><input type="text" class="form-control form-control-lg" placeholder="مثال : 012000000000" name="id1' + counter + '"></td>';

      cols += '<td><input type="button" class="btn_btn btn-danger_btn btn-block ibtnDel"  value="الغاء"></td>';
      newRow.append(cols);
      if (counter == 6) $('#addrow').attr( true);
      $("table.mytable_00").append(newRow);
      counter++;
  });

  $("table.mytable_00").on("change", 'input[name^="id1"]', function (event) {
      calculateRow($(this).closest("tr"));
      calculateGrandTotal();                
  });


  $("table.mytable_00").on("click", ".ibtnDel", function (event) {
      $(this).closest("tr").remove();
      calculateGrandTotal();
      
      counter -= 1
      $('#addrow').attr( false).prop('value', "Add Row");
  });


});

function calculateRow(row) {
  var id1 = +row.find('input[name^="id1"]').val();

}

function calculateGrandTotal() {
  var grandTotal = 0;
  $("table.mytable_00").find('input[name^="id1"]').each(function () {
      grandTotal += +$(this).val();
  });
}


//wizard form
const DOMstrings = {
  stepsBtnClass: 'wizard-form_pro-btn',
  stepsBtns: document.querySelectorAll(`.wizard-form_pro-btn`),
  stepsBar: document.querySelector('.wizard-form_pro'),
  stepsForm: document.querySelector('.wizard-form_form'),
  stepsFormTextareas: document.querySelectorAll('.wizard-form__textarea'),
  stepFormPanelClass: 'wizard-form_panel',
  stepFormPanels: document.querySelectorAll('.wizard-form_panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {

  const eventTarget = e.target;

  //check if we clicked on `PREV` or NEXT` buttons
  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
    return;
  }

  //find active panel
  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  //set active step and active panel onclick
  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;

  } else {

    activePanelNum++;

  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);

});

//SETTING PROPER FORM HEIGHT ONLOAD
window.addEventListener('load', setFormHeight, false);

//SETTING PROPER FORM HEIGHT ONRESIZE
window.addEventListener('resize', setFormHeight, false);

//changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});

//SortTable
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


