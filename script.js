const plus = document.querySelector(".buttonadda"),
minus = document.querySelector(".buttonminus"),
num = document.querySelector(".num");
jumlah = document.querySelector(".jumlah");

var price = document.getElementById("price").innerText
var totalHarga = document.getElementById("totalHarga").innerText

function priceTotal(){
	total = a * price;
	document.getElementById("price").innerText = total
	document.getElementById("totalHarga").innerText = total
}

let a = 1;
	
plus.addEventListener("click", ()=>{
	a++;
	num.innerText = a;
	jumlah.innerText = a;
	
	priceTotal()
});

minus.addEventListener("click", ()=>{
	if(a > 1){
	a--;
	num.innerText = a;
	jumlah.innerText = a;
	}
	
	priceTotal()
});

  function parsing(){
	  
	priceTotal()
	
    var address = document.getElementById('address').value;
    var payment = document.getElementById('payment').value;
	
	if(!address || !payment){
		alert('You must fill all the data !');
		result = false
	}
	else{
	var result = confirm ("CONFIRM PAYMENT" + '\n' +
		  "Alamat : " + address + '\n' +
		  "Pembayaran : " + payment + '\n' +
		  "Sticker Vinyl : " + a + '\n' +
		  "Harga : Rp. " + total);
	}
		  if(result == false) {
			  alert('Payment Failed !');
		  }
		  else{
			  alert('Payment on Progress !');
		  }
  }
  
    function parsing2(){
	  
	priceTotal()
	
    var address = document.getElementById('address').value;
    var payment = document.getElementById('payment').value;
	
	if(!address || !payment){
		alert('You must fill all the data !');
		result = false
	}
	else{
	var result = confirm ("CONFIRM PAYMENT" + '\n' +
		  "Alamat : " + address + '\n' +
		  "Pembayaran : " + payment + '\n' +
		  "Doff Sticker : " + a + '\n' +
		  "Harga : Rp. " + total);
	}
		  if(result == false) {
			  alert('Payment Failed !');
		  }
		  else{
			  alert('Payment on Progress !');
		  }
  }
  
    function parsing3(){
	  
	priceTotal()
	
    var address = document.getElementById('address').value;
    var payment = document.getElementById('payment').value;
	
	if(!address || !payment){
		alert('You must fill all the data !');
		result = false
	}
	else{
	var result = confirm ("CONFIRM PAYMENT" + '\n' +
		  "Alamat : " + address + '\n' +
		  "Pembayaran : " + payment + '\n' +
		  "Glosy Card : " + a + '\n' +
		  "Harga : Rp. " + total);
	}
		  if(result == false) {
			  alert('Payment Failed !');
		  }
		  else{
			  alert('Payment on Progress !');
		  }
  }
  
  function parsing4(){
	  
	priceTotal()
	
    var address = document.getElementById('address').value;
    var payment = document.getElementById('payment').value;
	
	if(!address || !payment){
		alert('You must fill all the data !');
		result = false
	}
	else{
	var result = confirm ("CONFIRM PAYMENT" + '\n' +
		  "Alamat : " + address + '\n' +
		  "Pembayaran : " + payment + '\n' +
		  "Doff Card : " + a + '\n' +
		  "Harga : Rp. " + total);
	}
		  if(result == false) {
			  alert('Payment Failed !');
		  }
		  else{
			  alert('Payment on Progress !');
		  }
  }
  
    function parsing5(){
	  
	priceTotal()
	
    var address = document.getElementById('address').value;
    var payment = document.getElementById('payment').value;
	
	if(!address || !payment){
		alert('You must fill all the data !');
		result = false
	}
	else{
	var result = confirm ("CONFIRM PAYMENT" + '\n' +
		  "Alamat : " + address + '\n' +
		  "Pembayaran : " + payment + '\n' +
		  "A4 Colour Print : " + a + '\n' +
		  "Harga : Rp. " + total);
	}
		  if(result == false) {
			  alert('Payment Failed !');
		  }
		  else{
			  alert('Payment on Progress !');
		  }
  }
  
    function parsing6(){
	  
	priceTotal()
	
    var address = document.getElementById('address').value;
    var payment = document.getElementById('payment').value;
	
	if(!address || !payment){
		alert('You must fill all the data !');
		result = false
	}
	else{
	var result = confirm ("CONFIRM PAYMENT" + '\n' +
		  "Alamat : " + address + '\n' +
		  "Pembayaran : " + payment + '\n' +
		  "A4 Black White : " + a + '\n' +
		  "Harga : Rp. " + total);
	}
		  if(result == false) {
			  alert('Payment Failed !');
		  }
		  else{
			  alert('Payment on Progress !');
		  }
   }
  
    function checkRegister(){
	
	var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
	
	if(!username || !email || !password || !confirmPassword){
		alert('You must fill all the data !');
		result = false
	}
	else{
		alert('Register Success !');
		window.location.href='index.html';
	}
	}
	
	function checkLogin(){
		
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	if(!email || !password){
		alert('Wrong Email or Password');
		result = false
	}
	
	else{
		alert('Login Success !');
		window.location.href='index.html';
	}
	
}