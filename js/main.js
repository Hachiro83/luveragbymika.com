/////////////////////////////////////////////////////////
//MAntenimiento
/////////////////////////////////////////////////////////
var maintenance = 0;

if(maintenance==1){
	console.log('maintenance');
	$('#container').attr('style', 'display:none');
	$('#mantenimiento').attr('style', 'display:block');
}else{
	console.log('no maintenance');
}            

/////////////////////////////////////////////////////////
//Update fecha 
/////////////////////////////////////////////////////////

 var today = new Date();
 var dd = today.getDate();
 var mm = today.getMonth()+1; //January is 0!
 var yyyy = today.getFullYear();

 if(dd<10) {
     dd = '0'+dd
 } 

 if(mm<10) {
     mm = '0'+mm
 } 

 today = dd + '-' + mm + '-' + yyyy;
 for (let el of document.querySelectorAll('.fecha')) el.innerHTML = "<i class='fa fa-calendar' aria-hidden='true'></i> " + today;         

/////////////////////////////////////////////////////////
//Update hora
/////////////////////////////////////////////////////////

 function checkTime(i) {
   if (i < 10) {
     i = "0" + i;
   }
   return i;
 }

 function startTime() {
   var today = new Date();
   var h = today.getHours();
   var m = today.getMinutes();
   var s = today.getSeconds();
   // add a zero in front of numbers<10
   m = checkTime(m);
   s = checkTime(s);
   //document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
 for (let el of document.querySelectorAll('.hora')) el.innerHTML = "<i class='fa fa-clock-o' aria-hidden='true'></i> " + h + ":" + m + ":" + s;   
   t = setTimeout(function() {
     startTime()
   }, 500);
 }
 startTime();