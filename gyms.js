/* eslint-disable no-param-reassign */
/* eslint-disable no-restricted-globals */
/* eslint-disable no-shadow */
/* eslint-disable max-len */
/* eslint-disable camelcase */
/* eslint-disable no-continue */
/* eslint-disable no-plusplus */
/* eslint-disable no-use-before-define */
/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
// eslint-disable-next-line no-undef
const instructEdit = document.getElementById('editInstruct');
const inPlus = document.getElementById('plusInstructor');
const inSub = document.getElementById('instructSub');
const inCan = document.getElementById('instructCan');
const inDesOut = document.getElementsByClassName('desOut');
const inDesIn = document.getElementsByClassName('desIn');
const priceDesIn = document.getElementsByClassName('priceDesIn');
const priceDesOut = document.getElementsByClassName('priceDesOut');
const priceIn = document.getElementsByClassName('priceIn');
const priceOut = document.getElementsByClassName('priceOut');
const priceLink = document.getElementById('priceLink');
const priceLinkOut = document.getElementById('priceLinkOut');
const priceLinkHint = document.getElementById('fullPrice');
const editSchedule = document.getElementById('editSchedule');
const scheduleIn = document.getElementsByClassName('scheduleIn');
const scheduleOut = document.getElementById('scheduleLinkOut');
const scheduleCan = document.getElementById('scheduleCan');
const editChecks = document.getElementById('editChecks');
const facilityCheck = document.getElementsByClassName('facilityCheck');
const facilityIcons = document.getElementById('facilityIcons');
const checksIn = document.getElementsByClassName('checksIn');
const checkCan = document.getElementById('checksCan');
const classesCheck = document.getElementsByClassName('classesCheck');
const classTicks = document.getElementsByClassName('fa-check-circle');
const classText = document.getElementsByClassName('classText');
const classCrosses = document.getElementsByClassName('fa-times-circle');
const editDes = document.getElementById('editDes');
const desIn = document.getElementById('gymDesIn');
const desOut = document.getElementById('gymDesout');
const desSub = document.getElementById('gymDesSub');
const cancel1 = document.getElementById('cancel1');
const slideContain = document.getElementById('slideshow-container');
const displayImg = document.getElementById('displayImg');
const showmap = document.getElementById('embeddedMapContain');
const gymDes = document.getElementById('gymDesout');
const readMore = document.getElementById('readMore2');
const readLess = document.getElementById('readLess2');
const pagesecmenu = document.getElementById('pageSecContain');
const pageseclinks = document.getElementsByClassName('pageSecLinks');
const pagesectab = document.getElementsByClassName('pageSecTab');
const bottomLine = document.getElementsByClassName('bottomLine');
const visitT = document.getElementById('visitt');
const plink = document.getElementById('plink');
const schedulet = document.getElementById('schedulet');
const slink = document.getElementById('slink');
const bigCon = document.getElementById('BigContain');
const scheduleP = document.getElementById('scheduleP');
const checkB = document.getElementById('checkB');
const disappear = document.getElementsByClassName('disappear');
const icons = document.getElementsByClassName('icons');
const iconNotes = document.getElementsByClassName('iconNote');

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

editDes.addEventListener('click', () => {
  desIn.style.display = 'block';
  desOut.style.display = 'none';
  desSub.style.display = 'block';
  cancel1.style.display = 'block';
});

cancel1.addEventListener('click', () => {
  cancel1.style.display = 'none';
  desIn.style.display = 'none';
  desSub.style.display = 'none';
  desOut.style.display = 'block';
  desOut.style.margin = '0 auto';
});

function isOverflown(element) {
  return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
}

function showMore() {
  readMore.style.display = 'none';
  readLess.style.display = 'inline-block';
  gymDes.style.maxHeight = '400px';
}

function showLess() {
  readMore.style.display = 'inline-block';
  readLess.style.display = 'none';
  gymDes.style.maxHeight = '105px';
}

