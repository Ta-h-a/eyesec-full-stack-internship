
const letters = ['a','b','c','d','e','g']

const keyboardLetters = ['q','w','e','r','t','y','u','i','o','p','a','s']

let count = 0

for (letter of letters){
    for(let i=0;i<2;i++){
        console.log(letter+i);
        clickEvent(letter,i)
    }
}

$(".f0").on("click",function(){
    const audio = new Audio("/media/f0.mp3")
    audio.play()
})

// $(".g0").on("click",function(){
//     const audio = new Audio("/media/g0.mp3")
//     audio.play()
// })

/** */

// --------------------------

function clickEvent(letter,i)
{
    $("."+letter+i).on("click",function(){
        const audio = new Audio("/media/"+letter+i+".mp3")
        audio.play()
    })
}


$(document).on("keypress",function(){
    let key = event.key
    let audio;


    switch(key){

    case "q":
        $(".key.a0").addClass('black-key-active')
        
        setTimeout(()=>{
            $(".key.a0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/a0.mp3")
        break;
    
    case "w":
        $(".key.b0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.b0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/b0.mp3")
        break;
    
    case "e":
        $(".key.c0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.c0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/c0.mp3")
        break;
    
    case "r":
        $(".key.d0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.d0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/d0.mp3")
        break;
    
    case "t":
        $(".key.e0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.e0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/e0.mp3")
        break;
    
    case "y":
        $(".key.f0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.f0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/f0.mp3")
        break;
    
    case "u":
        $(".key.g1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.g1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/g1.mp3")
        break;
    
    case "i":
        $(".key.a1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.a1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/a1.mp3")
        break;
    
    case "o":
        $(".key.b1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.b1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/b1.mp3")
        break;
    
    case "p":
        $(".key.c1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.c1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/c1.mp3")
        break;
    
    case "a":
        $(".key.d1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.d1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/d1.mp3")
        break;
    case "s":
        $(".key.e1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.e1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/e1.mp3")
        break;
    }



    if(keyboardLetters.includes(event.key)){
        audio.play();
    }

    
    
})

