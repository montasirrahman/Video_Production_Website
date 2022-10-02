let name = "Roman";;
let age = 22;
let boo=true;


const header = document.querySelector("#header");
const navLinks = document.querySelectorAll(".nav__link");
const testBtn =document.querySelector('#testBtn');

console.log(navLinks); 


function sayHello(){

    let massage = "Hello  " + name;
    console.log(massage);
}

sayHello();

function simpleMath(a,b){
    let result = a+b;
    return result;
}

let sum=simpleMath(14561, 22); 
console.log(sum);



window.addEventListener("scroll",checkScroll);
document.addEventListener("DOMcontentLoaded", checkScroll);


function checkScroll(){
    let scrollPos = window.scrollY;
    console.log(scrollPos);

    if(scrollPos>0){
        header.classList.add('red');
    }
    else{
        header.classList.remove('red');
    }
};

testBtn.addEventListener("click", function(){
    console.log("cliked");
});





for(let navItem of navLinks){
    navItem.addEventListener("click", function(){
        console.log(navItem.text);
    });
};