window.onload = function () {
  if (isOverflown(gymDes)) {
    readMore.style.display = 'block';
  } else {
    readMore.style.display = 'none';
  }

  const imgUp = document.getElementById('uploadImages');
  const imgRules = document.getElementById('imgRules');

  imgUp.addEventListener('mouseover', () => {
    imgRules.style.opacity = '100';
    imgRules.style.zIndex = '0';
  });
  imgUp.addEventListener('mouseout', () => {
    imgRules.style.opacity = '0';
    imgRules.style.zIndex = '-1';
  });

  $('#_imagesInput').on('change', () => {
    const output = document.getElementById('carousel-inner');

    output.innerHTML = '';
    handleFileSelect();
  });
};

const imageArray = [];

function handleFileSelect(e) {
  // Check File API support
  if (window.File && window.FileList && window.FileReader) {
    const { files } = e.target; // FileList object
    const output = document.getElementById('carousel-inner');
    const arrFilesCount = [];
    const start = $(output).find('li').length;
    const display = document.getElementById('displayImg');
    const end = start + files.length;
    let nonImgCount = 0;

    // eslint-disable-next-line no-plusplus
    for (let i = start; i < end; i++) {
      arrFilesCount.push(i); // push to array
    }

    if (start !== 0) {
      $(output)
        .find('li > nav > a.prev')
        .first()
        .attr('href', `#slide-${end - 1}`);
      $(output)
        .find('li > nav > a.next')
        .last()
        .attr('href', `#slide-${start}`);
    }

    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const readFile = URL.createObjectURL(files[i]);

      // Only pics
      if (!file.type.match('image')) {
        nonImgCount++;
        continue;
      }

      const picReader = new FileReader();
      // eslint-disable-next-line no-loop-func
      picReader.addEventListener('load', (event) => {
        const picFile = event.target;

        current_i = arrFilesCount.shift();
        if (current_i === 0) {
          prev_i = files.length - 1; // This is for the first element. The previous slide will be the last image. (i=length-1)
        } else {
          prev_i = current_i - 1;
        }
        if (arrFilesCount.length - nonImgCount === 0) {
          next_i = 0;
        } else {
          next_i = current_i + 1; // This is for the last element. The next slide will be the first image (i=0)
        }

        if (current_i === 0) {
          output.innerHTML = `${output.innerHTML
          }<li id="slide-${
            current_i
          }" class="carousel-item active" name = "slide-${
            current_i
          }">`
            + `<img class='d-block w-100' src='${
              picFile.result
            }'`
            + 'title=\'\'/>'
            + '</li>';
        } else {
          output.innerHTML = `${output.innerHTML
          }<li id="slide-${
            current_i
          }" class="carousel-item" name = "slide-${
            current_i
          }">`
            + `<img class='d-block w-100' src='${
              picFile.result
            }'`
            + 'title=\'\'/>'
            + '</li>';
        }

        const save = document.getElementById('savePics');
        const cancel = document.getElementById('cancelPics');
        const upload = document.getElementById('uploadImages');

        save.style.display = 'block';
        cancel.style.display = 'block';
        upload.style.display = 'none';

        cancel.addEventListener('click', () => {
          window.location.reload(true);
        });

        if (current_i === 0) {
          display.src = picFile.result;
        }
      });
      // Read the image
      picReader.readAsDataURL(file);
    }
  } else {
    console.log('Your browser does not support File API');
  }
}

function fasterPreview2(uploader, image, cancelID, saveID, upID) {
  if (uploader.files && uploader.files[0]) {
    $(image).attr('src', window.URL.createObjectURL(uploader.files[0]));
  }

  const save = document.getElementById(saveID);
  const cancel = document.getElementById(cancelID);
  const upload = document.getElementById(upID);

  save.style.display = 'block';
  cancel.style.display = 'block';
  upload.style.display = 'none';

  cancel.addEventListener('click', () => {
    window.location.reload();
  });
}

for (let i = 0; i < pageseclinks.length; i++) {
  pageseclinks[i].addEventListener('mouseover', () => {
    bottomLine[i].style.width = '17.45%';
    pagesectab[i].style.color = '#AD0E2C';
  });
}

