
const answers=document.querySelector(".answers").children;

const questionNumber=document.querySelector(".questionNumber");

const question=document.querySelector(".question");
const an1=document.querySelector(".answera");
const an2=document.querySelector(".answerb");
const an3=document.querySelector(".answerc");
const an4=document.querySelector(".answerd");
let questionIndex;
let index=0;
let time=30;
let maxQuestions=10;
let mArray=[]
let score=0;


function check(element){
	if(element.innerHTML==questions[questionIndex][5]){
		element.classList.add("correct");
		score++;
	}
	else{
		element.classList.add("wrong");
	}
	disableAnswers()
	setTimeout(function(){
    next();
}, 1000);
}

function disableAnswers(){
	clearInterval(interval);
	const elemen = document.querySelector('.timeBar');
	elemen.classList.remove('anim');
	for(let i=0; i<answers.length; i++){
		answers[i].classList.add("disabled");
		if(answers[i].innerHTML==questions[questionIndex][5]){
			answers[i].classList.add("correct");
		}
	}
}

function enableAnswers(){
	for(let i=0; i<answers.length; i++){
		answers[i].classList.remove("disabled","correct","wrong");
		}
	}

function next(){
	enableAnswers();
	randomQuestion();
}

function randomQuestion(){
	let randomNumber=Math.floor(Math.random()*questions.length);
	let hitDuplicate=0;
	if(index==maxQuestions)
	{
		quizOver();
	}
	else{
		if(mArray.length>0)
		{
			for(let i=0; i<mArray.length; i++)
			{
				if(mArray[i]==randomNumber){
					hitDuplicate=1;
					break;
				}
			}
			if(hitDuplicate==1)
			{
				randomQuestion();
			}
			else
			{
				questionIndex=randomNumber;
				loadView();
				mArray.push(questionIndex);
			}
		}
		if(mArray.length==0)
		{
			questionIndex=randomNumber;
			loadView();
			mArray.push(questionIndex);
		}
	}
}

function countDown(){
	let counter = 30;
	const timeLeft=document.querySelector(".timeLeft");
	timeLeft.innerHTML = counter;
	interval = setInterval(count,1000);
	function count(){
		counter--;
		if(counter<0)
		{
			let ranN=Math.floor(Math.random()*4);
			if(ranN==0) check(an1);
			else if(ranN==1) check(an2);
			else if(ranN==2) check(an3);
			else check(an4);
			clearInterval(interval);
		}
		else{
		timeLeft.innerHTML = counter;
	}
	}
}

function loadView(){
	index++;
	questionNumber.innerHTML=index;
	question.innerHTML=index + ". " + questions[questionIndex][0];
	an1.innerHTML=questions[questionIndex][1];
	an2.innerHTML=questions[questionIndex][2];
	an3.innerHTML=questions[questionIndex][3];
	an4.innerHTML=questions[questionIndex][4];
	const prgBar=document.querySelector(".prgB");
	let barWidth=document.querySelector(".progressBar").clientWidth;
	barWidth = barWidth/10 * index;
	prgBar.style.width = barWidth + "px";
	//prgBar.style.width = 20 + "px";
	const element = document.querySelector('.timeBar');
	element.classList.add('anim');
	countDown();
}

function quizOver(){
	disableAnswers();
	var quer = "?scr=" + score;
	window.location.href='result.html' + quer;
}


window.onload=function(){
	randomQuestion();
	
}

