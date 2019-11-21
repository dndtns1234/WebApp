
var setfontsize = 12

function textIncrease(){
		setfontsize = setfontsize + 2;
		$("font").style.fontSize = setfontsize + "pt";
	}

function myFunction() {
  alert("Hello, World!");
}

function fontsize() {
  setInterval(textIncrease, 500);
}

function textstyle() {
  if ($("ischeck").checked == true){
    $("font").style.fontWeight = "bold";
    $("font").style.textDecoration = "underline";
    $("font").style.color = "green";
    document.body.style.backgroundImage = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
  }else{
    $("font").style.fontWeight ="normal";
    $("font").style.textDecoration = "none";
    $("font").style.color = "inherit";
    document.body.style.backgroundImage = "none";
  }
}

function snoopify() {
  var str = $("font").value;
  var up = $("font").value = str.toUpperCase();
  $("font").value = up.split(".").join("-izzle");
}

function isCon(cr){
  if(cr == 'a' || cr == 'e' || cr == 'i' || cr == 'o' || cr == 'u'){
    return true;
  }
}

function igpay(){
  var words = $("font").value;
  var i, j, tmp;
  var flag = false;
  var is_ay = words.substr(words.length - 2);

  if (isCon(words.charAt(0)) && is_ay == 'ay'){
  }else{
    for(i = 0; i < words.length; i++){
       if(isCon(words.charAt(i))) {
         tmp = words.substr(0,i);
         j = words.substr(i,words.length);
         flag = true;
         break;
       }
     }
    if(flag){
      $("font").value = j + tmp + 'ay';
    }
  }

}

function malko(){
  var words = $("font").value;
  if (words.length >= 5){
    $("font").value = "Malkovich";
  }

}