for (let i = 0; i < pageseclinks.length; i++) {
  pageseclinks[i].addEventListener('mouseout', () => {
    bottomLine[i].style.width = '0px';
    pagesectab[i].style.color = 'white';
  });
}

function showslide() {
  slideContain.style.display = 'block';
  displayImg.style.display = 'none';
}

function hideslide() {
  slideContain.style.display = 'none';
  displayImg.style.display = 'block';
}

function showMap() {
  showmap.style.display = 'block';
  displayImg.style.display = 'none';
}

function hideMap() {
  showmap.style.display = 'none';
  displayImg.style.display = 'block';
}

const other = document.getElementById('other');
const otherCheck = document.getElementById('otherCheck');

otherCheck.addEventListener('change', function () {
  if (this.checked) {
    other.style.display = 'block';
  } else {
    other.style.display = 'none';
  }
});

const beltOut = document.getElementsByClassName('beltLevelOut');
const beltIn = document.getElementsByClassName('beltLevelIn');
const nameOut = document.getElementsByClassName('titOut');
const imgsup = document.getElementsByClassName('inup');
const nameIn = document.getElementsByClassName('titIn');

const plusInstructor = document.getElementById('plusInstructor');

let i = 0;

let plusClicked = 0;

plusInstructor.addEventListener('click', () => {
  plusClicked++;
  const cardLength = document.getElementsByClassName('inAccord').length;

  i = cardLength - 1;

  i++;

  const instructorForm = document.getElementById('instructorForm');

  const appendedCard = `<div class="inAccord" id="instructors${
    i
  }"><div id = "inCard${
    i
  }" = class="inCard"><div class="instruct-card" id="inPic${
    i
  }" data-toggle="collapse" data-target="#inCollapse${
    i
  }" aria-expanded="true" aria-controls="collapse${
    i
  }"><img id = "InImage${
    i
  }" class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif"><button type= "button" class="inup" id ="inup${
    i
  }"><i class="fas fa-file-upload"></i></button><div class="candTContainer"><input name="instructorName${
    i
  }" id="instructorNameTemp${
    i
  }" class="titIn" placeholder="Name"></input><div style="display:none;" class="titOut"></div><div class=tAndDropCon"><div class="drop"><label class="beltLabel" for="belts">Belt:</label><div class="beltLevelOut" style="display:none;"></div><select  id="beltLevelTemp${
    i
  }" class="beltLevelIn" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></div></div></div></div><div id="inCollapse${
    i
  }" class="collapse hide" aria-labelledby="inPic${
    i
  }" data-parent="#inCard${
    i
  }"><div class="card-body"><div class="desOut" style="display:none;" id ="instructorDesOut${
    i
  }"></div><textarea class="desIn" name="instructorDes${
    i
  }" id="instructorDesTemp${
    i
  }" placeholder="Describe your instructor here."></textarea></div></div></div></div>`;

  appendedHTML = [];

  appendedHTML.push(appendedCard);

  if (cardLength < 5) {
    instructorForm.innerHTML += appendedCard;

    copyVal('#instructorNameTemp0', '#instructorUp0');
    copyVal('#instructorNameTemp1', '#instructorUp1');
    copyVal('#instructorNameTemp2', '#instructorUp2');
    copyVal('#instructorNameTemp3', '#instructorUp3');
    copyVal('#instructorNameTemp4', '#instructorUp4');

    copyVal('#instructorDesTemp0', '#instructorDesUp0');
    copyVal('#instructorDesTemp1', '#instructorDesUp1');
    copyVal('#instructorDesTemp2', '#instructorDesUp2');
    copyVal('#instructorDesTemp3', '#instructorDesUp3');
    copyVal('#instructorDesTemp4', '#instructorDesUp4');

    copySelect('#beltLevelTemp0', '#beltLevelUp0');
    copySelect('#beltLevelTemp1', '#beltLevelUp1');
    copySelect('#beltLevelTemp2', '#beltLevelUp2');
    copySelect('#beltLevelTemp3', '#beltLevelUp3');
    copySelect('#beltLevelTemp4', '#beltLevelUp4');
  } else {
    alert("You've reached your maximum number of instructors!");
    plusClicked--;
  }

  for (i = 0; i < imgsup.length; i++) {
    elementDisBlock(imgsup[i]);
    elementDisBlock(inDesIn[i]);
    elementDisNone(inDesOut[i]);
    elementDisBlock(beltIn[i]);
    elementDisNone(beltOut[i]);
    elementDisBlock(nameIn[i]);
    elementDisNone(nameOut[i]);
  }

  $('#inup0').click((e) => {
    $('#imageUpload0').click();
  });

  $('#inup1').click((e) => {
    $('#imageUpload1').click();
  });

  $('#inup2').click((e) => {
    $('#imageUpload2').click();
  });

  $('#inup3').click((e) => {
    $('#imageUpload3').click();
  });

  $('#inup4').click((e) => {
    $('#imageUpload4').click();
  });

  function copyVal(source, output) {
    $(source).on('keyup', function () {
      const val = $(this).val();
      $(output).val(val);
    });
  }

  function copySelect(source, output) {
    $(source).on('change', function () {
      const val = $(this).val();
      $(output).val(val);
    });
  }

  $('#imageUpload0').change(function () {
    fasterPreview(this, '#InImage0');
  });

  $('#imageUpload1').change(function () {
    fasterPreview(this, '#InImage1');
  });

  $('#imageUpload2').change(function () {
    fasterPreview(this, '#InImage2');
  });

  $('#imageUpload3').change(function () {
    fasterPreview(this, '#InImage3');
  });

  $('#imageUpload4').change(function () {
    fasterPreview(this, '#InImage4');
  });
});

