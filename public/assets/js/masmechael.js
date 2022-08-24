


//function cuurency format
   function FormatCurrency(objNum){
        var num = objNum.value.replace('$','');
        var ent, dec, dot;
        if (num != '' && num != objNum.oldvalue){
             num = MoneyToNumber(num);
             if (!isNaN(num)){
				var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
				ent = num.split('.')[0];
				dec = num.split('.')[1];
				if (dec || ev.keyCode == 190){
					dot = '.';
					if (dec.toString().length > 2) dec = dec.toString().substr(0,2);
				}else{
					dec = '';
					dot = '';
				}
				objNum.value = AddCommas(ent) + dot + dec;
				objNum.oldvalue = objNum.value;
             }
          objNum.value = objNum.oldvalue;
        }
   }

    function MoneyToNumber(num) {
        return (num.replace(/,/g, ''));
   }

    function addCommas(nStr){
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

	function RemCommas(nStr){
		var string 	= nStr;
		var str = string.replace(/,/g,"");
		return str;
	}

  function number_onblur(objNum){
       var num = objNum.oldvalue;
    if (num.charAt(num.toString().length-1) == '.') num = num.replace('.','');
    objNum.value = num;
  }


	//function isnumeric
	function validate(field) {
		var valid = "0123456789"
		var ok = "yes";
		var temp;
		for (var i=0; i<field.value.length; i++){
			temp = "" + field.value.substring(i, i+1);
			if (valid.indexOf(temp) == "-1") ok = "no";
		}
			if (ok == "no"){
			alert("Invalid entry!  Only numbers are accepted!");
			field.focus();
			field.select();
		}
	}

//auto tab
var isNN = (navigator.appName.indexOf("Netscape")!=-1);
function autoTab(input,len, e){
	var keyCode = (isNN) ? e.which : e.keyCode;
	var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
	if(input.value.length >= len && !containsElement(filter,keyCode))
		{
			input.value = input.value.slice(0, len);
			input.form[(getIndex(input)+1) % input.form.length].focus();
		}
	function containsElement(arr, ele){
		var found = false, index = 0;
		while(!found && index < arr.length)
		if(arr[index] == ele)
			found = true;
			else
			index++;
			return found;
	}
	function getIndex(input)
	{
		var index = -1, i = 0, found = false;
		while (i < input.form.length && index == -1)
		if (input.form[i] == input)index = i;
		else i++;
		return index;
	}
	return true;
}

	//popup window
	function PopupWindow(strURL,intHeight,intWidth){
		var newWindow;
		var intTop= (screen.height - intHeight) / 2;
		var intLeft= (screen.width - intWidth) / 2;
		var props = 'scrollBars=yes,resizable=yes,toolbar=no,menubar=no,location=no,directories=no,width='+intWidth+',height='+intHeight+',left='+intLeft+',top='+intTop+'';
		self.name = "<%=strRandom%>"
		newWindow = window.open(strURL, "Popup", props);
	}

	function maskIt(fldVal){
	   keyCount = fldVal.length;
	   keyEntered =fldVal.substring(keyCount-1,keyCount);
	   keyCount++;
	   switch (keyCount)
	   {
	      case 3:
	         document.EditView.distributiondate.value += "-" ;
	         break;
	      case 6:
	         document.EditView.distributiondate.value += "-" ;
	         break;
	   }
	}

	function trimIt( str ) {
		return str.replace(/(^[\s\xA0]+|[\s\xA0]+$)/g, '');
	}

function changeCursor(e,form1,obj) {
 if(window.event) { // IE
	var code = e.keyCode;
 }else if(e.which) { // Netscape/Firefox/Opera
   var code = e.which;
 }
 if (code == 13) { //checks for the escape key
    dml=document.forms[form1];
    len = dml.elements.length;

  //cari letak kursor ada di field mana
  for( i=0 ; i<len ; i++) {
    if(dml.elements[i].name==obj.name){
      break;
   }
  }

  //cari next field name
  for( y=i ; y<len ;y++) {
    if(dml.elements[y+1].type!="hidden"){
     if(dml.elements[y+1].readOnly==false||dml.elements[y+1].type=="select-one"){


     if(dml.elements[y+1].type!="hidden"){
      dml.elements[y+1].focus();
      break;
     }
    }
   }
  }
 }
}

function firstLoad(form1){
 dml=document.forms[form1];
 len = dml.elements.length;
 for( i=0 ; i<len ; i++) {
  if(dml.elements[i].type!="hidden"&&dml.elements[i].type!="checkbox"){
    if(dml.elements[i].readOnly==false||dml.elements[i].type=="select-one"){
    dml.elements[i].focus();
    break;
   }
  }
 }
}