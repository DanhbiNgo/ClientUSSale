function search(e){
if(e.value == ''){
document.getElementsByClassName('sh-search')[0].style.display='none';
}else{
document.getElementsByClassName('sh-search')[0].style.display='block';
}
     $.ajax({
    url:'showsearch/'+e.value,
    type:'GET',

            }).done(function(response){

    $('.sh-search').html(response);
        });
}

var recognition = new webkitSpeechRecognition();
recognition.continuous = true;
recognition.interimResults = true;
recognition.lang = 'en-US'; // ở đây ví dụ là Mỹ, còn Việt Nam là 'vi-VN' nhé.
// start
recognition.start();
// Stop
recognition.stop();
recognition.onresult = function(event) { 
    console.log(event);
}
recognition.onerror = function(event) { 
    console.log(event);
}
class SpeechRecognitionApi{
    constructor(options) {
        const SpeechToText = window.speechRecognition || window.webkitSpeechRecognition;
        this.speechApi = new SpeechToText();
        this.speechApi.continuous = true;
        this.speechApi.interimResults = false;
        this.output = options.output ? options.output : document.createElement('div');
        this.speechApi.onresult = (event)=> { 
            var resultIndex = event.resultIndex;
            var transcript = event.results[resultIndex][0].transcript;
            this.output.value = transcript;
	if(transcript == ''){
document.getElementsByClassName('sh-search')[0].style.display='none';
}else{
document.getElementsByClassName('sh-search')[0].style.display='block';
	document.getElementsByClassName('void')[0].style.display='none';
}
     $.ajax({
    url:'showsearch/'+ transcript,
    type:'GET',

            }).done(function(response){

    $('.sh-search').html(response);
        });
            
        }
    }
    init(){
        this.speechApi.start();
    }
    stop(){
        this.speechApi.stop();
    }
}

window.onload = function(){
    var speech = new SpeechRecognitionApi({
        output: document.querySelector('.ssearch')
    })

    document.querySelector('.btn-start').addEventListener('click', function () {
        speech.init();
	document.getElementsByClassName('void')[0].style.display='block';


 var x = setInterval(function(){speech.stop();document.getElementsByClassName('void')[0].style.display='none';clearInterval(x);},5000);
 
    })
	document.querySelector('.btn-stop').addEventListener('click', function () {
     	var vs =document.getElementsByClassName('ssearch')[0].value;
	document.getElementsByClassName('ssearch')[0].value = vs;
 
    })


$.ajax({
	url:'swdh',
	type:'GET',

}).done(function(response){
$('.jax').html(response);
});

	run()
}