function fasterPreview(uploader, image) {
  if (uploader.files && uploader.files[0]) {
    $(image).attr('src', window.URL.createObjectURL(uploader.files[0]));
  }
}

const inMinus = document.getElementById('minusInstructor');
const inPlus2 = document.getElementById('plusInstructor');
const cardArray = document.getElementsByClassName('inAccord');
const instructorRuleMinus = document.getElementById('instructorRuleMinus');
const instructorRulePlus = document.getElementById('instructorRulePlus');

inMinus.addEventListener('click', () => {
  if (
    confirm(
      'Are you sure you want to delete the last instructor in your list? All their information will be permanently deleted',
    )
  ) {
    cardArray[cardArray.length - 1].remove();
    const instructUp = document.getElementById(`instructorUp${cardArray.length}`);
    console.log(instructUp.id);
    instructUp.value = 'deleted';
  }
});

inMinus.addEventListener('mouseover', () => {
  instructorRuleMinus.style.opacity = '100%';
  instructorRuleMinus.style.zIndex = '0';
});

inMinus.addEventListener('mouseout', () => {
  instructorRuleMinus.style.opacity = '0%';
  instructorRuleMinus.style.zIndex = '-1';
});

inPlus2.addEventListener('mouseover', () => {
  instructorRulePlus.style.opacity = '100%';
  instructorRulePlus.style.zIndex = '0';
});

inPlus2.addEventListener('mouseout', () => {
  instructorRulePlus.style.opacity = '0%';
  instructorRulePlus.style.zIndex = '-1';
});

function resetIds(idName, className) {
  for (i = 0; i < className.length; i++) {
    className[i].id = idName + i;
  }
}

function resetDataTarget(dataName, className) {
  for (i = 0; i < className.length; i++) {
    className[i].dataset.target = dataName + i;
    className[i].dataset.parent = dataName + i;
  }
}

