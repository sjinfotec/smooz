
function OnButtonClickT(t) {
  var tm = t + '_mark';
  var tb = t + '_btn';
  inputid = document.getElementById(t);
  inputvalue = inputid.value;
  targetid = document.getElementById(tm);
  btnid = document.getElementById(tb);
  if (inputvalue == "1") { 
    targetid.style.visibility = "hidden";
    inputid.value = "0";
    btnid.innerHTML = "通し無し";
  }
  else if (inputvalue == "0") {
    targetid.style.visibility = "visible";
    inputid.value = "1";
    btnid.innerHTML = "通し有り";
  }
}

function OnButtonClickD(t) {
  var tm = t + '_mark';
  var tb = t + '_btn';
  inputid = document.getElementById(t);
  inputvalue = inputid.value;
  targetid = document.getElementById(tm);
  btnid = document.getElementById(tb);
  if (inputvalue == "0") { 
    targetid.style.visibility = "visible";
    inputid.value = "1";
    btnid.innerHTML = "断裁・一般";
  }
  else if (inputvalue == "1") {
    targetid.style.visibility = "visible";
    inputid.value = "2";
    btnid.innerHTML = "断裁・インサータ";
  }
  else if (inputvalue == "2") {
    targetid.style.visibility = "hidden";
    inputid.value = "0";
    btnid.innerHTML = "断裁";
  }
}


function OnButtonClick(t) {
  var tm = t + '_mark';
  inputid = document.getElementById(t);
  inputvalue = inputid.value;
  targetid = document.getElementById(tm);
  if (inputvalue == "1") { 
    targetid.style.visibility = "hidden";
    inputid.value = "0";
  }
  else if (inputvalue == "0") {
    targetid.style.visibility = "visible";
    inputid.value = "1";
  }
}

function OnButtonClick01(t,arr) {
  let idname_array = new Object(); 
  idname_array[0] = ['inch', 'milli'];
  idname_array[1] = ['wkake', '2ana', '6ana', 'donko', 'katanuki', 'kasutori'];
  idname_array[2] = ['nisu_single', 'nisu_double'];
  idname_array[3] = ['marble', 'cross'];
  idname_array[4] = ['mat_maki_cardboard', 'mat_cardboard'];
  idname_array[5] = ['kurumi', 'musen_tozi', 'naka_tozi'];

  for (let i = 0 ; i < idname_array[arr].length ; i++){
    var n = idname_array[arr][i];
    var nm = n + '_mark';
    inputid = document.getElementById(n);
    inputvalue = inputid.value;
    targetid = document.getElementById(nm);

    if ( idname_array[arr][i] == t ) {
      if (inputvalue == "1") { 
        targetid.style.visibility = "hidden";
        inputid.value = "0";
      }
      else if (inputvalue == "0") {
        targetid.style.visibility = "visible";
        inputid.value = "1";
      }
    }
    else {
      targetid.style.visibility = "hidden";
      inputid.value = "0";
    } 
  }
}