instructEdit.addEventListener('click', () => {
  copyVal('#instructorNameTemp0', '#instructorUp0');
  copyVal('#instructorNameTemp1', '#instructorUp1');
  copyVal('#instructorNameTemp2', '#instructorUp2');
  copyVal('#instructorNameTemp3', '#instructorUp3');
  copyVal('#instructorNameTemp4', '#instructorUp4');

  copyVal('#instructorDesTemp0', '#instructorDesUp0');
  copyVal('#instructorDesTemp1', '#instructorDesUp1');
  copyVal('#instructorDesTemp2', '#instructorDesUp2');
  copyVal('#instructorDesTemp3', '#instructorDesUp3');
  copyVal('#instructorDesTemp4', '#instructorDesUp4');

  copySelect('#beltLevelTemp0', '#beltLevelUp0');
  copySelect('#beltLevelTemp1', '#beltLevelUp1');
  copySelect('#beltLevelTemp2', '#beltLevelUp2');
  copySelect('#beltLevelTemp3', '#beltLevelUp3');
  copySelect('#beltLevelTemp4', '#beltLevelUp4');

  $('#inup0').click((e) => {
    $('#imageUpload0').click();
  });

  $('#inup1').click((e) => {
    $('#imageUpload1').click();
  });

  $('#inup2').click((e) => {
    $('#imageUpload2').click();
  });

  $('#inup3').click((e) => {
    $('#imageUpload3').click();
  });

  $('#inup4').click((e) => {
    $('#imageUpload4').click();
  });

  beltTemp = document.getElementsByClassName('beltLevelUp');

  for (i = 0; i < beltIn.length; i++) {
    if (beltOut[i].innerHTML !== '') {
      beltIn[i].value = beltOut[i].innerHTML;
      beltTemp[i].value = beltOut[i].innerHTML;
    }
  }

  plusClicked = 0;
  //  elementDisBlock(inMinus);
  elementDisBlock(inPlus);
  elementDisBlock(inMinus);
  elementDisBlock(inSub);
  elementDisBlock(inCan);

  for (i = 0; i < imgsup.length; i++) {
    elementDisBlock(imgsup[i]);
    elementDisBlock(inDesIn[i]);
    elementDisNone(inDesOut[i]);
    elementDisBlock(beltIn[i]);
    elementDisNone(beltOut[i]);
    elementDisBlock(nameIn[i]);
    elementDisNone(nameOut[i]);
  }
});

editSchedule.addEventListener('click', () => {
  for (i = 0; i < scheduleIn.length; i++) {
    scheduleIn[i].style.display = 'block';
  }

  scheduleOut.style.display = 'none';

  for (i = 0; i < classesCheck.length; i++) {
    classesCheck[i].style.display = 'block';
  }

  for (i = 0; i < classText.length; i++) {
    classText[i].style.display = 'block';
  }

  for (i = 0; i < classTicks.length; i++) {
    classTicks[i].style.display = 'none';
  }

  for (i = 0; i < classCrosses.length; i++) {
    classCrosses[i].style.display = 'none';
  }

  for (i = 0; i < priceOut.length; i++) {
    priceOut[i].style.display = 'none';
    priceIn[i].style.display = 'block';
    priceDesOut[i].style.display = 'none';
    priceDesIn[i].style.display = 'block';
  }

  priceLink.style.display = 'block';
  priceLinkOut.style.display = 'none';
  priceLinkHint.style.display = 'block';
});

editChecks.addEventListener('click', () => {
  for (let i = 0; i < facilityCheck.length; i++) {
    facilityCheck[i].style.display = 'block';
  }

  for (let i = 0; i < checksIn.length; i++) {
    checksIn[i].style.display = 'block';
  }
  facilityIcons.style.display = 'none';
});

scheduleCan.addEventListener('click', () => {
  for (i = 0; i < scheduleIn.length; i++) {
    scheduleIn[i].style.display = 'none';
  }

  scheduleOut.style.display = 'block';
  priceLinkOut.style.display = 'block';
  priceLink.style.display = 'none';
  priceLinkHint.style.display = 'none';

  for (i = 0; i < classTicks.length; i++) {
    classTicks[i].style.display = 'block';
  }

  for (i = 0; i < classCrosses.length; i++) {
    classCrosses[i].style.display = 'block';
  }
  for (i = 0; i < classesCheck.length; i++) {
    classesCheck[i].style.display = 'none';
  }

  for (i = 0; i < classText.length; i++) {
    classText[i].removeAttribute('style');
  }
});

inCan.addEventListener('click', () => {
  window.location.reload();
});

checkCan.addEventListener('click', () => {
  window.location.reload();
});

function elementDisNone(element) {
  element.style.display = 'none';
}

function elementDisBlock(element) {
  element.style.display = 'block';
}

let expanded = false;

function showCheckboxes() {
  const checkboxes = document.getElementById('checkboxes1');
  if (!expanded) {
    checkboxes.style.display = 'block';
    expanded = true;
  } else {
    checkboxes.style.display = 'none';
    expanded = false;
  }
}

function showCheckboxes2() {
  const checkboxes = document.getElementById('checkboxes2');
  if (!expanded) {
    checkboxes.style.display = 'block';
    expanded = true;
  } else {
    checkboxes.style.display = 'none';
    expanded = false;
  }
}

function showCheckboxes3() {
  const checkboxes = document.getElementById('checkboxes3');
  if (!expanded) {
    checkboxes.style.display = 'block';
    expanded = true;
  } else {
    checkboxes.style.display = 'none';
    expanded = false;
  }
}
function showCheckboxes4() {
  const checkboxes = document.getElementById('checkboxes4');
  if (!expanded) {
    checkboxes.style.display = 'block';
    expanded = true;
  } else {
    checkboxes.style.display = 'none';
    expanded = false;
  }
}
function showCheckboxes5() {
  const checkboxes = document.getElementById('checkboxes5');
  if (!expanded) {
    checkboxes.style.display = 'block';
    expanded = true;
  } else {
    checkboxes.style.display = 'none';
    expanded = false;
  }
}

function copyVal(source, output) {
  $(source).on('keyup', function () {
    const val = $(this).val();
    $(output).val(val);
  });
}

function copySelect(source, output) {
  $(source).on('change', function () {
    const val = $(this).val();
    $(output).val(val);
  });
}

const phonetip = document.getElementById('phoneTip');
const phoneIcon = document.getElementById('phoneIcon');
const phoneInput = document.getElementById('phoneInput');

const emailtip = document.getElementById('emailTip');
const emailIcon = document.getElementById('emailIcon');
const emailInput = document.getElementById('emailInput');

phoneIcon.addEventListener('click', () => {
  myFunction(phoneInput, phonetip);
});

phoneIcon.addEventListener('mouseover', () => {
  phonetip.style.zIndex = '0';
  phonetip.style.opacity = '100%';
});
phoneIcon.addEventListener('mouseout', () => {
  phonetip.style.opacity = '0%';
  setTimeout(() => {
    outFunc(phonetip, phoneInput);
  }, 1000);
});

emailIcon.addEventListener('click', () => {
  myFunction(emailInput, emailtip);
});

emailIcon.addEventListener('mouseover', () => {
  phonetip.style.zIndex = '0';
  emailtip.style.opacity = '100%';
});
emailIcon.addEventListener('mouseout', () => {
  emailtip.style.opacity = '0%';
  setTimeout(() => {
    phonetip.style.zIndex = '-1';
    outFunc(emailtip, emailInput);
  }, 1000);
});

function myFunction(element, tip) {
  const tempItem = document.createElement('input');
  tempItem.setAttribute('type', 'text');
  content = element.value;
  tempItem.setAttribute('value', content);
  document.body.appendChild(tempItem);
  tempItem.select();
  tempItem.setSelectionRange(0, 9999999);
  document.execCommand('copy');
  tempItem.setAttribute('style', 'display:none');

  tip.innerHTML = `Copied: ${content}`;
}

function outFunc(element, input) {
  element.innerHTML = `Copy ${input.value} to clipboard`;
}

gymDelete = document.getElementById('gymDelete');
hiddenDeleteButton2 = document.getElementById('hiddenDeleteButton2');

gymDelete.addEventListener('click', () => {
  if (
    confirm(
      'Are you sure you want to delete this gym? This process is irreversible.',
    )
  ) {
    hiddenDeleteButton2.click();
    console.log('This gym has been deleted');
  }
});
